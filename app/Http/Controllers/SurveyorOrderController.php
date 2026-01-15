<?php

namespace App\Http\Controllers;

use App\Exports\OrderExport;
use App\Models\Client;
use App\Models\ControlType;
use App\Models\CorniceType;
use App\Models\FabricCode;
use App\Models\Order;
use App\Models\OrderType;
use App\Models\ProfileColor;
use App\Models\SubOrder;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class SurveyorOrderController extends Controller
{
    public function index(Request $request)
    {
        return view('surveyor.orders', [
            'orders' => Order::with(['client', 'user'])
                ->where('user_id', $request->user()->id)
                ->latest()
                ->get(),
        ]);
    }

    public function show(Request $request, Order $order)
    {
        $this->ensureOwner($request, $order);

        $order->load([
            'client',
            'user',
            'subOrders.orderType.parent',
            'subOrders.orderType.fields',
            'subOrders.corniceType',
            'subOrders.profileColor',
            'subOrders.fabricCode',
            'subOrders.controlType',
        ]);

        $subOrders = $order->subOrders
            ->sortBy(fn($subOrder) => [
                $subOrder->orderType?->parent?->name ?? $subOrder->orderType?->name ?? '',
                $subOrder->orderType?->name ?? '',
                $subOrder->id ?? 0,
            ])
            ->values();
        $subOrdersAmount = $subOrders->sum('amount');
        $subOrdersTotal = $subOrders->sum('total');
        $subOrdersArea = $subOrders->sum('area');
        $subOrdersDiscount = $subOrders->sum(function ($subOrder) {
            $amount = (float) ($subOrder->amount ?? 0);
            $total = (float) ($subOrder->total ?? 0);
            return max(0, $amount - $total);
        });

        return view('surveyor.order-show', [
            'order' => $order,
            'subOrders' => $subOrders,
            'subOrdersAmount' => $subOrdersAmount,
            'subOrdersDiscount' => $subOrdersDiscount,
            'subOrdersTotal' => $subOrdersTotal,
            'subOrdersArea' => $subOrdersArea,
        ]);
    }

    public function destroy(Request $request, Order $order)
    {
        abort(403);
    }

    public function downloadReceipt(Request $request, Order $order)
    {
        $this->ensureOwner($request, $order);

        $order->load([
            'client',
            'user',
            'subOrders.orderType.parent',
            'subOrders.orderType.fields',
            'subOrders.corniceType',
            'subOrders.profileColor',
            'subOrders.fabricCode',
            'subOrders.controlType',
        ]);
        $subOrders = $order->subOrders
            ->sortBy(fn($subOrder) => [
                $subOrder->orderType?->parent?->name ?? $subOrder->orderType?->name ?? '',
                $subOrder->orderType?->name ?? '',
                $subOrder->id ?? 0,
            ])
            ->values();
        $subOrdersAmount = $subOrders->sum('amount');
        $subOrdersTotal = $subOrders->sum('total');
        $subOrdersArea = $subOrders->sum('area');
        $subOrdersDiscount = $subOrders->sum(function ($subOrder) {
            $amount = (float) ($subOrder->amount ?? 0);
            $total = (float) ($subOrder->total ?? 0);
            return max(0, $amount - $total);
        });

        $pdf = Pdf::loadView('admin.exports.order-receipt', [
            'order' => $order,
            'subOrders' => $subOrders,
            'subOrdersAmount' => $subOrdersAmount,
            'subOrdersDiscount' => $subOrdersDiscount,
            'subOrdersTotal' => $subOrdersTotal,
            'subOrdersArea' => $subOrdersArea,
        ])->setPaper('a4', 'landscape');

        return $pdf->download("order-{$order->id}.pdf");
    }

    public function downloadExcel(Request $request, Order $order)
    {
        $this->ensureOwner($request, $order);

        return Excel::download(new OrderExport($order), "order-{$order->id}.xlsx");
    }

    private function ensureOwner(Request $request, Order $order): void
    {
        if ($order->user_id !== $request->user()->id) {
            abort(403);
        }
    }
}
