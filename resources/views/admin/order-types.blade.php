@extends('admin.layouts.app')

@section('title', 'Виды')

@section('content')
    <div class="grid gap-8">
        <div class="flex flex-wrap items-start justify-between gap-4">
            <div>
                <p class="text-xs uppercase tracking-[0.4em] text-slate-500 dark:text-slate-500">Справочники</p>
                <h1 class="mt-3 text-3xl font-semibold text-slate-900 dark:text-white">Виды</h1>
                <p class="mt-2 max-w-xl text-sm text-slate-500 dark:text-slate-400">
                    Управляйте списком видов для подзаказов. Добавляйте новые позиции и обновляйте существующие.
                </p>
            </div>
            <x-button size="md" variant="solid" color="primary" data-modal-open="order-type-create">
                Добавить вид
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
                class="grid min-w-[720px] grid-cols-7 gap-4 border-b border-slate-200/70 px-4 py-3 text-[10px] uppercase tracking-[0.3em] text-slate-500 dark:border-white/10 sm:px-6 sm:py-4 sm:text-xs">
                <span>Название</span>
                <span>Тип вида</span>
                <span>Родитель</span>
                <span>Ед.</span>
                <span>Мин.</span>
                <span class="text-right">Цена</span>
                <span class="text-right">Действия</span>
            </div>
            <div class="divide-y divide-slate-200/70 dark:divide-white/10">
                @forelse ($orderTypes as $orderType)
                    <div class="grid min-w-[720px] grid-cols-7 items-center gap-4 px-4 py-3 sm:px-6 sm:py-4">
                        <div>
                            <p class="text-sm font-semibold text-slate-900 dark:text-white">{{ $orderType->name }}</p>
                        </div>
                        <div class="text-sm text-slate-700 dark:text-slate-200">
                            {{ $orderType->parent_id ? 'Дочерний' : 'Родительский' }}
                        </div>
                        <div class="text-sm text-slate-700 dark:text-slate-200">
                            {{ $orderType->parent?->name ?? '—' }}
                        </div>
                        <div class="text-sm text-slate-700 dark:text-slate-200">
                            {{ $units[$orderType->unit] ?? ($orderType->unit ?? '—') }}
                        </div>
                        <div class="text-sm text-slate-700 dark:text-slate-200">
                            {{ $orderType->min_qty !== null ? number_format($orderType->min_qty, 2, '.', ' ') : '—' }}
                        </div>
                        <div class="text-sm font-semibold text-right text-slate-900 dark:text-white">
                            {{ $orderType->price !== null ? number_format($orderType->price, 2, '.', ' ') . ' с' : '—' }}
                        </div>
                        <div class="flex items-center justify-end gap-2">
                            <x-button size="sm" variant="faded" color="default" icon-only="true"
                                aria-label="Редактировать" data-modal-open="order-type-edit"
                                data-modal-name="{{ $orderType->name }}" data-modal-parent-id="{{ $orderType->parent_id }}"
                                data-modal-type-level="{{ $orderType->parent_id ? 'child' : 'parent' }}"
                                data-modal-unit="{{ $orderType->unit }}" data-modal-min-qty="{{ $orderType->min_qty }}"
                                data-modal-fields="{{ $orderType->fields->pluck('id')->implode(',') }}"
                                data-modal-price="{{ $orderType->price }}"
                                data-modal-action="{{ route('admin.order-types.update', $orderType) }}">
                                <x-icon type="outline" icon="pencil" size="5"></x-icon>
                            </x-button>
                            <form method="POST" action="{{ route('admin.order-types.destroy', $orderType) }}">
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
                        Пока нет видов. Добавьте первую запись.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="fixed inset-0 z-40 hidden items-center justify-center bg-slate-900/50 p-4 backdrop-blur"
        data-modal="order-type-create">
        <div
            class="w-full max-w-lg rounded-2xl border border-slate-200/70 bg-white p-4 shadow-xl dark:border-white/10 dark:bg-slate-950">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Новый вид</p>
                    <h2 class="mt-2 text-xl font-semibold text-slate-900 dark:text-white">Создание вида</h2>
                </div>
                <x-button icon-only="true" variant="ghost" color="default" data-modal-close>
                    <x-icon type="outline" icon="x" size="5"></x-icon>
                </x-button>
            </div>
            <form method="POST" action="{{ route('admin.order-types.store') }}" data-order-type-form>
                @csrf
                <div class="mt-6 grid gap-4 max-h-[70vh] overflow-hidden overflow-y-scroll">
                    <x-input label="Название" name="name" required="true" placeholder="Например: Рулонные" />
                    <x-select label="Тип вида" name="type_level" required="true" data-order-type-level>
                        <option value="parent" selected>Родительский вид</option>
                        <option value="child">Дочерний вид</option>
                    </x-select>
                    <div data-order-type-parent>
                        <x-select label="Родитель" name="parent_id" placeholder="Выберите родителя"
                            data-order-type-parent-select>
                            @foreach ($parents as $parent)
                                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                            @endforeach
                        </x-select>
                    </div>
                    <x-select label="Единица измерения" name="unit" required="true">
                        @foreach ($units as $value => $label)
                            <option value="{{ $value }}" @selected($value === 'piece')>{{ $label }}</option>
                        @endforeach
                    </x-select>
                    <x-input label="Минимум" name="min_qty" type="number" min="0.01" step="0.01" required="true"
                        value="1" placeholder="Например: 1" />
                    <x-input label="Цена" name="price" type="number" min="0" step="0.01" required="true"
                        value="0" placeholder="Например: 1200" />
                    <div class="rounded-2xl border border-slate-200/70 bg-slate-50/80 p-4 dark:border-white/10 dark:bg-white/5"
                        data-field-picker data-field-picker-name="fields_order">
                        <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Поля</p>
                        <div class="mt-3">
                            <div class="flex flex-wrap items-center gap-2 rounded-2xl border border-slate-200 bg-white px-3 py-2 text-sm text-slate-700 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5"
                                data-field-picker-trigger>
                                <div class="flex flex-wrap gap-2" data-field-picker-tags></div>
                                <span class="text-slate-400" data-field-picker-placeholder>Выберите поля</span>
                                <button type="button" class="ml-auto text-slate-400 hover:text-slate-600"
                                    data-field-picker-toggle>
                                    <x-icon type="outline" icon="chevron-down" size="5"></x-icon>
                                </button>
                            </div>
                            <div class="mt-2 hidden overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-lg dark:border-white/10 dark:bg-slate-950"
                                data-field-picker-menu>
                                <div class="max-h-60 overflow-auto p-2">
                                    @foreach ($fields as $field)
                                        <button type="button"
                                            class="flex w-full items-center justify-between rounded-xl px-3 py-2 text-left text-sm text-slate-700 hover:bg-slate-100 dark:text-slate-200 dark:hover:bg-white/5"
                                            data-field-picker-option data-field-picker-id="{{ $field->id }}"
                                            data-field-picker-label="{{ $field->name }}">
                                            <span>{{ $field->name }}</span>
                                            <span class="hidden text-indigo-500" data-field-picker-check>
                                                <x-icon type="outline" icon="check" size="4"></x-icon>
                                            </span>
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                            <div data-field-picker-inputs></div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-2 mt-5">
                    <x-button variant="ghost" color="default" data-modal-close>Отмена</x-button>
                    <x-button type="submit" variant="solid" color="primary">Сохранить</x-button>
                </div>
            </form>
        </div>
    </div>

    <div class="fixed inset-0 z-40 hidden items-center justify-center bg-slate-900/50 p-4 backdrop-blur"
        data-modal="order-type-edit">
        <div
            class="w-full max-w-lg rounded-2xl border border-slate-200/70 bg-white p-6 shadow-xl dark:border-white/10 dark:bg-slate-950">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Редактирование</p>
                    <h2 class="mt-2 text-xl font-semibold text-slate-900 dark:text-white">Изменить вид</h2>
                </div>
                <x-button icon-only="true" variant="ghost" color="default" data-modal-close>
                    <x-icon type="outline" icon="x" size="5"></x-icon>
                </x-button>
            </div>
            <form class="mt-6 grid gap-4" method="POST" data-modal-form data-order-type-form>
                @csrf
                @method('PUT')
                <div class="mt-6 grid gap-4 max-h-[70vh] overflow-hidden overflow-y-scroll">
                    <x-input label="Название" name="name" required="true" data-modal-input="name" />
                    <x-select label="Тип вида" name="type_level" required="true" data-modal-input="typeLevel"
                        data-order-type-level>
                        <option value="parent">Родительский вид</option>
                        <option value="child">Дочерний вид</option>
                    </x-select>
                    <div data-order-type-parent>
                        <x-select label="Родитель" name="parent_id" placeholder="Выберите родителя"
                            data-modal-input="parentId" data-order-type-parent-select>
                            @foreach ($parents as $parent)
                                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                            @endforeach
                        </x-select>
                    </div>
                    <x-select label="Единица измерения" name="unit" required="true" data-modal-input="unit">
                        @foreach ($units as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </x-select>
                    <x-input label="Минимум" name="min_qty" type="number" min="0.01" step="0.01"
                        required="true" data-modal-input="minQty" />
                    <x-input label="Цена" name="price" type="number" min="0" step="0.01"
                        required="true" data-modal-input="price" />
                    <div class="rounded-2xl border border-slate-200/70 bg-slate-50/80 p-4 dark:border-white/10 dark:bg-white/5"
                        data-field-picker data-field-picker-name="fields_order">
                        <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Поля</p>
                        <div class="mt-3">
                            <div class="flex flex-wrap items-center gap-2 rounded-2xl border border-slate-200 bg-white px-3 py-2 text-sm text-slate-700 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5"
                                data-field-picker-trigger>
                                <div class="flex flex-wrap gap-2" data-field-picker-tags></div>
                                <span class="text-slate-400" data-field-picker-placeholder>Выберите поля</span>
                                <button type="button" class="ml-auto text-slate-400 hover:text-slate-600"
                                    data-field-picker-toggle>
                                    <x-icon type="outline" icon="chevron-down" size="5"></x-icon>
                                </button>
                            </div>
                            <div class="mt-2 hidden overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-lg dark:border-white/10 dark:bg-slate-950"
                                data-field-picker-menu>
                                <div class="max-h-60 overflow-auto p-2 flex gap-2" data-order-type-fields>
                                    @foreach ($fields as $field)
                                        <button type="button"
                                            class="flex w-full items-center justify-between rounded-xl px-3 py-2 text-left text-sm text-slate-700 hover:bg-slate-100 dark:text-slate-200 dark:hover:bg-white/5"
                                            data-field-picker-option data-field-picker-id="{{ $field->id }}"
                                            data-field-picker-label="{{ $field->name }}">
                                            <span>{{ $field->name }}</span>
                                            <span class="hidden text-indigo-500" data-field-picker-check>
                                                <x-icon type="outline" icon="check" size="4"></x-icon>
                                            </span>
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                            <div data-field-picker-inputs></div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-end gap-2">
                    <x-button variant="ghost" color="default" data-modal-close>Отмена</x-button>
                    <x-button type="submit" variant="solid" color="primary">Сохранить</x-button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const updateForm = (form) => {
                if (!form) return;
                const levelSelect = form.querySelector('[data-order-type-level]');
                if (!levelSelect) return;
                const parentWrap = form.querySelector('[data-order-type-parent]');
                const parentSelect = form.querySelector('[data-order-type-parent-select]');

                const isChild = levelSelect.value === 'child';
                if (parentWrap) parentWrap.classList.toggle('hidden', !isChild);
                if (parentSelect) parentSelect.required = isChild;
            };

            const initFieldPicker = (root) => {
                if (!root) return null;
                if (root._fieldPickerApi) return root._fieldPickerApi;
                root.dataset.fieldPickerReady = 'true';
                const inputName = root.dataset.fieldPickerName || 'fields_order';
                const trigger = root.querySelector('[data-field-picker-trigger]');
                const menu = root.querySelector('[data-field-picker-menu]');
                const tags = root.querySelector('[data-field-picker-tags]');
                const placeholder = root.querySelector('[data-field-picker-placeholder]');
                const inputs = root.querySelector('[data-field-picker-inputs]');
                const options = Array.from(root.querySelectorAll('[data-field-picker-option]'));
                let selected = [];

                const setSelected = (ids) => {
                    selected = Array.from(new Set((ids || []).map(String)));
                    render();
                };

                const render = () => {
                    if (tags) tags.innerHTML = '';
                    if (inputs) inputs.innerHTML = '';
                    selected.forEach((id) => {
                        const option = options.find((item) => item.dataset.fieldPickerId === id);
                        const label = option?.dataset.fieldPickerLabel || id;
                        if (tags) {
                            const tag = document.createElement('span');
                            tag.className =
                                'inline-flex items-center gap-2 rounded-full bg-slate-100 px-3 py-1 text-sm text-slate-800 dark:bg-white/10 dark:text-white';
                            tag.textContent = label;
                            const remove = document.createElement('button');
                            remove.type = 'button';
                            remove.className = 'text-slate-400 hover:text-slate-600';
                            remove.textContent = '×';
                            remove.addEventListener('click', () => {
                                selected = selected.filter((value) => value !== id);
                                render();
                            });
                            tag.appendChild(remove);
                            tags.appendChild(tag);
                        }
                        if (inputs) {
                            const hidden = document.createElement('input');
                            hidden.type = 'hidden';
                            hidden.name = `${inputName}[]`;
                            hidden.value = id;
                            inputs.appendChild(hidden);
                        }
                    });

                    options.forEach((option) => {
                        const check = option.querySelector('[data-field-picker-check]');
                        const isActive = selected.includes(option.dataset.fieldPickerId || '');
                        option.setAttribute('aria-checked', isActive ? 'true' : 'false');
                        if (check) check.classList.toggle('hidden', !isActive);
                    });

                    if (placeholder) {
                        placeholder.classList.toggle('hidden', selected.length > 0);
                    }
                };

                options.forEach((option) => {
                    option.addEventListener('click', () => {
                        const id = option.dataset.fieldPickerId || '';
                        if (!id) return;
                        if (selected.includes(id)) {
                            selected = selected.filter((value) => value !== id);
                        } else {
                            selected = [...selected, id];
                        }
                        render();
                    });
                });

                const toggleMenu = (force) => {
                    if (!menu) return;
                    const isOpen = menu.classList.contains('hidden');
                    const open = typeof force === 'boolean' ? force : isOpen;
                    menu.classList.toggle('hidden', !open);
                };

                trigger?.addEventListener('click', () => toggleMenu());
                document.addEventListener('click', (event) => {
                    if (!root.contains(event.target)) toggleMenu(false);
                });

                root._fieldPickerApi = {
                    setSelected
                };
                return root._fieldPickerApi;
            };

            const bindForm = (form) => {
                if (!form) return;
                const levelSelect = form.querySelector('[data-order-type-level]');
                if (!levelSelect) return;
                levelSelect.addEventListener('change', () => updateForm(form));
                updateForm(form);
            };

            document.querySelectorAll('[data-order-type-form]').forEach((form) => {
                bindForm(form);
                form.querySelectorAll('[data-field-picker]').forEach((picker) => {
                    initFieldPicker(picker);
                });
            });

            document.addEventListener('click', (event) => {
                const trigger = event.target.closest('[data-modal-open]');
                if (!trigger) return;
                const selected = (trigger.dataset.modalFields || '')
                    .split(',')
                    .map((value) => value.trim())
                    .filter(Boolean);
                setTimeout(() => {
                    document.querySelectorAll('[data-order-type-form]').forEach((form) => {
                        updateForm(form);
                        form.querySelectorAll('[data-field-picker]').forEach((picker) => {
                            const api = initFieldPicker(picker);
                            api?.setSelected(selected);
                        });
                    });
                }, 0);
            });
        });
    </script>
@endsection
