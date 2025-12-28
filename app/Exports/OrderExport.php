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
            'subOrders.orderType',
            'subOrders.corniceType',
            'subOrders.profileColor',
            'subOrders.fabricCode',
            'subOrders.controlType',
        ]);

        return view('admin.exports.order-excel', [
            'order' => $order,
            'subOrdersAmount' => $order->subOrders->sum('amount'),
            'subOrdersDiscount' => $order->subOrders->sum('discount'),
            'subOrdersTotal' => $order->subOrders->sum('total'),
            'subOrdersArea' => $order->subOrders->sum('area'),
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
