@extends('admin.layouts.app')

@section('title', 'Типы управления')

@section('content')
    <div class="grid gap-8">
        <div class="flex flex-wrap items-start justify-between gap-4">
            <div>
                <p class="text-xs uppercase tracking-[0.4em] text-slate-500 dark:text-slate-500">Справочники</p>
                <h1 class="mt-3 text-3xl font-semibold text-slate-900 dark:text-white">Типы управления</h1>
                <p class="mt-2 max-w-xl text-sm text-slate-500 dark:text-slate-400">
                    Добавляйте типы управления и поддерживайте список актуальным для подзаказов.
                </p>
            </div>
            <x-button size="md" variant="solid" color="primary" data-modal-open="control-type-create">
                Добавить тип
            </x-button>
        </div>

        @if (session('status'))
            <x-alert variant="success" title="Готово">
                {{ session('status') }}
            </x-alert>
        @endif
        @if ($errors->any())
            <x-alert variant="danger" title="Ошибка">
                Проверьте поля и попробуйте снова.
            </x-alert>
        @endif

        <div
            class="overflow-hidden rounded-2xl border border-slate-200/70 bg-white/70 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5 dark:shadow-none">
            <div
                class="grid grid-cols-[1fr_auto] gap-4 border-b border-slate-200/70 px-6 py-4 text-xs uppercase tracking-[0.3em] text-slate-500 dark:border-white/10">
                <span>Название</span>
                <span class="text-right">Действия</span>
            </div>
            <div class="divide-y divide-slate-200/70 dark:divide-white/10">
                @forelse ($controlTypes as $controlType)
                    <div class="grid grid-cols-[1fr_auto] items-center gap-4 px-6 py-4">
                        <div>
                            <p class="text-sm font-semibold text-slate-900 dark:text-white">{{ $controlType->name }}</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <x-button size="sm" variant="faded" color="default" icon-only="true"
                                aria-label="Редактировать" data-modal-open="control-type-edit"
                                data-modal-name="{{ $controlType->name }}"
                                data-modal-action="{{ route('admin.control-types.update', $controlType) }}">
                                <x-icon type="outline" icon="pencil" size="5"></x-icon>
                            </x-button>
                            <form method="POST" action="{{ route('admin.control-types.destroy', $controlType) }}">
                                @csrf
                                @method('DELETE')
                                <x-button type="submit" size="sm" variant="ghost" color="danger" icon-only="true"
                                    aria-label="Удалить">
                                    <x-icon type="outline" icon="trash" size="5"></x-icon>
                                </x-button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="px-6 py-10 text-center text-sm text-slate-500 dark:text-slate-400">
                        Пока нет типов управления. Добавьте первую запись.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="fixed inset-0 z-40 hidden items-center justify-center bg-slate-900/50 p-4 backdrop-blur"
        data-modal="control-type-create">
        <div
            class="w-full max-w-lg rounded-2xl border border-slate-200/70 bg-white p-6 shadow-xl dark:border-white/10 dark:bg-slate-950">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Новый тип</p>
                    <h2 class="mt-2 text-xl font-semibold text-slate-900 dark:text-white">Создание типа управления</h2>
                </div>
                <x-button icon-only="true" variant="ghost" color="default" data-modal-close>
                    <x-icon type="outline" icon="x" size="5"></x-icon>
                </x-button>
            </div>
            <form class="mt-6 grid gap-4" method="POST" action="{{ route('admin.control-types.store') }}">
                @csrf
                <x-input label="Название" name="name" required="true" placeholder="Например: RF" />
                <div class="flex items-center justify-end gap-2">
                    <x-button variant="ghost" color="default" data-modal-close>Отмена</x-button>
                    <x-button type="submit" variant="solid" color="primary">Сохранить</x-button>
                </div>
            </form>
        </div>
    </div>

    <div class="fixed inset-0 z-40 hidden items-center justify-center bg-slate-900/50 p-4 backdrop-blur"
        data-modal="control-type-edit">
        <div
            class="w-full max-w-lg rounded-2xl border border-slate-200/70 bg-white p-6 shadow-xl dark:border-white/10 dark:bg-slate-950">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Редактирование</p>
                    <h2 class="mt-2 text-xl font-semibold text-slate-900 dark:text-white">Изменить тип управления</h2>
                </div>
                <x-button icon-only="true" variant="ghost" color="default" data-modal-close>
                    <x-icon type="outline" icon="x" size="5"></x-icon>
                </x-button>
            </div>
            <form class="mt-6 grid gap-4" method="POST" data-modal-form>
                @csrf
                @method('PUT')
                <x-input label="Название" name="name" required="true" data-modal-input="name" />
                <div class="flex items-center justify-end gap-2">
                    <x-button variant="ghost" color="default" data-modal-close>Отмена</x-button>
                    <x-button type="submit" variant="solid" color="primary">Сохранить</x-button>
                </div>
            </form>
        </div>
    </div>
@endsection
