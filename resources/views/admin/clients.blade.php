@extends('admin.layouts.app')

@section('title', 'Клиенты')

@section('content')
    <div class="grid gap-8">
        <div class="flex flex-wrap items-start justify-between gap-4">
            <div>
                <p class="text-xs uppercase tracking-[0.4em] text-slate-500 dark:text-slate-500">Справочники</p>
                <h1 class="mt-3 text-3xl font-semibold text-slate-900 dark:text-white">Клиенты</h1>
                <p class="mt-2 max-w-xl text-sm text-slate-500 dark:text-slate-400">
                    Добавляйте и редактируйте клиентов. Телефон используется как основной идентификатор.
                </p>
            </div>
            <x-button size="md" variant="solid" color="primary" data-modal-open="client-create">
                Добавить клиента
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
            class="overflow-hidden overflow-x-auto rounded-2xl border border-slate-200/70 bg-white/70 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5 dark:shadow-none">
            <div
                class="grid grid-cols-[1.2fr_0.9fr_0.9fr_1fr_auto] gap-4 border-b border-slate-200/70 px-6 py-4 text-xs uppercase tracking-[0.3em] text-slate-500 dark:border-white/10">
                <span>ФИО</span>
                <span>Телефон</span>
                <span>Телефон 2</span>
                <span>Адрес</span>
                <span class="text-right">Действия</span>
            </div>
            <div class="divide-y divide-slate-200/70 dark:divide-white/10">
                @forelse ($clients as $client)
                    <div class="grid grid-cols-[1.2fr_0.9fr_0.9fr_1fr_auto] items-center gap-4 px-6 py-4">
                        <div>
                            <p class="text-sm font-semibold text-slate-900 dark:text-white">{{ $client->full_name }}</p>
                            @if ($client->comment)
                                <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">{{ $client->comment }}</p>
                            @endif
                        </div>
                        <div class="text-sm text-slate-700 dark:text-slate-300">{{ $client->phone }}</div>
                        <div class="text-sm text-slate-700 dark:text-slate-300">{{ $client->phone_secondary ?: '—' }}</div>
                        <div class="text-sm text-slate-600 dark:text-slate-400">
                            {{ $client->address ?: '—' }}
                        </div>
                        <div class="flex items-center justify-end gap-2">
                            <x-button size="sm" variant="faded" color="default" icon-only="true"
                                aria-label="Редактировать" data-modal-open="client-edit"
                                data-modal-name="{{ $client->full_name }}" data-modal-phone="{{ $client->phone }}"
                                data-modal-phone-secondary="{{ $client->phone_secondary }}"
                                data-modal-address="{{ $client->address }}" data-modal-comment="{{ $client->comment }}"
                                data-modal-action="{{ route('admin.clients.update', $client) }}">
                                <x-icon type="outline" icon="pencil" size="5"></x-icon>
                            </x-button>
                            <form method="POST" action="{{ route('admin.clients.destroy', $client) }}">
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
                        Пока нет клиентов. Добавьте первую запись.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="fixed inset-0 z-40 hidden items-center justify-center bg-slate-900/50 p-4 backdrop-blur"
        data-modal="client-create">
        <div
            class="w-full max-w-xl rounded-2xl border border-slate-200/70 bg-white p-6 shadow-xl dark:border-white/10 dark:bg-slate-950">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Новый клиент</p>
                    <h2 class="mt-2 text-xl font-semibold text-slate-900 dark:text-white">Создание клиента</h2>
                </div>
                <x-button icon-only="true" variant="ghost" color="default" data-modal-close>
                    <x-icon type="outline" icon="x" size="5"></x-icon>
                </x-button>
            </div>
            <form class="mt-6 grid gap-4" method="POST" action="{{ route('admin.clients.store') }}">
                @csrf
                <x-input label="ФИО" name="full_name" required="true" placeholder="Иванов Иван Иванович" />
                <x-input label="Телефон" name="phone" required="true" placeholder="931234567" />
                <x-input label="Телефон 2" name="phone_secondary" placeholder="931234567" />
                <x-input label="Адрес" name="address" placeholder="Город, улица, дом" />
                <x-textarea label="Комментарий" name="comment" rows="3"
                    placeholder="Дополнительная информация"></x-textarea>
                <div class="flex items-center justify-end gap-2">
                    <x-button variant="ghost" color="default" data-modal-close>Отмена</x-button>
                    <x-button type="submit" variant="solid" color="primary">Сохранить</x-button>
                </div>
            </form>
        </div>
    </div>

    <div class="fixed inset-0 z-40 hidden items-center justify-center bg-slate-900/50 p-4 backdrop-blur"
        data-modal="client-edit">
        <div
            class="w-full max-w-xl rounded-2xl border border-slate-200/70 bg-white p-6 shadow-xl dark:border-white/10 dark:bg-slate-950">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Редактирование</p>
                    <h2 class="mt-2 text-xl font-semibold text-slate-900 dark:text-white">Изменить клиента</h2>
                </div>
                <x-button icon-only="true" variant="ghost" color="default" data-modal-close>
                    <x-icon type="outline" icon="x" size="5"></x-icon>
                </x-button>
            </div>
            <form class="mt-6 grid gap-4" method="POST" data-modal-form>
                @csrf
                @method('PUT')
                <x-input label="ФИО" name="full_name" required="true" data-modal-input="name" />
                <x-input label="Телефон" name="phone" required="true" data-modal-input="phone" />
                <x-input label="Телефон 2" name="phone_secondary" data-modal-input="phoneSecondary" />
                <x-input label="Адрес" name="address" data-modal-input="address" />
                <x-textarea label="Комментарий" name="comment" rows="3" data-modal-input="comment"></x-textarea>
                <div class="flex items-center justify-end gap-2">
                    <x-button variant="ghost" color="default" data-modal-close>Отмена</x-button>
                    <x-button type="submit" variant="solid" color="primary">Сохранить</x-button>
                </div>
            </form>
        </div>
    </div>
@endsection
