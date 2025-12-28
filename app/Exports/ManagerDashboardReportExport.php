<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ManagerDashboardReportExport implements FromView, ShouldAutoSize
{
    public function __construct(private readonly User $user, private readonly string $period)
    {
    }

    public function view(): View
    {
        $now = Carbon::now();
        $start = match ($this->period) {
            'today' => $now->copy()->startOfDay(),
            'week' => $now->copy()->subDays(6)->startOfDay(),
            'year' => $now->copy()->subMonths(11)->startOfMonth(),
            default => $now->copy()->subDays(29)->startOfDay(),
        };

        $ordersQuery = Order::query()
            ->where('user_id', $this->user->id)
            ->where('created_at', '>=', $start);

        $ordersCount = (clone $ordersQuery)->count();
        $totalRevenue = (clone $ordersQuery)->sum('grand_total');
        $totalDiscount = (clone $ordersQuery)->sum('order_total_discounted');
        $avgOrder = $ordersCount > 0 ? $totalRevenue / $ordersCount : 0;

        $topClients = Order::query()
            ->selectRaw('client_id, COUNT(*) as orders_count, SUM(grand_total) as total_amount')
            ->where('user_id', $this->user->id)
            ->whereNotNull('client_id')
            ->where('created_at', '>=', $start)
            ->groupBy('client_id')
            ->orderByDesc('total_amount')
            ->with('client')
            ->limit(10)
            ->get();

        return view('manager.exports.dashboard-report', [
            'period' => $this->period,
            'ordersCount' => $ordersCount,
            'totalRevenue' => $totalRevenue,
            'totalDiscount' => $totalDiscount,
            'avgOrder' => $avgOrder,
            'topClients' => $topClients,
            'generatedAt' => $now,
            'managerName' => $this->user->name ?? $this->user->phone ?? 'Менеджер',
        ]);
    }
}
