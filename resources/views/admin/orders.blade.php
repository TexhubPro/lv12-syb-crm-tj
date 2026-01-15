@extends('admin.layouts.app')

@section('title', 'Заказы')

@section('content')
    <div class="grid gap-8">
        <div class="flex flex-wrap items-start justify-between gap-4">
            <div>
                <p class="text-xs uppercase tracking-[0.4em] text-slate-500 dark:text-slate-500">Заказы</p>
                <h1 class="mt-3 text-3xl font-semibold text-slate-900 dark:text-white">Список заказов</h1>
                <p class="mt-2 max-w-xl text-sm text-slate-500 dark:text-slate-400">
                    Просматривайте оформленные заказы, проверяйте итоговую сумму и ответственного менеджера.
                </p>
            </div>
        </div>

        @if (session('status'))
            <x-alert variant="success" title="Готово">
                {{ session('status') }}
            </x-alert>
        @endif

        <div
            class="rounded-2xl max-w-[calc(100vw-30px)] border border-slate-200/70 bg-white/70 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5 dark:shadow-none">
            <div class="flex flex-col">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full relative">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-slate-200/70 dark:divide-white/10">
                                <thead>
                                    <tr class="text-slate-500">
                                        <th class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                            Номер
                                        </th>
                                        <th class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                            Клиент
                                        </th>
                                        <th class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                            Оформил
                                        </th>
                                        <th class="px-6 py-4 text-xs font-semibold text-right uppercase tracking-[0.3em]">
                                            Итого
                                        </th>
                                        <th class="px-6 py-4 text-xs font-semibold text-right uppercase tracking-[0.3em]">
                                            Действия
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-200/70 dark:divide-white/10">
                                    @forelse ($orders as $order)
                                        <tr class="text-slate-800 dark:text-slate-100">
                                            <td class="px-6 py-5 text-sm font-semibold whitespace-nowrap">
                                                #{{ $order->id }}
                                                <div class="mt-1 text-xs font-normal text-slate-400">
                                                    {{ $order->created_at->format('d.m.Y') }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-5 text-sm whitespace-nowrap">
                                                <div class="font-semibold text-slate-900 dark:text-white">
                                                    {{ $order->client?->full_name ?? 'Не указан' }}
                                                </div>
                                                <div class="text-xs text-slate-400">
                                                    {{ $order->client?->phone ?? 'Без телефона' }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-5 text-sm whitespace-nowrap">
                                                <div class="font-semibold text-slate-900 dark:text-white">
                                                    {{ $order->user?->name ?? ($order->user?->phone ?? 'Система') }}
                                                </div>
                                                <div class="text-xs text-slate-400">менеджер</div>
                                            </td>
                                            <td class="px-6 py-5 text-sm font-semibold text-right whitespace-nowrap">
                                                {{ number_format($order->grand_total, 2, '.', ' ') }}
                                            </td>
                                            <td class="px-6 py-5 text-sm font-medium text-right whitespace-nowrap">
                                                <div class="flex items-center justify-end gap-2">
                                                    <x-button size="sm" variant="faded" color="default"
                                                        icon-only="true" aria-label="Скачать чек"
                                                        href="{{ route('admin.orders.receipt', $order) }}">
                                                        <x-icon type="outline" icon="file-invoice" size="5"></x-icon>
                                                    </x-button>
                                                    <x-button size="sm" variant="faded" color="default"
                                                        icon-only="true" aria-label="Скачать Excel"
                                                        href="{{ route('admin.orders.excel', $order) }}">
                                                        <x-icon type="outline" icon="file-excel" size="5"></x-icon>
                                                    </x-button>
                                                    <x-button size="sm" variant="faded" color="default"
                                                        icon-only="true" aria-label="Просмотр"
                                                        href="{{ route('admin.orders.show', $order) }}">
                                                        <x-icon type="outline" icon="eye" size="5"></x-icon>
                                                    </x-button>
                                                    <form method="POST"
                                                        action="{{ route('admin.orders.destroy', $order) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-button type="submit" size="sm" variant="ghost"
                                                            color="danger" icon-only="true" aria-label="Удалить">
                                                            <x-icon type="outline" icon="trash" size="5"></x-icon>
                                                        </x-button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="px-6 py-10 text-center text-sm text-slate-500">
                                                Пока нет заказов. Создайте первый заказ в кассе.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
