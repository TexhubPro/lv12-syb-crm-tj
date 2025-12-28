@extends('manager.layouts.app')

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
                    <x-button variant="faded" color="blue" href="{{ route('manager.orders.receipt', $order) }}">
                        Скачать чек
                    </x-button>
                    <x-button variant="faded" color="warning" href="{{ route('manager.orders.excel', $order) }}">
                        Скачать Excel
                    </x-button>
                    <x-button variant="faded" color="success" href="{{ route('manager.orders.edit', $order) }}">
                        Редактировать заказ
                    </x-button>
                    <form method="POST" action="{{ route('manager.orders.destroy', $order) }}">
                        @csrf
                        @method('DELETE')
                        <x-button type="submit" variant="" color="danger">
                            Удалить заказ
                        </x-button>
                        <x-button variant="faded" color="info" href="{{ route('manager.orders.index') }}">
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
                    class="rounded-2xl border border-rose-200/70 bg-rose-50/70 p-4 shadow-sm shadow-slate-900/5 dark:border-rose-500/20 dark:bg-rose-500/10 dark:shadow-none">
                    <div class="flex items-center gap-2 text-xs uppercase tracking-[0.3em] text-rose-600">
                        <x-icon type="outline" icon="cash-minus" size="4"></x-icon>
                        Переделки
                    </div>
                    <p class="mt-3 text-2xl font-semibold text-rose-700 dark:text-rose-200">
                        {{ number_format($order->rework_amount, 2, '.', ' ') }}
                    </p>
                    <p class="mt-1 text-xs text-rose-500/80">корректировки</p>
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
                class="rounded-2xl border border-slate-200/70 bg-white p-5 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5 dark:shadow-none">
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
                class="rounded-2xl border border-slate-200/70 bg-white p-5 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5 dark:shadow-none">
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
                class="rounded-2xl border border-slate-200/70 bg-white p-5 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5 dark:shadow-none">
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
            class="rounded-2xl border border-slate-200/70 bg-white p-5 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5 dark:shadow-none">
            <div class="flex items-center gap-2 text-xs uppercase tracking-[0.3em] text-slate-500">
                <x-icon type="outline" icon="notes" size="4"></x-icon>
                Комментарий
            </div>
            <p class="mt-3 text-sm text-slate-600 dark:text-slate-300">
                {{ $order->comment ?: 'Комментарий не указан.' }}
            </p>
        </div>

        @php
            $subOrdersCount = $order->subOrders->count();
            $subOrdersArea = $order->subOrders->sum('area');
            $subOrdersTotal = $order->subOrders->sum('total');
            $subOrdersAmount = $order->subOrders->sum('amount');
            $subOrdersDiscount = $order->subOrders->sum('discount');
        @endphp

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
                        {{ $subOrdersCount }} позиций
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

            <div class="flex flex-col">
                <div class="overflow-x-auto ">
                    <div class="inline-block max-w-[calc(100vw-30px)] lg:max-w-[calc(100vw-300px)]">
                        <div class="overflow-hidden overflow-x-auto">
                            <table class="min-w-full divide-y divide-slate-200/70 dark:divide-white/10">
                                <thead>
                                    <tr class="text-slate-500">
                                        <th class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                            Тип
                                        </th>
                                        <th class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                            Вид
                                        </th>
                                        <th class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                            Тип карниза
                                        </th>
                                        <th class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                            Код ткани
                                        </th>
                                        <th class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                            Цвет профиля
                                        </th>
                                        <th class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                            Тип управления
                                        </th>
                                        <th class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                            Комната
                                        </th>
                                        <th class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                            Разделения
                                        </th>
                                        <th class="px-6 py-4 text-xs font-semibold text-right uppercase tracking-[0.3em]">
                                            Ширина
                                        </th>
                                        <th class="px-6 py-4 text-xs font-semibold text-right uppercase tracking-[0.3em]">
                                            Высота
                                        </th>
                                        <th class="px-6 py-4 text-xs font-semibold text-right uppercase tracking-[0.3em]">
                                            Кол-во
                                        </th>
                                        <th class="px-6 py-4 text-xs font-semibold text-right uppercase tracking-[0.3em]">
                                            Площадь
                                        </th>
                                        <th class="px-6 py-4 text-xs font-semibold text-right uppercase tracking-[0.3em]">
                                            Цена
                                        </th>
                                        <th class="px-6 py-4 text-xs font-semibold text-right uppercase tracking-[0.3em]">
                                            Сумма
                                        </th>
                                        <th class="px-6 py-4 text-xs font-semibold text-right uppercase tracking-[0.3em]">
                                            Скидка
                                        </th>
                                        <th class="px-6 py-4 text-xs font-semibold text-right uppercase tracking-[0.3em]">
                                            Итого
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-200/70 dark:divide-white/10">
                                    @forelse ($order->subOrders as $subOrder)
                                        <tr class="text-sm text-slate-700 dark:text-slate-200">
                                            <td
                                                class="px-6 py-5 font-semibold whitespace-nowrap text-slate-900 dark:text-white">
                                                {{ $subOrder->order_kind ?? '—' }}
                                            </td>
                                            <td class="px-6 py-5 whitespace-nowrap">
                                                {{ $subOrder->orderType?->name ?? '—' }}
                                            </td>
                                            <td class="px-6 py-5 whitespace-nowrap">
                                                {{ $subOrder->corniceType?->name ?? '—' }}
                                            </td>
                                            <td class="px-6 py-5 whitespace-nowrap">
                                                {{ $subOrder->fabricCode?->name ?? '—' }}
                                            </td>
                                            <td class="px-6 py-5 whitespace-nowrap">
                                                {{ $subOrder->profileColor?->name ?? '—' }}
                                            </td>
                                            <td class="px-6 py-5 whitespace-nowrap">
                                                {{ $subOrder->controlType?->name ?? '—' }}
                                            </td>
                                            <td class="px-6 py-5 whitespace-nowrap">
                                                {{ $subOrder->room ?? '—' }}
                                            </td>
                                            <td class="px-6 py-5 whitespace-nowrap">
                                                {{ $subOrder->division ?? '—' }}
                                            </td>
                                            <td class="px-6 py-5 text-right whitespace-nowrap">
                                                {{ number_format($subOrder->width, 2, '.', ' ') }}
                                            </td>
                                            <td class="px-6 py-5 text-right whitespace-nowrap">
                                                {{ number_format($subOrder->height, 2, '.', ' ') }}
                                            </td>
                                            <td class="px-6 py-5 text-right whitespace-nowrap">{{ $subOrder->quantity }}
                                            </td>
                                            <td class="px-6 py-5 text-right whitespace-nowrap">
                                                {{ number_format($subOrder->area, 2, '.', ' ') }}
                                            </td>
                                            <td class="px-6 py-5 text-right whitespace-nowrap">
                                                {{ number_format($subOrder->price, 2, '.', ' ') }}
                                            </td>
                                            <td class="px-6 py-5 text-right whitespace-nowrap">
                                                {{ number_format($subOrder->amount, 2, '.', ' ') }}
                                            </td>
                                            <td class="px-6 py-5 text-right whitespace-nowrap">
                                                {{ number_format($subOrder->discount, 2, '.', ' ') }}
                                            </td>
                                            <td
                                                class="px-6 py-5 text-right font-semibold whitespace-nowrap text-slate-900 dark:text-white">
                                                {{ number_format($subOrder->total, 2, '.', ' ') }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="16" class="px-6 py-10 text-center text-sm text-slate-500">
                                                В этом заказе пока нет подзаказов.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                @if ($order->subOrders->isNotEmpty())
                                    <tfoot>
                                        <tr class="text-sm text-slate-900 dark:text-white">
                                            <td colspan="11" class="px-6 py-5 text-right font-semibold">
                                                Итоги по позициям
                                            </td>
                                            <td class="px-6 py-5 text-right font-semibold">
                                                {{ number_format($subOrdersArea, 2, '.', ' ') }}
                                            </td>
                                            <td class="px-6 py-5 text-right font-semibold"></td>
                                            <td class="px-6 py-5 text-right font-semibold">
                                                {{ number_format($subOrdersAmount, 2, '.', ' ') }}
                                            </td>
                                            <td class="px-6 py-5 text-right font-semibold">
                                                {{ number_format($subOrdersDiscount, 2, '.', ' ') }}
                                            </td>
                                            <td class="px-6 py-5 text-right font-semibold">
                                                {{ number_format($subOrdersTotal, 2, '.', ' ') }}
                                            </td>
                                        </tr>
                                    </tfoot>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
