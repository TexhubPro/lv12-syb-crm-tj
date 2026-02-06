@extends('admin.layouts.app')

@section('title', 'Детали заказа')

@section('content')
    <div class="grid gap-8">
        <div
            class="rounded-2xl border border-slate-200/70 bg-gradient-to-br from-white via-white/90 to-indigo-50/70 p-6 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-[radial-gradient(circle_at_top,_rgba(79,70,229,0.18),_transparent_60%),radial-gradient(circle_at_bottom,_rgba(14,116,144,0.18),_transparent_60%)] dark:shadow-none">
            <div class="flex flex-wrap items-start justify-between gap-4">
                <div>
                    <div class="flex items-center gap-2 text-xs uppercase tracking-[0.4em] text-slate-500">
                        <x-icon type="outline" icon="hash" size="4"></x-icon>
                        Заказ
                    </div>
                    <h1 class="mt-3 text-3xl font-semibold text-slate-900 dark:text-white">
                        Заказ #{{ $order->id }}
                    </h1>
                    <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">
                        Дата создания: {{ $order->created_at->format('d.m.Y H:i') }}
                    </p>
                </div>
                <div class="flex flex-wrap items-center gap-2">
                    <x-button variant="faded" color="blue" href="{{ route('admin.orders.receipt', $order) }}">
                        Скачать чек
                    </x-button>
                    <x-button variant="faded" color="warning" href="{{ route('admin.orders.excel', $order) }}">
                        Скачать Excel
                    </x-button>
                    <form method="POST" action="{{ route('admin.orders.destroy', $order) }}">
                        @csrf
                        @method('DELETE')
                        <x-button type="submit" variant="" color="danger">
                            Удалить заказ
                        </x-button>
                        <x-button variant="faded" color="" href="{{ route('admin.orders.index') }}">
                            Вернуться к списку
                        </x-button>
                    </form>
                </div>
            </div>

            <div class="mt-6 grid gap-3 sm:grid-cols-2 lg:grid-cols-5">
                <div
                    class="rounded-2xl border border-slate-200/70 bg-white/70 p-4 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5 dark:shadow-none">
                    <div class="flex items-center gap-2 text-xs uppercase tracking-[0.3em] text-slate-500">
                        <x-icon type="outline" icon="cash-banknote" size="4"></x-icon>
                        Итог заказа
                    </div>
                    <p class="mt-3 text-2xl font-semibold text-slate-900 dark:text-white">
                        {{ number_format($order->grand_total, 2, '.', ' ') }}
                    </p>
                    <p class="mt-1 text-xs text-slate-400">с учетом скидок</p>
                </div>
                <div
                    class="rounded-2xl border border-emerald-200/70 bg-emerald-50/70 p-4 shadow-sm shadow-slate-900/5 dark:border-emerald-500/20 dark:bg-emerald-500/10 dark:shadow-none">
                    <div class="flex items-center gap-2 text-xs uppercase tracking-[0.3em] text-emerald-600">
                        <x-icon type="outline" icon="cash" size="4"></x-icon>
                        Оплаченная сумма
                    </div>
                    <p class="mt-3 text-2xl font-semibold text-emerald-700 dark:text-emerald-200">
                        {{ number_format($order->advance_amount, 2, '.', ' ') }}
                    </p>
                    <p class="mt-1 text-xs text-emerald-500/80">оплачено</p>
                </div>
                <div
                    class="rounded-2xl border border-amber-200/70 bg-amber-50/70 p-4 shadow-sm shadow-slate-900/5 dark:border-amber-500/20 dark:bg-amber-500/10 dark:shadow-none">
                    <div class="flex items-center gap-2 text-xs uppercase tracking-[0.3em] text-amber-600">
                        <x-icon type="outline" icon="discount" size="4"></x-icon>
                        Скидка
                    </div>
                    <p class="mt-3 text-2xl font-semibold text-amber-700 dark:text-amber-200">
                        {{ number_format($order->order_total_discounted, 2, '.', ' ') }}
                    </p>
                    <p class="mt-1 text-xs text-amber-500/80">по заказу</p>
                </div>
                <div
                    class="rounded-2xl border border-indigo-200/70 bg-indigo-50/70 p-4 shadow-sm shadow-slate-900/5 dark:border-indigo-500/20 dark:bg-indigo-500/10 dark:shadow-none">
                    <div class="flex items-center gap-2 text-xs uppercase tracking-[0.3em] text-indigo-600">
                        <x-icon type="outline" icon="wallet" size="4"></x-icon>
                        Остаток
                    </div>
                    <p class="mt-3 text-2xl font-semibold text-indigo-700 dark:text-indigo-200">
                        {{ number_format($order->balance_amount, 2, '.', ' ') }}
                    </p>
                    <p class="mt-1 text-xs text-indigo-500/80">к оплате</p>
                </div>
            </div>
        </div>

        <div class="grid gap-4 lg:grid-cols-3">
            <div
                class="rounded-[24px] border border-slate-200/70 bg-white p-5 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5 dark:shadow-none">
                <div class="flex items-center gap-2 text-xs uppercase tracking-[0.3em] text-slate-500">
                    <x-icon type="outline" icon="user-circle" size="4"></x-icon>
                    Клиент
                </div>
                <p class="mt-3 text-lg font-semibold text-slate-900 dark:text-white">
                    {{ $order->client?->full_name ?? 'Не указан' }}
                </p>
                <div class="mt-4 grid gap-2 text-sm text-slate-500">
                    <div class="flex items-center gap-2">
                        <x-icon type="outline" icon="phone" size="4"></x-icon>
                        <span>{{ $order->client?->phone ?? 'Без телефона' }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <x-icon type="outline" icon="map-pin" size="4"></x-icon>
                        <span>{{ $order->client?->address ?? 'Адрес не указан' }}</span>
                    </div>
                </div>
                @if ($order->client?->comment)
                    <div class="mt-4 rounded-xl border border-slate-200/70 bg-slate-50/70 p-3 text-xs text-slate-500">
                        {{ $order->client->comment }}
                    </div>
                @endif
            </div>
            <div
                class="rounded-[24px] border border-slate-200/70 bg-white p-5 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5 dark:shadow-none">
                <div class="flex items-center gap-2 text-xs uppercase tracking-[0.3em] text-slate-500">
                    <x-icon type="outline" icon="user-cog" size="4"></x-icon>
                    Оформление
                </div>
                <p class="mt-3 text-lg font-semibold text-slate-900 dark:text-white">
                    {{ $order->user?->name ?? ($order->user?->phone ?? 'Система') }}
                </p>
                <p class="mt-1 text-sm text-slate-500">Менеджер</p>
                <div class="mt-4 grid gap-2 text-sm text-slate-500">
                    <div class="flex items-center justify-between">
                        <span>Мотор</span>
                        <span class="font-medium text-slate-900 dark:text-white">{{ $order->motor ?? '—' }}</span>
                    </div>

                </div>
            </div>
            <div
                class="rounded-[24px] border border-slate-200/70 bg-white p-5 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5 dark:shadow-none">
                <div class="flex items-center gap-2 text-xs uppercase tracking-[0.3em] text-slate-500">
                    <x-icon type="outline" icon="clipboard-list" size="4"></x-icon>
                    Итоги
                </div>
                <div class="mt-4 grid gap-2 text-sm text-slate-500">
                    <div class="flex items-center justify-between">
                        <span>Сумма заказа</span>
                        <span class="font-medium text-slate-900 dark:text-white">
                            {{ number_format($order->order_total, 2, '.', ' ') }}
                        </span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span>Сумма скидки</span>
                        <span class="font-medium text-slate-900 dark:text-white">
                            {{ number_format($order->order_total_discounted, 2, '.', ' ') }}
                        </span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span>Итого</span>
                        <span class="text-base font-semibold text-slate-900 dark:text-white">
                            {{ number_format($order->grand_total, 2, '.', ' ') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="rounded-[24px] border border-slate-200/70 bg-white p-5 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5 dark:shadow-none">
            <div class="flex items-center gap-2 text-xs uppercase tracking-[0.3em] text-slate-500">
                <x-icon type="outline" icon="notes" size="4"></x-icon>
                Комментарий
            </div>
            <p class="mt-3 text-sm text-slate-600 dark:text-slate-300">
                {{ $order->comment ?: 'Комментарий не указан.' }}
            </p>
        </div>

        <div
            class="rounded-2xl border border-slate-200/70 bg-white/70 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5 dark:shadow-none">
            <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-200/70 px-6 py-5">
                <div>
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Подзаказы</p>
                    <h2 class="mt-2 text-xl font-semibold text-slate-900 dark:text-white">Состав заказа</h2>
                </div>
                <div class="flex flex-wrap items-center gap-2 text-xs text-slate-500">
                    <div class="flex items-center gap-2 rounded-full border border-slate-200/70 bg-white/70 px-3 py-1">
                        <x-icon type="outline" icon="list-details" size="4"></x-icon>
                        {{ $subOrders->count() }} позиций
                    </div>
                    <div class="flex items-center gap-2 rounded-full border border-slate-200/70 bg-white/70 px-3 py-1">
                        <x-icon type="outline" icon="map-pin" size="4"></x-icon>
                        {{ number_format($subOrdersArea, 2, '.', ' ') }} м²
                    </div>
                    <div class="flex items-center gap-2 rounded-full border border-slate-200/70 bg-white/70 px-3 py-1">
                        <x-icon type="outline" icon="cash-banknote" size="4"></x-icon>
                        {{ number_format($subOrdersTotal, 2, '.', ' ') }}
                    </div>
                </div>
            </div>

            @php
                $groupedSubOrders = $subOrders->groupBy(function ($subOrder) {
                    return $subOrder->orderType?->parent?->id ?? $subOrder->orderType?->id ?? 0;
                });
            @endphp
            @if ($subOrders->isEmpty())
                <div class="px-6 py-10 text-center text-sm text-slate-500">
                    В этом заказе пока нет подзаказов.
                </div>
            @else
                @foreach ($groupedSubOrders as $group)
                    @php
                        $visibleFields = $group
                            ->flatMap(function ($subOrder) {
                                return $subOrder->orderType?->fields?->pluck('key') ?? collect();
                            })
                            ->unique()
                            ->values();
                        $visibleColumns = collect([
                            'cornice_type',
                            'fabric_code',
                            'profile_color',
                            'control_type',
                            'room',
                            'division',
                            'width',
                            'height',
                            'quantity',
                            'area',
                            'price',
                            'amount',
                            'discount',
                            'total',
                            'note',
                            'corsage',
                            'tape',
                            'sewing',
                            'installation',
                            'motor',
                            'tiebacks',
                        ])->filter(fn($key) => $visibleFields->contains($key));
                        $columnCount = 2 + $visibleColumns->count();
                        $summaryKeys = ['area', 'amount', 'discount', 'total'];
                        $summaryVisible = $visibleColumns->filter(fn($key) => in_array($key, $summaryKeys, true));
                        $nonSummaryCount = 2 + $visibleColumns
                            ->reject(fn($key) => in_array($key, $summaryKeys, true))
                            ->count();
                        $groupTitle = $group->first()?->orderType?->parent?->name ?? $group->first()?->orderType?->name ?? '—';
                        $groupArea = $group->sum('area');
                        $groupAmount = $group->sum('amount');
                        $groupDiscount = $group->sum(function ($subOrder) {
                            $amount = (float) ($subOrder->amount ?? 0);
                            $total = (float) ($subOrder->total ?? 0);
                            return max(0, $amount - $total);
                        });
                        $groupTotal = $group->sum('total');
                    @endphp
                    <div class="flex flex-col">
                        <div class="mb-3 text-xs uppercase tracking-[0.3em] text-slate-500">
                            {{ $groupTitle }}
                        </div>
                        <div class="overflow-x-auto">
                            <div class="inline-block max-w-[calc(100vw-30px)] lg:max-w-[calc(100vw-300px)]">
                                <div class="overflow-hidden overflow-x-auto">
                                    <table class="min-w-full divide-y divide-slate-200/70 dark:divide-white/10">
                                        <thead>
                                            <tr class="text-slate-500">
                                                <th class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                                    Группа
                                                </th>
                                                <th class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                                    Вид
                                                </th>
                                                @if ($visibleFields->contains('cornice_type'))
                                                    <th
                                                        class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                                        Тип карниза
                                                    </th>
                                                @endif
                                                @if ($visibleFields->contains('fabric_code'))
                                                    <th
                                                        class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                                        Код ткани
                                                    </th>
                                                @endif
                                                @if ($visibleFields->contains('profile_color'))
                                                    <th
                                                        class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                                        Цвет профиля
                                                    </th>
                                                @endif
                                                @if ($visibleFields->contains('control_type'))
                                                    <th
                                                        class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                                        Тип управления
                                                    </th>
                                                @endif
                                                @if ($visibleFields->contains('room'))
                                                    <th
                                                        class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                                        Комната
                                                    </th>
                                                @endif
                                                @if ($visibleFields->contains('division'))
                                                    <th
                                                        class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                                        Разделения
                                                    </th>
                                                @endif
                                                @if ($visibleFields->contains('width'))
                                                    <th
                                                        class="px-6 py-4 text-xs font-semibold text-right uppercase tracking-[0.3em]">
                                                        Ширина
                                                    </th>
                                                @endif
                                                @if ($visibleFields->contains('height'))
                                                    <th
                                                        class="px-6 py-4 text-xs font-semibold text-right uppercase tracking-[0.3em]">
                                                        Высота
                                                    </th>
                                                @endif
                                                @if ($visibleFields->contains('quantity'))
                                                    <th
                                                        class="px-6 py-4 text-xs font-semibold text-right uppercase tracking-[0.3em]">
                                                        Кол-во
                                                    </th>
                                                @endif
                                                @if ($visibleFields->contains('area'))
                                                    <th
                                                        class="px-6 py-4 text-xs font-semibold text-right uppercase tracking-[0.3em]">
                                                        Площадь
                                                    </th>
                                                @endif
                                                @if ($visibleFields->contains('price'))
                                                    <th
                                                        class="px-6 py-4 text-xs font-semibold text-right uppercase tracking-[0.3em]">
                                                        Цена
                                                    </th>
                                                @endif
                                                @if ($visibleFields->contains('amount'))
                                                    <th
                                                        class="px-6 py-4 text-xs font-semibold text-right uppercase tracking-[0.3em]">
                                                        Сумма
                                                    </th>
                                                @endif
                                                @if ($visibleFields->contains('discount'))
                                                    <th
                                                        class="px-6 py-4 text-xs font-semibold text-right uppercase tracking-[0.3em]">
                                                        Скидка
                                                    </th>
                                                @endif
                                                @if ($visibleFields->contains('total'))
                                                    <th
                                                        class="px-6 py-4 text-xs font-semibold text-right uppercase tracking-[0.3em]">
                                                        Итого
                                                    </th>
                                                @endif
                                                @if ($visibleFields->contains('note'))
                                                    <th
                                                        class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                                        Примечания
                                                    </th>
                                                @endif
                                                @if ($visibleFields->contains('corsage'))
                                                    <th
                                                        class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                                        Карсаж
                                                    </th>
                                                @endif
                                                @if ($visibleFields->contains('tape'))
                                                    <th
                                                        class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                                        Лента
                                                    </th>
                                                @endif
                                                @if ($visibleFields->contains('sewing'))
                                                    <th
                                                        class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                                        Пошив
                                                    </th>
                                                @endif
                                                @if ($visibleFields->contains('installation'))
                                                    <th
                                                        class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                                        Монтаж
                                                    </th>
                                                @endif
                                                @if ($visibleFields->contains('motor'))
                                                    <th
                                                        class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                                        Мотор
                                                    </th>
                                                @endif
                                                @if ($visibleFields->contains('tiebacks'))
                                                    <th
                                                        class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                                        Прихваты
                                                    </th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-slate-200/70 dark:divide-white/10">
                                            @foreach ($group as $subOrder)
                                                <tr class="text-sm text-slate-700 dark:text-slate-200">
                                                    <td
                                                        class="px-6 py-5 font-semibold whitespace-nowrap text-slate-900 dark:text-white">
                                                        {{ $subOrder->orderType?->parent?->name ?? $subOrder->orderType?->name ?? '—' }}
                                                    </td>
                                                    <td class="px-6 py-5 whitespace-nowrap">
                                                        {{ $subOrder->orderType?->name ?? '—' }}
                                                    </td>
                                                    @if ($visibleFields->contains('cornice_type'))
                                                        <td class="px-6 py-5 whitespace-nowrap">
                                                            {{ $subOrder->corniceType?->name ?? '—' }}
                                                        </td>
                                                    @endif
                                                    @if ($visibleFields->contains('fabric_code'))
                                                        <td class="px-6 py-5 whitespace-nowrap">
                                                            {{ $subOrder->fabricCode?->name ?? '—' }}
                                                        </td>
                                                    @endif
                                                    @if ($visibleFields->contains('profile_color'))
                                                        <td class="px-6 py-5 whitespace-nowrap">
                                                            {{ $subOrder->profileColor?->name ?? '—' }}
                                                        </td>
                                                    @endif
                                                    @if ($visibleFields->contains('control_type'))
                                                        <td class="px-6 py-5 whitespace-nowrap">
                                                            {{ $subOrder->controlType?->name ?? '—' }}
                                                        </td>
                                                    @endif
                                                    @if ($visibleFields->contains('room'))
                                                        <td class="px-6 py-5 whitespace-nowrap">
                                                            {{ $subOrder->room ?? '—' }}
                                                        </td>
                                                    @endif
                                                    @if ($visibleFields->contains('division'))
                                                        <td class="px-6 py-5 whitespace-nowrap">
                                                            {{ $subOrder->division ?? '—' }}
                                                        </td>
                                                    @endif
                                                    @if ($visibleFields->contains('width'))
                                                        <td class="px-6 py-5 text-right whitespace-nowrap">
                                                            {{ number_format($subOrder->width, 2, '.', ' ') }}
                                                        </td>
                                                    @endif
                                                    @if ($visibleFields->contains('height'))
                                                        <td class="px-6 py-5 text-right whitespace-nowrap">
                                                            {{ number_format($subOrder->height, 2, '.', ' ') }}
                                                        </td>
                                                    @endif
                                                    @if ($visibleFields->contains('quantity'))
                                                        <td class="px-6 py-5 text-right whitespace-nowrap">
                                                            {{ $subOrder->quantity }}
                                                        </td>
                                                    @endif
                                                    @if ($visibleFields->contains('area'))
                                                        <td class="px-6 py-5 text-right whitespace-nowrap">
                                                            {{ number_format($subOrder->area, 2, '.', ' ') }}
                                                        </td>
                                                    @endif
                                                    @if ($visibleFields->contains('price'))
                                                        <td class="px-6 py-5 text-right whitespace-nowrap">
                                                            {{ number_format($subOrder->price, 2, '.', ' ') }}
                                                        </td>
                                                    @endif
                                                    @if ($visibleFields->contains('amount'))
                                                        <td class="px-6 py-5 text-right whitespace-nowrap">
                                                            {{ number_format($subOrder->amount, 2, '.', ' ') }}
                                                        </td>
                                                    @endif
                                                    @if ($visibleFields->contains('discount'))
                                                        <td class="px-6 py-5 text-right whitespace-nowrap">
                                                            {{ number_format($subOrder->discount, 2, '.', ' ') }}
                                                        </td>
                                                    @endif
                                                    @if ($visibleFields->contains('total'))
                                                        <td
                                                            class="px-6 py-5 text-right font-semibold whitespace-nowrap text-slate-900 dark:text-white">
                                                            {{ number_format($subOrder->total, 2, '.', ' ') }}
                                                        </td>
                                                    @endif
                                                    @if ($visibleFields->contains('note'))
                                                        <td class="px-6 py-5 whitespace-nowrap">
                                                            {{ $subOrder->note ?? '—' }}
                                                        </td>
                                                    @endif
                                                    @if ($visibleFields->contains('corsage'))
                                                        <td class="px-6 py-5 whitespace-nowrap">
                                                            {{ $subOrder->corsage ?? '—' }}
                                                        </td>
                                                    @endif
                                                    @if ($visibleFields->contains('tape'))
                                                        <td class="px-6 py-5 whitespace-nowrap">
                                                            {{ $subOrder->tape ?? '—' }}
                                                        </td>
                                                    @endif
                                                    @if ($visibleFields->contains('sewing'))
                                                        <td class="px-6 py-5 whitespace-nowrap">
                                                            {{ $subOrder->sewing ?? '—' }}
                                                        </td>
                                                    @endif
                                                    @if ($visibleFields->contains('installation'))
                                                        <td class="px-6 py-5 whitespace-nowrap">
                                                            {{ $subOrder->installation ?? '—' }}
                                                        </td>
                                                    @endif
                                                    @if ($visibleFields->contains('motor'))
                                                        <td class="px-6 py-5 whitespace-nowrap">
                                                            {{ $subOrder->motor ?? '—' }}
                                                        </td>
                                                    @endif
                                                    @if ($visibleFields->contains('tiebacks'))
                                                        <td class="px-6 py-5 whitespace-nowrap">
                                                            {{ $subOrder->tiebacks ?? '—' }}
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        @if ($group->isNotEmpty() && $columnCount > 2)
                                            <tfoot>
                                                <tr class="text-sm text-slate-900 dark:text-white">
                                                    <td colspan="{{ $nonSummaryCount }}"
                                                        class="px-6 py-5 text-right font-semibold">
                                                        Итоги по позициям
                                                    </td>
                                                    @foreach ($summaryVisible as $summaryKey)
                                                        @if ($summaryKey === 'area')
                                                            <td class="px-6 py-5 text-right font-semibold">
                                                                {{ number_format($groupArea, 2, '.', ' ') }}
                                                            </td>
                                                        @elseif ($summaryKey === 'amount')
                                                            <td class="px-6 py-5 text-right font-semibold">
                                                                {{ number_format($groupAmount, 2, '.', ' ') }}
                                                            </td>
                                                        @elseif ($summaryKey === 'discount')
                                                            <td class="px-6 py-5 text-right font-semibold">
                                                                {{ number_format($groupDiscount, 2, '.', ' ') }}
                                                            </td>
                                                        @elseif ($summaryKey === 'total')
                                                            <td class="px-6 py-5 text-right font-semibold">
                                                                {{ number_format($groupTotal, 2, '.', ' ') }}
                                                            </td>
                                                        @endif
                                                    @endforeach
                                                </tr>
                                            </tfoot>
                                        @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
