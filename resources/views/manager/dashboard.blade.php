@extends('manager.layouts.app')

@section('title', 'Дашборд менеджера')

@section('content')
    @php
        $maxChart = collect($chartData)->max('value') ?: 1;
    @endphp

    <div class="grid gap-8">
        <div class="flex flex-wrap items-start justify-between gap-4">
            <div>
                <p class="text-xs uppercase tracking-[0.4em] text-slate-500 dark:text-slate-500">Дашборд</p>
                <h1 class="mt-3 text-3xl font-semibold text-slate-900 dark:text-white">Обзор показателей</h1>
                <p class="mt-2 max-w-2xl text-sm text-slate-500 dark:text-slate-400">
                    Динамика заказов, выручка, скидки и эффективность команды.
                </p>
            </div>
            <div class="flex flex-wrap items-center gap-2">
                <form method="GET" action="{{ route('manager.dashboard') }}">
                    <x-select name="period" placeholder="Период" class="min-w-[180px]" onchange="this.form.submit()">
                        <option value="today" @selected($period === 'today')>Сегодня</option>
                        <option value="week" @selected($period === 'week')>Неделя</option>
                        <option value="month" @selected($period === 'month')>Месяц</option>
                        <option value="year" @selected($period === 'year')>Год</option>
                    </x-select>
                </form>
                <x-button variant="solid" color="primary"
                    href="{{ route('manager.dashboard.export', ['period' => $period]) }}">
                    Скачать отчет
                </x-button>
            </div>
        </div>

        <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
            <div
                class="rounded-2xl border border-slate-200/70 bg-white p-4 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5 dark:shadow-none">
                <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Заказы</p>
                <p class="mt-3 text-3xl font-semibold text-slate-900 dark:text-white">{{ $ordersCount }}</p>
                <p class="mt-1 text-xs text-slate-400">в выбранном периоде</p>
            </div>
            <div
                class="rounded-2xl border border-indigo-200/70 bg-indigo-50/70 p-4 shadow-sm shadow-slate-900/5 dark:border-indigo-500/20 dark:bg-indigo-500/10 dark:shadow-none">
                <p class="text-xs uppercase tracking-[0.3em] text-indigo-500">Выручка</p>
                <p class="mt-3 text-3xl font-semibold text-indigo-700 dark:text-indigo-200">
                    {{ number_format($totalRevenue, 2, '.', ' ') }} с
                </p>
                <p class="mt-1 text-xs text-indigo-400/80">валовая сумма</p>
            </div>
            <div
                class="rounded-2xl border border-amber-200/70 bg-amber-50/70 p-4 shadow-sm shadow-slate-900/5 dark:border-amber-500/20 dark:bg-amber-500/10 dark:shadow-none">
                <p class="text-xs uppercase tracking-[0.3em] text-amber-600">Скидки</p>
                <p class="mt-3 text-3xl font-semibold text-amber-700 dark:text-amber-200">
                    {{ number_format($totalDiscount, 2, '.', ' ') }} с
                </p>
                <p class="mt-1 text-xs text-amber-500/80">итого скидок</p>
            </div>
            <div
                class="rounded-2xl border border-emerald-200/70 bg-emerald-50/70 p-4 shadow-sm shadow-slate-900/5 dark:border-emerald-500/20 dark:bg-emerald-500/10 dark:shadow-none">
                <p class="text-xs uppercase tracking-[0.3em] text-emerald-600">Средний чек</p>
                <p class="mt-3 text-3xl font-semibold text-emerald-700 dark:text-emerald-200">
                    {{ number_format($avgOrder, 2, '.', ' ') }} с
                </p>
                <p class="mt-1 text-xs text-emerald-500/80">на заказ</p>
            </div>
        </div>

        <div class="grid gap-4 lg:grid-cols-[2fr_1fr]">
            <div
                class="rounded-2xl border border-slate-200/70 bg-white/70 p-5 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5 dark:shadow-none">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <div>
                        <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Динамика</p>
                        <h2 class="mt-2 text-xl font-semibold text-slate-900 dark:text-white">Выручка по периодам</h2>
                    </div>
                    <div class="text-xs text-slate-400">сумма, с</div>
                </div>
                <div class="mt-6 grid gap-3">
                    @foreach ($chartData as $point)
                        @php
                            $width = $point['value'] > 0 ? ($point['value'] / $maxChart) * 100 : 2;
                        @endphp
                        <div class="flex items-center gap-3">
                            <div class="w-14 text-xs text-slate-500">{{ $point['label'] }}</div>
                            <div class="h-2 flex-1 rounded-full bg-slate-100 dark:bg-slate-800/50">
                                <div class="h-2 rounded-full bg-indigo-500" style="width: {{ $width }}%"></div>
                            </div>
                            <div class="w-24 text-right text-xs text-slate-500">
                                {{ number_format($point['value'], 0, '.', ' ') }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div
                class="rounded-2xl border border-slate-200/70 bg-white/70 p-5 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5 dark:shadow-none">
                <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Мои топ клиенты</p>
                <div class="mt-4 grid gap-3">
                    @forelse ($topClients as $row)
                        <div class="flex items-center justify-between text-sm">
                            <div>
                                <p class="font-semibold text-slate-900 dark:text-white">
                                    {{ $row->client?->full_name ?? 'Без имени' }}
                                </p>
                                <p class="text-xs text-slate-400">{{ $row->orders_count }} заказов</p>
                            </div>
                            <div class="text-right text-slate-600 dark:text-slate-300">
                                {{ number_format($row->total_amount, 2, '.', ' ') }} с
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-slate-500">Нет данных за период.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
