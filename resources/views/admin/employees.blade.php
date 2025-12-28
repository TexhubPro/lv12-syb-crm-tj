@extends('admin.layouts.app')

@section('title', 'Сотрудники')

@section('content')
    <div class="grid gap-8">
        <div class="flex flex-wrap items-start justify-between gap-4">
            <div>
                <p class="text-xs uppercase tracking-[0.4em] text-slate-500 dark:text-slate-500">Сотрудники</p>
                <h1 class="mt-3 text-3xl font-semibold text-slate-900 dark:text-white">Команда</h1>
                <p class="mt-2 max-w-xl text-sm text-slate-500 dark:text-slate-400">
                    Добавляйте и редактируйте сотрудников, назначайте роли и доступы.
                </p>
            </div>
            <x-button size="md" variant="solid" color="primary" data-modal-open="employee-create">
                Добавить сотрудника
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

        <div
            class="rounded-2xl border border-slate-200/70 bg-white/70 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5 dark:shadow-none">
            <div class="flex flex-col">
                <div class="overflow-x-auto">
                    <div class="inline-block max-w-[calc(100vw-30px)] lg:max-w-[calc(100vw-300px)] w-full">
                        <div class="overflow-hidden overflow-x-auto">
                            <table class="min-w-full divide-y divide-slate-200/70 dark:divide-white/10">
                                <thead>
                                    <tr class="text-slate-500">
                                        <th class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                            Имя
                                        </th>
                                        <th class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                            Телефон
                                        </th>
                                        <th class="px-6 py-4 text-xs font-semibold text-left uppercase tracking-[0.3em]">
                                            Роль
                                        </th>
                                        <th class="px-6 py-4 text-xs font-semibold text-right uppercase tracking-[0.3em]">
                                            Действия
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-200/70 dark:divide-white/10">
                                    @forelse ($employees as $employee)
                                        <tr class="text-slate-800 dark:text-slate-100">
                                            <td class="px-6 py-5 text-sm font-semibold whitespace-nowrap">
                                                {{ $employee->name }}
                                            </td>
                                            <td class="px-6 py-5 text-sm whitespace-nowrap">
                                                {{ $employee->phone }}
                                            </td>
                                            <td class="px-6 py-5 text-sm whitespace-nowrap">
                                                @php
                                                    $roleLabel = match ($employee->role) {
                                                        'admin' => 'Админ',
                                                        'surveyor' => 'Замерщик',
                                                        default => 'Менеджер',
                                                    };
                                                @endphp
                                                {{ $roleLabel }}
                                            </td>
                                            <td class="px-6 py-5 text-sm font-medium text-right whitespace-nowrap">
                                                <div class="flex items-center justify-end gap-2">
                                                    <x-button size="sm" variant="faded" color="default"
                                                        icon-only="true" aria-label="Редактировать"
                                                        data-modal-open="employee-edit"
                                                        data-modal-name="{{ $employee->name }}"
                                                        data-modal-phone="{{ $employee->phone }}"
                                                        data-modal-role="{{ $employee->role }}"
                                                        data-modal-action="{{ route('admin.employees.update', $employee) }}">
                                                        <x-icon type="outline" icon="pencil" size="5"></x-icon>
                                                    </x-button>
                                                    <form method="POST"
                                                        action="{{ route('admin.employees.destroy', $employee) }}">
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
                                            <td colspan="4" class="px-6 py-10 text-center text-sm text-slate-500">
                                                Пока нет сотрудников. Добавьте первого.
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
        data-modal="employee-create">
        <div
            class="w-full max-w-lg rounded-2xl border border-slate-200/70 bg-white p-6 shadow-xl dark:border-white/10 dark:bg-slate-950">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Новый сотрудник</p>
                    <h2 class="mt-2 text-xl font-semibold text-slate-900 dark:text-white">Создание сотрудника</h2>
                </div>
                <x-button icon-only="true" variant="ghost" color="default" data-modal-close>
                    <x-icon type="outline" icon="x" size="5"></x-icon>
                </x-button>
            </div>
            <form class="mt-6 grid gap-4" method="POST" action="{{ route('admin.employees.store') }}">
                @csrf
                <x-input label="Имя" name="name" required="true" placeholder="Имя сотрудника" />
                <x-input label="Телефон" name="phone" required="true" placeholder="931234567" />
                <x-input label="Пароль" name="password" type="password" required="true" placeholder="Минимум 6 символов" />
                <x-select label="Роль" name="role" required="true" placeholder="Выберите роль">
                    <option value="manager">Менеджер</option>
                    <option value="admin">Админ</option>
                    <option value="surveyor">Замерщик</option>
                </x-select>
                <div class="flex items-center justify-end gap-2">
                    <x-button variant="ghost" color="default" data-modal-close>Отмена</x-button>
                    <x-button type="submit" variant="solid" color="primary">Сохранить</x-button>
                </div>
            </form>
        </div>
    </div>

    <div class="fixed inset-0 z-40 hidden items-center justify-center bg-slate-900/50 p-4 backdrop-blur"
        data-modal="employee-edit">
        <div
            class="w-full max-w-lg rounded-2xl border border-slate-200/70 bg-white p-6 shadow-xl dark:border-white/10 dark:bg-slate-950">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Редактирование</p>
                    <h2 class="mt-2 text-xl font-semibold text-slate-900 dark:text-white">Изменить сотрудника</h2>
                </div>
                <x-button icon-only="true" variant="ghost" color="default" data-modal-close>
                    <x-icon type="outline" icon="x" size="5"></x-icon>
                </x-button>
            </div>
            <form class="mt-6 grid gap-4" method="POST" data-modal-form>
                @csrf
                @method('PUT')
                <x-input label="Имя" name="name" required="true" data-modal-input="name" />
                <x-input label="Телефон" name="phone" required="true" data-modal-input="phone" />
                <x-input label="Новый пароль" name="password" type="password" placeholder="Оставьте пустым" />
                <x-select label="Роль" name="role" required="true" data-modal-input="role">
                    <option value="manager">Менеджер</option>
                    <option value="admin">Админ</option>
                    <option value="surveyor">Замерщик</option>
                </x-select>
                <div class="flex items-center justify-end gap-2">
                    <x-button variant="ghost" color="default" data-modal-close>Отмена</x-button>
                    <x-button type="submit" variant="solid" color="primary">Сохранить</x-button>
                </div>
            </form>
        </div>
    </div>
@endsection
