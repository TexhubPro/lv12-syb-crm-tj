<?php

namespace App\Http\Controllers;

use App\Exports\ManagerDashboardReportExport;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ManagerDashboardController extends Controller
{
    public function index(Request $request)
    {
        $period = $request->string('period', 'month')->toString();
        $now = Carbon::now();

        [$start, $labels] = match ($period) {
            'today' => [$now->copy()->startOfDay(), [$now->format('d.m')]],
            'week' => [$now->copy()->subDays(6)->startOfDay(), collect(range(6, 0))
                ->map(fn ($d) => $now->copy()->subDays($d)->format('d.m'))
                ->all()],
            'year' => [$now->copy()->subMonths(11)->startOfMonth(), collect(range(11, 0))
                ->map(fn ($m) => $now->copy()->subMonths($m)->format('m.Y'))
                ->all()],
            default => [$now->copy()->subDays(29)->startOfDay(), collect(range(29, 0))
                ->map(fn ($d) => $now->copy()->subDays($d)->format('d.m'))
                ->all()],
        };

        $ordersQuery = Order::query()
            ->where('user_id', $request->user()->id)
            ->where('created_at', '>=', $start);

        $ordersCount = (clone $ordersQuery)->count();
        $totalRevenue = (clone $ordersQuery)->sum('grand_total');
        $totalDiscount = (clone $ordersQuery)->sum('order_total_discounted');
        $avgOrder = $ordersCount > 0 ? $totalRevenue / $ordersCount : 0;

        $topClients = Order::query()
            ->selectRaw('client_id, COUNT(*) as orders_count, SUM(grand_total) as total_amount')
            ->where('user_id', $request->user()->id)
            ->whereNotNull('client_id')
            ->where('created_at', '>=', $start)
            ->groupBy('client_id')
            ->orderByDesc('total_amount')
            ->with('client')
            ->limit(5)
            ->get();

        $chartData = [];
        if ($period === 'year') {
            foreach ($labels as $label) {
                $date = Carbon::createFromFormat('m.Y', $label)->startOfMonth();
                $value = Order::query()
                    ->where('user_id', $request->user()->id)
                    ->whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->sum('grand_total');
                $chartData[] = ['label' => $label, 'value' => $value];
            }
        } elseif ($period === 'today') {
            $value = Order::query()
                ->where('user_id', $request->user()->id)
                ->whereDate('created_at', $now->toDateString())
                ->sum('grand_total');
            $chartData[] = ['label' => $labels[0], 'value' => $value];
        } else {
            foreach ($labels as $label) {
                $date = Carbon::createFromFormat('d.m', $label)
                    ->setYear($now->year)
                    ->startOfDay();
                $value = Order::query()
                    ->where('user_id', $request->user()->id)
                    ->whereDate('created_at', $date->toDateString())
                    ->sum('grand_total');
                $chartData[] = ['label' => $label, 'value' => $value];
            }
        }

        return view('manager.dashboard', [
            'period' => $period,
            'ordersCount' => $ordersCount,
            'totalRevenue' => $totalRevenue,
            'totalDiscount' => $totalDiscount,
            'avgOrder' => $avgOrder,
            'topClients' => $topClients,
            'chartData' => $chartData,
        ]);
    }

    public function export(Request $request)
    {
        $period = $request->string('period', 'month')->toString();

        return Excel::download(new ManagerDashboardReportExport($request->user(), $period), 'manager-report.xlsx');
    }
}
