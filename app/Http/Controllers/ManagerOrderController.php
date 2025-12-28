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

class ManagerOrderController extends Controller
{
    public function index(Request $request)
    {
        return view('manager.orders', [
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
            'subOrders.orderType',
            'subOrders.corniceType',
            'subOrders.profileColor',
            'subOrders.fabricCode',
            'subOrders.controlType',
        ]);

        return view('manager.order-show', [
            'order' => $order,
        ]);
    }

    public function edit(Request $request, Order $order)
    {
        $this->ensureOwner($request, $order);

        $order->load('subOrders');

        return view('manager.order-edit', [
            'order' => $order,
            'clients' => Client::orderBy('full_name')->get(),
            'corniceTypes' => CorniceType::orderBy('name')->get(),
            'controlTypes' => ControlType::orderBy('name')->get(),
            'fabricCodes' => FabricCode::orderBy('name')->get(),
            'orderTypes' => OrderType::orderBy('name')->get(),
            'profileColors' => ProfileColor::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Order $order)
    {
        $this->ensureOwner($request, $order);

        $validated = $request->validate([
            'client_id' => ['nullable', 'exists:clients,id', 'required_without:new_client_full_name,new_client_phone'],
            'new_client_full_name' => ['nullable', 'string', 'max:255', 'required_with:new_client_phone'],
            'new_client_phone' => ['nullable', 'string', 'max:50', 'required_with:new_client_full_name', Rule::unique('clients', 'phone')],
            'new_client_address' => ['nullable', 'string', 'max:255'],
            'new_client_comment' => ['nullable', 'string', 'max:2000'],
            'order_type_id' => ['nullable', 'exists:order_types,id'],
            'motor' => ['nullable', 'string', 'max:255'],
            'comment' => ['nullable', 'string', 'max:2000'],
            'order_total' => ['nullable', 'numeric'],
            'order_total_discounted' => ['nullable', 'numeric'],
            'advance_amount' => ['nullable', 'numeric'],
            'balance_amount' => ['nullable', 'numeric'],
            'rework_amount' => ['nullable', 'numeric'],
            'grand_total' => ['nullable', 'numeric'],
            'sub_orders' => ['nullable', 'array'],
            'sub_orders.*.order_kind' => ['required', 'string', 'max:255'],
            'sub_orders.*.order_type_id' => ['nullable', 'exists:order_types,id'],
            'sub_orders.*.profile_color_id' => ['nullable', 'exists:profile_colors,id'],
            'sub_orders.*.cornice_type_id' => ['nullable', 'exists:cornice_types,id'],
            'sub_orders.*.division' => ['nullable', 'string', 'max:255'],
            'sub_orders.*.fabric_code_id' => ['nullable', 'exists:fabric_codes,id'],
            'sub_orders.*.control_type_id' => ['nullable', 'exists:control_types,id'],
            'sub_orders.*.width' => ['nullable', 'numeric'],
            'sub_orders.*.height' => ['nullable', 'numeric'],
            'sub_orders.*.quantity' => ['nullable', 'integer'],
            'sub_orders.*.area' => ['nullable', 'numeric'],
            'sub_orders.*.price' => ['nullable', 'numeric'],
            'sub_orders.*.amount' => ['nullable', 'numeric'],
            'sub_orders.*.discount' => ['nullable', 'numeric'],
            'sub_orders.*.total' => ['nullable', 'numeric'],
            'sub_orders.*.room' => ['nullable', 'string', 'max:255'],
        ]);

        $clientId = $validated['client_id'] ?? $order->client_id;
        if (!empty($validated['new_client_full_name']) || !empty($validated['new_client_phone'])) {
            $client = Client::create([
                'full_name' => $validated['new_client_full_name'],
                'phone' => $validated['new_client_phone'],
                'address' => $validated['new_client_address'] ?? null,
                'comment' => $validated['new_client_comment'] ?? null,
            ]);
            $clientId = $client->id;
        }

        $order->update([
            'client_id' => $clientId,
            'order_type_id' => $validated['order_type_id'] ?? null,
            'motor' => $validated['motor'] ?? null,
            'comment' => $validated['comment'] ?? null,
            'order_total' => $validated['order_total'] ?? 0,
            'order_total_discounted' => $validated['order_total_discounted'] ?? 0,
            'advance_amount' => $validated['advance_amount'] ?? 0,
            'balance_amount' => $validated['balance_amount'] ?? 0,
            'rework_amount' => $validated['rework_amount'] ?? 0,
            'grand_total' => $validated['grand_total'] ?? 0,
        ]);

        $order->subOrders()->delete();

        $subOrders = $validated['sub_orders'] ?? [];
        foreach ($subOrders as $subOrder) {
            $hasSubOrder = collect($subOrder)->filter(function ($value) {
                return $value !== null && $value !== '';
            })->isNotEmpty();
            if (!$hasSubOrder) {
                continue;
            }

            SubOrder::create([
                'order_id' => $order->id,
                'order_type_id' => $subOrder['order_type_id'] ?? null,
                'profile_color_id' => $subOrder['profile_color_id'] ?? null,
                'cornice_type_id' => $subOrder['cornice_type_id'] ?? null,
                'order_kind' => $subOrder['order_kind'] ?? null,
                'division' => $subOrder['division'] ?? null,
                'fabric_code_id' => $subOrder['fabric_code_id'] ?? null,
                'control_type_id' => $subOrder['control_type_id'] ?? null,
                'width' => $subOrder['width'] ?? 0,
                'height' => $subOrder['height'] ?? 0,
                'quantity' => $subOrder['quantity'] ?? 0,
                'area' => $subOrder['area'] ?? 0,
                'price' => $subOrder['price'] ?? 0,
                'amount' => $subOrder['amount'] ?? 0,
                'discount' => $subOrder['discount'] ?? 0,
                'total' => $subOrder['total'] ?? 0,
                'room' => $subOrder['room'] ?? null,
            ]);
        }

        return redirect()->route('manager.orders.show', $order)->with('status', 'Заказ обновлен.');
    }

    public function destroy(Request $request, Order $order)
    {
        $this->ensureOwner($request, $order);

        $order->delete();

        return back()->with('status', 'Заказ удален.');
    }

    public function downloadReceipt(Request $request, Order $order)
    {
        $this->ensureOwner($request, $order);

        $order->load([
            'client',
            'user',
            'subOrders.orderType',
            'subOrders.corniceType',
            'subOrders.profileColor',
            'subOrders.fabricCode',
            'subOrders.controlType',
        ]);

        $pdf = Pdf::loadView('admin.exports.order-receipt', [
            'order' => $order,
            'subOrdersAmount' => $order->subOrders->sum('amount'),
            'subOrdersDiscount' => $order->subOrders->sum('discount'),
            'subOrdersTotal' => $order->subOrders->sum('total'),
            'subOrdersArea' => $order->subOrders->sum('area'),
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
