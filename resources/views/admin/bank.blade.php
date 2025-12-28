@extends('admin.layouts.app')

@section('title', 'Банк')

@section('content')
    <div class="grid gap-8">
        <div class="flex flex-wrap items-start justify-between gap-4">
            <div>
                <p class="text-xs uppercase tracking-[0.4em] text-slate-500 dark:text-slate-500">Финансы</p>
                <h1 class="mt-3 text-3xl font-semibold text-slate-900 dark:text-white">Банк</h1>
                <p class="mt-2 max-w-2xl text-sm text-slate-500 dark:text-slate-400">
                    Управляйте доходами, расходами и долгами. Отслеживайте текущий баланс и историю операций.
                </p>
            </div>
            <x-button size="md" variant="solid" color="primary" data-modal-open="bank-create">
                Добавить операцию
            </x-button>
        </div>

        @if (session('status'))
            <x-alert variant="success" title="Готово">
                {{ session('status') }}
            </x-alert>
        @endif
        @if ($errors->any())
            <x-alert variant="danger" title="Ошибка">
                Проверьте форму и попробуйте снова.
            </x-alert>
        @endif

        <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5">
            <div
                class="rounded-[26px] border border-emerald-200/70 bg-emerald-50/70 p-4 dark:border-emerald-500/20 dark:bg-emerald-500/10">
                <p class="text-xs uppercase tracking-[0.3em] text-emerald-600">Доходы</p>
                <p class="mt-3 text-2xl font-semibold text-emerald-700 dark:text-emerald-200">
                    {{ number_format($stats['income'], 2, '.', ' ') }} с
                </p>
            </div>
            <div
                class="rounded-[26px] border border-rose-200/70 bg-rose-50/70 p-4 dark:border-rose-500/20 dark:bg-rose-500/10">
                <p class="text-xs uppercase tracking-[0.3em] text-rose-600">Расходы</p>
                <p class="mt-3 text-2xl font-semibold text-rose-700 dark:text-rose-200">
                    {{ number_format($stats['expenses'], 2, '.', ' ') }} с
                </p>
            </div>
            <div
                class="rounded-[26px] border border-amber-200/70 bg-amber-50/70 p-4 dark:border-amber-500/20 dark:bg-amber-500/10">
                <p class="text-xs uppercase tracking-[0.3em] text-amber-600">Долги</p>
                <p class="mt-3 text-2xl font-semibold text-amber-700 dark:text-amber-200">
                    {{ number_format($stats['openDebts'], 2, '.', ' ') }} с
                </p>
            </div>
            <div
                class="rounded-[26px] border border-indigo-200/70 bg-indigo-50/70 p-4 dark:border-indigo-500/20 dark:bg-indigo-500/10">
                <p class="text-xs uppercase tracking-[0.3em] text-indigo-600">Оплачено долгов</p>
                <p class="mt-3 text-2xl font-semibold text-indigo-700 dark:text-indigo-200">
                    {{ number_format($stats['paidDebts'], 2, '.', ' ') }} с
                </p>
            </div>
            <div class="rounded-[26px] border border-slate-200/70 bg-white/70 p-4 dark:border-white/10 dark:bg-white/5">
                <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Баланс</p>
                <p class="mt-3 text-2xl font-semibold text-slate-900 dark:text-white">
                    {{ number_format($stats['balance'], 2, '.', ' ') }} с
                </p>
            </div>
        </div>

        <div
            class="rounded-2xl border border-slate-200/70 w-full bg-white/70 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5 dark:shadow-none">
            <div class="flex flex-col w-full">
                <div class="overflow-x-scroll w-full">
                    <div class="inline-block max-w-[calc(100vw-30px)] lg:max-w-[calc(100vw-300px)] w-full">
                        <div class="overflow-hidden overflow-x-auto">
                            <table class="min-w-full divide-y divide-slate-200/70 dark:divide-white/10">
                                <thead>
                                    <tr class="text-slate-500">
                                        <th class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                            Дата
                                        </th>
                                        <th class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                            Операция
                                        </th>
                                        <th class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                            Тип
                                        </th>
                                        <th class="px-6 py-4 text-xs font-semibold text-right uppercase tracking-[0.3em]">
                                            Сумма
                                        </th>
                                        <th class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                            Статус
                                        </th>
                                        <th class="px-6 py-4 text-xs font-semibold text-right uppercase tracking-[0.3em]">
                                            Действия
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-200/70 dark:divide-white/10">
                                    @forelse ($transactions as $transaction)
                                        @php
                                            $typeLabel = match ($transaction->type) {
                                                'income' => 'Доход',
                                                'expense' => 'Расход',
                                                default => 'Долг',
                                            };
                                            $statusLabel =
                                                $transaction->type === 'debt'
                                                    ? ($transaction->is_paid
                                                        ? 'Оплачен'
                                                        : 'Открыт')
                                                    : 'Проведено';
                                            $statusTone =
                                                $transaction->type === 'debt' && !$transaction->is_paid
                                                    ? 'text-amber-600'
                                                    : 'text-emerald-600';
                                        @endphp
                                        <tr class="text-slate-800 dark:text-slate-100">
                                            <td class="px-6 py-5 text-sm whitespace-nowrap">
                                                {{ $transaction->occurred_at->format('d.m.Y') }}
                                            </td>
                                            <td class="px-6 py-5 text-sm">
                                                <p class="font-semibold text-slate-900 dark:text-white">
                                                    {{ $transaction->title }}
                                                </p>
                                                @if ($transaction->description)
                                                    <p class="text-xs text-slate-400">{{ $transaction->description }}</p>
                                                @endif
                                            </td>
                                            <td class="px-6 py-5 text-sm whitespace-nowrap">
                                                {{ $typeLabel }}
                                            </td>
                                            <td class="px-6 py-5 text-sm font-semibold text-right whitespace-nowrap">
                                                {{ number_format($transaction->amount, 2, '.', ' ') }} с
                                            </td>
                                            <td class="px-6 py-5 text-sm whitespace-nowrap">
                                                <span class="{{ $statusTone }}">{{ $statusLabel }}</span>
                                                @if ($transaction->due_date && $transaction->type === 'debt' && !$transaction->is_paid)
                                                    <div class="text-xs text-slate-400">
                                                        до {{ $transaction->due_date->format('d.m.Y') }}
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="px-6 py-5 text-sm font-medium text-right whitespace-nowrap">
                                                <div class="flex items-center justify-end gap-2">
                                                    @if ($transaction->type === 'debt' && !$transaction->is_paid)
                                                        <form method="POST"
                                                            action="{{ route('admin.bank.pay', $transaction) }}">
                                                            @csrf
                                                            <x-button size="sm" variant="faded" color="default">
                                                                Оплатить
                                                            </x-button>
                                                        </form>
                                                    @endif
                                                    <x-button size="sm" variant="faded" color="default"
                                                        icon-only="true" aria-label="Редактировать"
                                                        data-modal-open="bank-edit"
                                                        data-modal-type="{{ $transaction->type }}"
                                                        data-modal-title="{{ $transaction->title }}"
                                                        data-modal-amount="{{ $transaction->amount }}"
                                                        data-modal-occurred-at="{{ $transaction->occurred_at->format('Y-m-d') }}"
                                                        data-modal-due-date="{{ $transaction->due_date?->format('Y-m-d') }}"
                                                        data-modal-description="{{ $transaction->description }}"
                                                        data-modal-action="{{ route('admin.bank.update', $transaction) }}">
                                                        <x-icon type="outline" icon="pencil" size="5"></x-icon>
                                                    </x-button>
                                                    <form method="POST"
                                                        action="{{ route('admin.bank.destroy', $transaction) }}">
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
                                            <td colspan="6" class="px-6 py-10 text-center text-sm text-slate-500">
                                                Пока нет операций. Добавьте первую.
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

    <div class="fixed inset-0 z-40 hidden items-center justify-center bg-slate-900/50 p-4 backdrop-blur"
        data-modal="bank-create">
        <div
            class="w-full max-w-xl rounded-[28px] border border-slate-200/70 bg-white p-6 shadow-xl dark:border-white/10 dark:bg-slate-950">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Новая операция</p>
                    <h2 class="mt-2 text-xl font-semibold text-slate-900 dark:text-white">Создание операции</h2>
                </div>
                <x-button icon-only="true" variant="ghost" color="default" data-modal-close>
                    <x-icon type="outline" icon="x" size="5"></x-icon>
                </x-button>
            </div>
            <form class="mt-6 grid gap-4 max-h-[calc(100vh-300px)] overflow-y-auto" method="POST"
                action="{{ route('admin.bank.store') }}">
                @csrf
                <x-select label="Тип" name="type" required="true" placeholder="Выберите тип">
                    <option value="income">Доход</option>
                    <option value="expense">Расход</option>
                    <option value="debt">Долг</option>
                </x-select>
                <x-input label="Название" name="title" required="true" placeholder="Например: Оплата заказа" />
                <x-input label="Сумма" name="amount" required="true" placeholder="0" />
                <x-input label="Дата операции" name="occurred_at" type="date" required="true"
                    value="{{ now()->format('Y-m-d') }}" />
                <x-input label="Дата оплаты (для долга)" name="due_date" type="date" />
                <x-textarea label="Комментарий" name="description" rows="3"
                    placeholder="Дополнительная информация"></x-textarea>
                <div class="flex items-center justify-end gap-2">
                    <x-button variant="ghost" color="default" data-modal-close>Отмена</x-button>
                    <x-button type="submit" variant="solid" color="primary">Сохранить</x-button>
                </div>
            </form>
        </div>
    </div>

    <div class="fixed inset-0 z-40 hidden items-center justify-center bg-slate-900/50 p-4 backdrop-blur"
        data-modal="bank-edit">
        <div
            class="w-full max-w-xl rounded-[28px] border border-slate-200/70 bg-white p-6 shadow-xl dark:border-white/10 dark:bg-slate-950">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Редактирование</p>
                    <h2 class="mt-2 text-xl font-semibold text-slate-900 dark:text-white">Изменить операцию</h2>
                </div>
                <x-button icon-only="true" variant="ghost" color="default" data-modal-close>
                    <x-icon type="outline" icon="x" size="5"></x-icon>
                </x-button>
            </div>
            <form class="mt-6 grid gap-4" method="POST" data-modal-form>
                @csrf
                @method('PUT')
                <x-select label="Тип" name="type" required="true" data-modal-input="type">
                    <option value="income">Доход</option>
                    <option value="expense">Расход</option>
                    <option value="debt">Долг</option>
                </x-select>
                <x-input label="Название" name="title" required="true" data-modal-input="title" />
                <x-input label="Сумма" name="amount" required="true" data-modal-input="amount" />
                <x-input label="Дата операции" name="occurred_at" type="date" required="true"
                    data-modal-input="occurredAt" />
                <x-input label="Дата оплаты (для долга)" name="due_date" type="date" data-modal-input="dueDate" />
                <x-textarea label="Комментарий" name="description" rows="3"
                    data-modal-input="description"></x-textarea>
                <div class="flex items-center justify-end gap-2">
                    <x-button variant="ghost" color="default" data-modal-close>Отмена</x-button>
                    <x-button type="submit" variant="solid" color="primary">Сохранить</x-button>
                </div>
            </form>
        </div>
    </div>
@endsection
