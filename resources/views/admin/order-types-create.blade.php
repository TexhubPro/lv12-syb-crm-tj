@extends('admin.layouts.app')

@section('title', 'Создание вида')

@section('content')
    <div class="grid gap-8">
        <div class="flex flex-wrap items-start justify-between gap-4">
            <div>
                <p class="text-xs uppercase tracking-[0.4em] text-slate-500 dark:text-slate-500">Справочники</p>
                <h1 class="mt-3 text-3xl font-semibold text-slate-900 dark:text-white">Создание вида</h1>
                <p class="mt-2 max-w-xl text-sm text-slate-500 dark:text-slate-400">
                    Заполните параметры для нового вида подзаказа.
                </p>
            </div>
            <x-button size="md" variant="faded" color="default" href="{{ route('admin.order-types.index') }}">
                К списку
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
            class="rounded-2xl border border-slate-200/70 bg-white/70 p-6 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5 dark:shadow-none">
            <form method="POST" action="{{ route('admin.order-types.store') }}" data-order-type-form>
                @csrf
                <div class="grid gap-4 ">
                    <x-input label="Название" name="name" required="true" placeholder="Например: Рулонные" />
                    <x-select label="Тип вида" name="type_level" required="true">
                        <option value="parent" selected>Родительский вид</option>
                        <option value="child">Дочерний вид</option>
                    </x-select>
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
                        data-field-picker data-field-picker-name="fields_order"
                        data-field-picker-defaults="quantity,width,room,price,amount,discount,total,note">
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
                                            data-field-picker-key="{{ $field->key }}"
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

                    @php
                        $fabricCodes = old('fabric_codes', []);
                    @endphp
                    <div class="rounded-2xl border border-slate-200/70 bg-slate-50/80 p-4 dark:border-white/10 dark:bg-white/5"
                        data-fabric-codes>
                        <div class="flex flex-wrap items-center justify-between gap-3">
                            <div>
                                <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Коды ткани</p>
                                <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">
                                    Добавьте коды ткани, чтобы создать отдельные виды с новой ценой.
                                </p>
                            </div>
                            <x-button type="button" size="sm" variant="faded" color="default" data-fabric-codes-add>
                                Добавить код ткани
                            </x-button>
                        </div>

                        <div class="mt-4 grid gap-3" data-fabric-codes-list>
                            @foreach ($fabricCodes as $index => $code)
                                <div class="flex flex-wrap items-end gap-3 rounded-2xl border border-slate-200/70 bg-white/70 p-4 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5"
                                    data-fabric-codes-row>
                                    <div class="min-w-[220px] flex-1">
                                        <x-input label="Код ткани" name="fabric_codes[{{ $index }}][name]"
                                            placeholder="Например: 66" value="{{ $code['name'] ?? '' }}"
                                            data-fabric-field="name" />
                                    </div>
                                    <div class="min-w-[180px]">
                                        <x-input label="Цена кода" name="fabric_codes[{{ $index }}][price]"
                                            type="number" min="0" step="0.01" placeholder="Например: 30"
                                            value="{{ $code['price'] ?? '' }}" data-fabric-field="price" />
                                    </div>
                                    <x-button type="button" size="sm" variant="ghost" color="danger"
                                        data-fabric-codes-remove>
                                        Удалить
                                    </x-button>
                                </div>
                            @endforeach
                        </div>

                        <template data-fabric-codes-template>
                            <div class="flex flex-wrap items-end gap-3 rounded-2xl border border-slate-200/70 bg-white/70 p-4 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5"
                                data-fabric-codes-row>
                                <div class="min-w-[220px] flex-1">
                                    <x-input label="Код ткани" name="fabric_codes[0][name]" placeholder="Например: 66"
                                        data-fabric-field="name" disabled="true" />
                                </div>
                                <div class="min-w-[180px]">
                                    <x-input label="Цена кода" name="fabric_codes[0][price]" type="number"
                                        min="0" step="0.01" placeholder="Например: 30"
                                        data-fabric-field="price" disabled="true" />
                                </div>
                                <x-button type="button" size="sm" variant="ghost" color="danger"
                                    data-fabric-codes-remove>
                                    Удалить
                                </x-button>
                            </div>
                        </template>
                    </div>
                </div>

                <div class="mt-5 flex items-center justify-end gap-2">
                    <x-button variant="ghost" color="default" href="{{ route('admin.order-types.index') }}">
                        Отмена
                    </x-button>
                    <x-button type="submit" variant="solid" color="primary">Сохранить</x-button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
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
                let draggedId = null;

                const moveItem = (list, fromId, toId) => {
                    if (!fromId || !toId || fromId === toId) return list;
                    const fromIndex = list.indexOf(fromId);
                    const toIndex = list.indexOf(toId);
                    if (fromIndex === -1 || toIndex === -1) return list;
                    const next = [...list];
                    const [item] = next.splice(fromIndex, 1);
                    next.splice(toIndex, 0, item);
                    return next;
                };
                const findClosestTagId = (event) => {
                    if (!tags) return null;
                    const tagEls = Array.from(tags.querySelectorAll('[data-field-picker-tag-id]'));
                    if (!tagEls.length) return null;
                    let closest = null;
                    let closestDist = Infinity;
                    const x = event.clientX;
                    const y = event.clientY;
                    tagEls.forEach((el) => {
                        const rect = el.getBoundingClientRect();
                        const cx = rect.left + rect.width / 2;
                        const cy = rect.top + rect.height / 2;
                        const dist = Math.hypot(cx - x, cy - y);
                        if (dist < closestDist) {
                            closestDist = dist;
                            closest = el;
                        }
                    });
                    return closest?.dataset.fieldPickerTagId || null;
                };

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
                                'inline-flex items-center gap-2 rounded-full bg-slate-100 px-3 py-1 text-sm text-slate-800 dark:bg-white/10 dark:text-white cursor-move';
                            tag.textContent = label;
                            tag.draggable = true;
                            tag.dataset.fieldPickerTagId = id;
                            tag.addEventListener('dragstart', () => {
                                draggedId = id;
                                tag.classList.add('opacity-60');
                            });
                            tag.addEventListener('dragend', () => {
                                draggedId = null;
                                tag.classList.remove('opacity-60');
                            });
                            tag.addEventListener('dragover', (event) => {
                                if (draggedId && draggedId !== id) event.preventDefault();
                            });
                            tag.addEventListener('drop', (event) => {
                                event.preventDefault();
                                const next = moveItem(selected, draggedId, id);
                                if (next !== selected) {
                                    selected = next;
                                    render();
                                }
                            });
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

                if (!selected.length) {
                    const defaults = (root.dataset.fieldPickerDefaults || '')
                        .split(',')
                        .map((value) => value.trim())
                        .filter(Boolean);
                    if (defaults.length) {
                        const defaultIds = defaults
                            .map((value) => {
                                const match = options.find((option) => {
                                    const optionId = option.dataset.fieldPickerId || '';
                                    const optionKey = option.dataset.fieldPickerKey || '';
                                    return optionKey === value || optionId === value;
                                });
                                return match?.dataset.fieldPickerId || '';
                            })
                            .filter(Boolean);
                        setSelected(defaultIds);
                    }
                }

                if (tags && !tags.dataset.dragReady) {
                    tags.dataset.dragReady = 'true';
                    tags.addEventListener('dragover', (event) => {
                        if (!draggedId) return;
                        event.preventDefault();
                        const targetId = findClosestTagId(event);
                        if (!targetId || targetId === draggedId) return;
                        const next = moveItem(selected, draggedId, targetId);
                        if (next !== selected) {
                            selected = next;
                            render();
                        }
                    });
                    tags.addEventListener('drop', (event) => {
                        if (!draggedId) return;
                        const target = event.target.closest('[data-field-picker-tag-id]');
                        if (!target) {
                            selected = selected.filter((value) => value !== draggedId).concat(draggedId);
                            render();
                        }
                    });
                }

                root._fieldPickerApi = {
                    setSelected
                };
                return root._fieldPickerApi;
            };

            document.querySelectorAll('[data-order-type-form]').forEach((form) => {
                form.querySelectorAll('[data-field-picker]').forEach((picker) => {
                    initFieldPicker(picker);
                });
            });

            const fabricRoot = document.querySelector('[data-fabric-codes]');
            if (fabricRoot) {
                const list = fabricRoot.querySelector('[data-fabric-codes-list]');
                const template = fabricRoot.querySelector('[data-fabric-codes-template]');
                const addButton = fabricRoot.querySelector('[data-fabric-codes-add]');
                let index = list ? list.querySelectorAll('[data-fabric-codes-row]').length : 0;

                const bindRemove = (row) => {
                    const removeButton = row.querySelector('[data-fabric-codes-remove]');
                    removeButton?.addEventListener('click', () => row.remove());
                };

                const addRow = (values = {}) => {
                    if (!template || !list) return;
                    const fragment = template.content.cloneNode(true);
                    const row = fragment.querySelector('[data-fabric-codes-row]');
                    if (!row) return;
                    row.querySelectorAll('input[data-fabric-field]').forEach((input) => {
                        const field = input.dataset.fabricField;
                        const oldId = input.id;
                        const newId = `fabric-code-${index}-${field}`;
                        input.name = `fabric_codes[${index}][${field}]`;
                        input.id = newId;
                        input.disabled = false;
                        if (values[field] !== undefined) {
                            input.value = values[field];
                        }
                        if (oldId) {
                            const label = row.querySelector(`label[for="${oldId}"]`);
                            if (label) label.setAttribute('for', newId);
                        }
                    });
                    bindRemove(row);
                    list.appendChild(row);
                    index += 1;
                };

                addButton?.addEventListener('click', () => addRow());
                list?.querySelectorAll('[data-fabric-codes-row]').forEach((row) => bindRemove(row));
            }
        });
    </script>
@endsection
