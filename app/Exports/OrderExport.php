<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class OrderExport implements FromView, WithStyles, ShouldAutoSize
{
    public function __construct(private readonly Order $order)
    {
    }

    public function view(): View
    {
        $order = $this->order->load([
            'client',
            'user',
            'subOrders.orderType.parent',
            'subOrders.orderType.fields',
            'subOrders.corniceType',
            'subOrders.profileColor',
            'subOrders.fabricCode',
            'subOrders.controlType',
        ]);
        $subOrders = $order->subOrders->values();
        $subOrdersAmount = $subOrders->sum('amount');
        $subOrdersTotal = $subOrders->sum('total');
        $subOrdersArea = $subOrders->sum('area');
        $subOrdersDiscount = $subOrders->sum(function ($subOrder) {
            $amount = (float) ($subOrder->amount ?? 0);
            $total = (float) ($subOrder->total ?? 0);
            return max(0, $amount - $total);
        });

        return view('admin.exports.order-excel', [
            'order' => $order,
            'subOrders' => $subOrders,
            'subOrdersAmount' => $subOrdersAmount,
            'subOrdersDiscount' => $subOrdersDiscount,
            'subOrdersTotal' => $subOrdersTotal,
            'subOrdersArea' => $subOrdersArea,
        ]);
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            1 => ['font' => ['bold' => true, 'size' => 14]],
            8 => ['font' => ['bold' => true]],
        ];
    }
}
