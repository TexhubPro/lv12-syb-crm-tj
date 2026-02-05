@extends('admin.layouts.app')

@section('title', 'Оформить заказ')

@section('content')
    <div class="grid gap-3">
        <div class="flex flex-wrap items-start justify-between gap-3">
            <div>
                <p class="text-xs uppercase tracking-[0.4em] text-slate-500 dark:text-slate-500">Оформить заказ</p>
                <h1 class="mt-3 text-3xl font-semibold text-slate-900 dark:text-white">Оформление заказа</h1>
                <p class="mt-2 max-w-2xl text-sm text-slate-500 dark:text-slate-400">
                    Заполните данные по клиенту, заказу и позиции. Основной идентификатор клиента — номер телефона.
                </p>
            </div>
        </div>

        @if (session('status'))
            <x-alert variant="success" title="Готово">
                {{ session('status') }}
            </x-alert>
        @endif
        @if ($errors->any())
            <x-alert variant="danger" title="Ошибка">
                Проверьте форму и попробуйте снова.
                <ul class="mt-2 list-disc space-y-1 pl-5 text-sm text-rose-700 dark:text-rose-200">
                    @foreach ($errors->all() as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </x-alert>
            <script type="application/json" data-form-errors>
                @json($errors->getMessages())
            </script>
        @endif

        <form class="grid gap-3" method="POST" action="{{ route('admin.cashier.store') }}" data-prevent-double>
            @csrf

            <div
                class="rounded-2xl border border-slate-200/70 bg-white p-4 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5 dark:shadow-none">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <h2 class="text-xl font-semibold text-slate-900 dark:text-white">Данные клиента</h2>
                    <x-switch label="Новый клиент" data-client-toggle></x-switch>
                </div>

                <div class="mt-3 grid gap-4" data-client-select>
                    <x-select label="Выбрать клиента" name="client_id" placeholder="Выберите клиента">
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}" @selected(old('client_id') == $client->id)>
                                {{ $client->full_name }} — {{ $client->phone }}
                            </option>
                        @endforeach
                    </x-select>
                </div>

                <div class="mt-3 hidden grid grid-cols-1 lg:grid-cols-4 gap-4" data-new-client-fields>
                    <x-input label="ФИО" name="new_client_full_name" value="{{ old('new_client_full_name') }}"
                        placeholder="Иванов Иван Иванович" />
                    <x-input label="Телефон" name="new_client_phone" value="{{ old('new_client_phone') }}"
                        placeholder="931234567" />
                    <x-input label="Телефон 2" name="new_client_phone_secondary"
                        value="{{ old('new_client_phone_secondary') }}" placeholder="Дополнительный номер" />
                    <x-input label="Адрес" name="new_client_address" value="{{ old('new_client_address') }}"
                        placeholder="Город, улица, дом" />
                </div>
            </div>

            @php
                $parentTypes = $orderTypes->whereNull('parent_id');
                $childTypes = $orderTypes->whereNotNull('parent_id');
                $orderTypeMap = $orderTypes->mapWithKeys(function ($type) {
                    return [
                        $type->id => [
                            'id' => $type->id,
                            'name' => $type->name,
                            'parent_id' => $type->parent_id,
                            'fields' => $type->fields->map(fn($field) => $field->key)->values(),
                        ],
                    ];
                });
                $fieldLabels = $orderTypeFields->mapWithKeys(fn($field) => [$field->key => $field->name]);
            @endphp
            <div class="rounded-2xl border border-slate-200/70 bg-white p-3 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5 dark:shadow-none"
                data-suborders data-suborders-calc="width-price" data-suborders-no-initial="true">
                <script type="application/json" data-suborders-initial>
                    @json(old('sub_orders', []))
                </script>
                <script type="application/json" data-parent-orders-initial>
                    @json(old('parent_orders', []))
                </script>
                <script type="application/json" data-order-types>
                    @json($orderTypeMap)
                </script>
                <script type="application/json" data-order-type-fields>
                    @json($fieldLabels)
                </script>
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <div>
                        <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Позиции</p>
                        <h2 class="mt-2 text-xl font-semibold text-slate-900 dark:text-white">Подзаказы</h2>
                    </div>
                    <x-button size="sm" variant="faded" color="default" data-parent-add>
                        Добавить позицию
                    </x-button>
                </div>

                <div class="mt-3 grid gap-6" data-parent-list></div>

                <template data-parent-template>
                    <div class="rounded-2xl border border-slate-200/70 bg-white/60 p-3 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5 dark:shadow-none"
                        data-parent-block>
                        <div class="flex items-start justify-between gap-3">
                            <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-6" data-parent-fields>
                                <div data-field-key="parent_select">
                                    <input type="hidden" name="parent_orders[__pindex__][order_kind]" value="Родитель" />
                                    <x-select label="Родительский вид" name="parent_orders[__pindex__][order_type_id]"
                                        data-parent-select data-searchable-select>
                                        <option value="">Выберите родителя</option>
                                        @foreach ($parentTypes as $type)
                                            <option value="{{ $type->id }}" data-unit="{{ $type->unit }}"
                                                data-min-qty="{{ $type->min_qty }}" data-price="{{ $type->price }}">
                                                {{ $type->name }}
                                            </option>
                                        @endforeach
                                    </x-select>
                                </div>
                                <div class="hidden text-sm text-slate-400 sm:col-span-2 lg:col-span-2"
                                    data-parent-fields-empty>
                                    Поля не выбраны
                                </div>
                                @foreach ($orderTypeFields as $field)
                                    <div data-field-key="{{ $field->key }}" class="hidden">
                                        @if ($field->key === 'room')
                                            <x-select label="{{ $field->name }}"
                                                name="parent_orders[__pindex__][{{ $field->key }}]"
                                                placeholder="Выберите комнату">
                                                @foreach (['Кухня', 'Спальня', 'Детская', 'Гостиная', 'Кабинет', 'Балкон'] as $room)
                                                    <option value="{{ $room }}">{{ $room }}</option>
                                                @endforeach
                                            </x-select>
                                        @elseif ($field->key === 'quantity')
                                            <x-input label="{{ $field->name }}"
                                                name="parent_orders[__pindex__][{{ $field->key }}]" value="1"
                                                data-parent-qty />
                                        @elseif ($field->key === 'width')
                                            <x-input label="{{ $field->name }}"
                                                name="parent_orders[__pindex__][{{ $field->key }}]" data-parent-width />
                                        @elseif ($field->key === 'height')
                                            <x-input label="{{ $field->name }}"
                                                name="parent_orders[__pindex__][{{ $field->key }}]" data-parent-height />
                                        @elseif ($field->key === 'area')
                                            <x-input label="{{ $field->name }}"
                                                name="parent_orders[__pindex__][{{ $field->key }}]" data-parent-area />
                                        @elseif ($field->key === 'price')
                                            <x-input label="{{ $field->name }}"
                                                name="parent_orders[__pindex__][{{ $field->key }}]" data-parent-price />
                                        @elseif ($field->key === 'amount')
                                            <x-input label="{{ $field->name }}"
                                                name="parent_orders[__pindex__][{{ $field->key }}]" data-parent-amount />
                                        @elseif ($field->key === 'discount')
                                            <x-input label="{{ $field->name }}"
                                                name="parent_orders[__pindex__][{{ $field->key }}]"
                                                data-parent-discount />
                                        @elseif ($field->key === 'total')
                                            <x-input label="{{ $field->name }}"
                                                name="parent_orders[__pindex__][{{ $field->key }}]" data-parent-total />
                                        @elseif ($field->key === 'cornice_type')
                                            <x-select label="{{ $field->name }}"
                                                name="parent_orders[__pindex__][cornice_type_id]"
                                                placeholder="Выберите тип" data-searchable-select>
                                                @foreach ($corniceTypes as $type)
                                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                @endforeach
                                            </x-select>
                                        @elseif ($field->key === 'fabric_code')
                                            <x-select label="{{ $field->name }}"
                                                name="parent_orders[__pindex__][fabric_code_id]"
                                                placeholder="Выберите код" data-searchable-select>
                                                @foreach ($fabricCodes as $code)
                                                    <option value="{{ $code->id }}">{{ $code->name }}</option>
                                                @endforeach
                                            </x-select>
                                        @elseif ($field->key === 'profile_color')
                                            <x-select label="{{ $field->name }}"
                                                name="parent_orders[__pindex__][profile_color_id]"
                                                placeholder="Выберите цвет" data-searchable-select>
                                                @foreach ($profileColors as $color)
                                                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                                                @endforeach
                                            </x-select>
                                        @elseif ($field->key === 'control_type')
                                            <x-select label="{{ $field->name }}"
                                                name="parent_orders[__pindex__][control_type_id]"
                                                placeholder="Выберите тип">
                                                @foreach ($controlTypes as $controlType)
                                                    <option value="{{ $controlType->id }}">{{ $controlType->name }}</option>
                                                @endforeach
                                            </x-select>
                                        @else
                                            <x-input label="{{ $field->name }}"
                                                name="parent_orders[__pindex__][{{ $field->key }}]" />
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                            <x-button size="sm" variant="ghost" color="danger" icon-only="true"
                                aria-label="Удалить родителя" data-parent-remove>
                                <x-icon type="outline" icon="trash" size="5"></x-icon>
                            </x-button>
                        </div>
                        <div class="mt-4 flex flex-wrap items-center justify-between gap-3">
                            <div>
                                <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Дочерние позиции</p>
                                <p class="text-sm text-slate-500">Выберите дочерние типы для этого вида.</p>
                            </div>
                            <x-button size="sm" variant="faded" color="default" data-child-add>
                                Добавить дочерний вид
                            </x-button>
                        </div>
                        <div class="mt-3 grid gap-4" data-child-list></div>
                    </div>
                </template>

                <template data-child-template>
                    <div class="rounded-xl border border-slate-200/70 bg-white/60 p-3 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5 dark:shadow-none"
                        data-suborder-row>
                        <div class="flex items-center justify-between gap-3">
                            <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Дочерний вид</p>
                            <x-button size="sm" variant="ghost" color="danger" icon-only="true"
                                aria-label="Удалить позицию" data-suborder-remove>
                                <x-icon type="outline" icon="trash" size="5"></x-icon>
                            </x-button>
                        </div>
                        <div class="mt-2 grid gap-3 lg:grid-cols-8">
                            <input type="hidden" name="sub_orders[__index__][order_kind]" value="Дочерний" />
                            <div data-field-key="order_type">
                                <x-select label="Вид" name="sub_orders[__index__][order_type_id]" required="true"
                                    data-sub-type data-searchable-select>
                                    <option value="">Выберите вид</option>
                                    @foreach ($orderTypes as $type)
                                        <option value="{{ $type->id }}" data-parent-id="{{ $type->parent_id }}"
                                            data-category="{{ $type->category }}" data-price="{{ $type->price }}"
                                            data-unit="{{ $type->unit }}" data-min-qty="{{ $type->min_qty }}">
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </x-select>
                            </div>
                            <div data-field-key="cornice_type">
                                <x-select label="Тип карниза" name="sub_orders[__index__][cornice_type_id]"
                                    placeholder="Выберите тип" data-searchable-select>
                                    @foreach ($corniceTypes as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </x-select>
                            </div>
                            <div data-field-key="fabric_code">
                                <x-select label="Код ткани" name="sub_orders[__index__][fabric_code_id]"
                                    placeholder="Выберите код" data-searchable-select>
                                    @foreach ($fabricCodes as $code)
                                        <option value="{{ $code->id }}">{{ $code->name }}</option>
                                    @endforeach
                                </x-select>
                            </div>
                            <div data-field-key="profile_color">
                                <x-select label="Цвет профиля" name="sub_orders[__index__][profile_color_id]"
                                    placeholder="Выберите цвет" data-searchable-select>
                                    @foreach ($profileColors as $color)
                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                    @endforeach
                                </x-select>
                            </div>
                            <div data-field-key="control_type">
                                <x-select label="Тип управления" name="sub_orders[__index__][control_type_id]"
                                    placeholder="Выберите тип">
                                    @foreach ($controlTypes as $controlType)
                                        <option value="{{ $controlType->id }}">{{ $controlType->name }}</option>
                                    @endforeach
                                </x-select>
                            </div>
                            <div data-field-key="room">
                                <x-select label="Комната" name="sub_orders[__index__][room]"
                                    placeholder="Выберите комнату">
                                    @foreach (['Кухня', 'Спальня', 'Детская', 'Гостиная', 'Кабинет', 'Балкон'] as $room)
                                        <option value="{{ $room }}">{{ $room }}</option>
                                    @endforeach
                                </x-select>
                            </div>
                            <div data-field-key="division">
                                <x-input label="Разделения" name="sub_orders[__index__][division]"
                                    placeholder="Например 2" />
                            </div>
                            <div data-field-key="width">
                                <x-input label="Ширина" name="sub_orders[__index__][width]" placeholder="см"
                                    data-sub-width />
                            </div>
                            <div data-field-key="height">
                                <x-input label="Высота" name="sub_orders[__index__][height]" placeholder="см"
                                    data-sub-height />
                            </div>
                            <div data-field-key="quantity">
                                <x-input label="Кол-во" name="sub_orders[__index__][quantity]" value="1"
                                    placeholder="1" data-sub-qty />
                            </div>
                            <div data-field-key="area">
                                <x-input label="Площадь" name="sub_orders[__index__][area]" placeholder="0"
                                    inputmode="decimal" step="0.01" data-sub-area />
                            </div>
                            <div data-field-key="price">
                                <x-input label="Цена" name="sub_orders[__index__][price]" placeholder="0"
                                    data-sub-price />
                            </div>
                            <div data-field-key="amount">
                                <x-input label="Сумма" name="sub_orders[__index__][amount]" placeholder="0"
                                    data-sub-amount />
                            </div>
                            <div data-field-key="discount">
                                <x-input label="Скидка" name="sub_orders[__index__][discount]" placeholder="0"
                                    data-sub-discount />
                            </div>
                            <div data-field-key="total">
                                <x-input label="Итого" name="sub_orders[__index__][total]" placeholder="0"
                                    data-sub-total />
                            </div>
                            <div data-field-key="note">
                                <x-input label="Примечания" name="sub_orders[__index__][note]"
                                    placeholder="Комментарий" />
                            </div>
                            <div data-field-key="corsage">
                                <x-input label="Карсаж" name="sub_orders[__index__][corsage]" placeholder="Карсаж" />
                            </div>
                            <div data-field-key="tape">
                                <x-input label="Лента" name="sub_orders[__index__][tape]" placeholder="Лента" />
                            </div>
                            <div data-field-key="sewing">
                                <x-input label="Пошив" name="sub_orders[__index__][sewing]" placeholder="Пошив" />
                            </div>
                            <div data-field-key="installation">
                                <x-input label="Монтаж" name="sub_orders[__index__][installation]"
                                    placeholder="Монтаж" />
                            </div>
                            <div data-field-key="motor">
                                <x-input label="Мотор" name="sub_orders[__index__][motor]" placeholder="Мотор" />
                            </div>
                            <div data-field-key="tiebacks">
                                <x-input label="Прихваты" name="sub_orders[__index__][tiebacks]"
                                    placeholder="Прихваты" />
                            </div>
                        </div>
                    </div>
                </template>
                <script>
                    (function() {
                        const container = document.querySelector('[data-suborders]');
                        if (!container) return;

                        const parentList = container.querySelector('[data-parent-list]');
                        const parentTemplate = container.querySelector('[data-parent-template]');
                        const childTemplate = container.querySelector('[data-child-template]');
                        const typesScript = container.querySelector('[data-order-types]');
                        const fieldsScript = container.querySelector('[data-order-type-fields]');
                        const initialScript = container.querySelector('[data-suborders-initial]');
                        const parentInitialScript = container.querySelector('[data-parent-orders-initial]');

                        if (!parentList || !parentTemplate || !childTemplate || !typesScript || !fieldsScript) return;

                        const typeMap = JSON.parse(typesScript.textContent || '{}');
                        const fieldLabels = JSON.parse(fieldsScript.textContent || '{}');
                        let nextIndex = 0;

                        const triggerRecalc = () => {
                            const form = container.closest('form');
                            if (!form) return;
                            form.dispatchEvent(new CustomEvent('recalc-summary', {
                                bubbles: true
                            }));
                        };

                        const renderParentFields = (target, keys) => {
                            if (!target) return;
                            const empty = target.querySelector('[data-parent-fields-empty]');
                            const nodes = Array.from(target.querySelectorAll('[data-field-key]'));
                            const list = keys && keys.length ? keys : [];
                            if (!list.length) {
                                if (empty) empty.classList.remove('hidden');
                                nodes.forEach((node) => {
                                    if (node.dataset.fieldKey !== 'parent_select') {
                                        node.classList.add('hidden');
                                    }
                                });
                                return;
                            }
                            if (empty) empty.classList.add('hidden');
                            nodes.forEach((node) => {
                                if (node.dataset.fieldKey !== 'parent_select') {
                                    node.classList.add('hidden');
                                }
                            });
                            list.forEach((key) => {
                                const node = nodes.find((item) => item.dataset.fieldKey === key);
                                if (!node) return;
                                node.classList.remove('hidden');
                            });
                        };

                        const updateRowFields = (row, typeId) => {
                            const keys = typeMap[typeId]?.fields || [];
                            const allow = new Set(['order_kind', 'order_type', ...keys]);
                            row.querySelectorAll('[data-field-key]').forEach((block) => {
                                const key = block.dataset.fieldKey;
                                block.classList.toggle('hidden', !allow.has(key));
                            });
                        };

                        const filterChildOptions = (select, parentId) => {
                            if (!select) return;
                            const options = Array.from(select.options);
                            options.forEach((option) => {
                                if (!option.value) return;
                                const matches = String(option.dataset.parentId || '') === String(parentId || '');
                                option.hidden = !matches;
                                option.disabled = !matches;
                            });
                            if (select.value) {
                                const selected = select.selectedOptions[0];
                                if (selected && selected.disabled) {
                                    select.value = '';
                                }
                            }
                            window.texhubSearchableSelect?.apply(select);
                        };

                        const hydrateRow = (row, data) => {
                            if (!row || !data) return;
                            const setField = (field, value) => {
                                const el = row.querySelector(`[name$="[${field}]"]`);
                                if (!el) return;
                                el.value = value ?? '';
                            };
                            setField('order_kind', data.order_kind);
                            setField('order_type_id', data.order_type_id);
                            setField('cornice_type_id', data.cornice_type_id);
                            setField('fabric_code_id', data.fabric_code_id);
                            setField('profile_color_id', data.profile_color_id);
                            setField('control_type_id', data.control_type_id);
                            setField('room', data.room);
                            setField('division', data.division);
                            setField('width', data.width);
                            setField('height', data.height);
                            setField('quantity', data.quantity);
                            setField('area', data.area);
                            setField('price', data.price);
                            setField('amount', data.amount);
                            setField('discount', data.discount);
                            setField('total', data.total);
                            setField('note', data.note);
                            setField('corsage', data.corsage);
                            setField('tape', data.tape);
                            setField('sewing', data.sewing);
                            setField('installation', data.installation);
                            setField('motor', data.motor);
                            setField('tiebacks', data.tiebacks);
                        };

                        const createChildRow = (parentBlock, parentId, data) => {
                            const wrapper = document.createElement('div');
                            wrapper.innerHTML = childTemplate.innerHTML.replaceAll('__index__', String(nextIndex)).trim();
                            const row = wrapper.firstElementChild;
                            if (!row) return;
                            nextIndex += 1;
                            const list = parentBlock.querySelector('[data-child-list]');
                            if (!list) return;
                            list.appendChild(row);
                            const typeSelect = row.querySelector('[data-sub-type]');
                            filterChildOptions(typeSelect, parentId);
                            if (data) {
                                hydrateRow(row, data);
                                if (typeSelect) {
                                    typeSelect.value = data.order_type_id ?? '';
                                }
                            }
                            updateRowFields(row, typeSelect?.value);
                            triggerRecalc();
                        };

                        const triggerRowRecalc = (row) => {
                            const target = row?.querySelector('[data-sub-price]') || row?.querySelector('input, select');
                            if (!target) return;
                            target.dispatchEvent(new Event('input', { bubbles: true }));
                        };

                        const updateParentState = (block) => {
                            if (!block) return;
                            const parentSelect = block.querySelector('[data-parent-select]');
                            const parentFields = block.querySelector('[data-parent-fields]');
                            const childAdd = block.querySelector('[data-child-add]');
                            window.texhubSearchableSelect?.apply(parentSelect);
                            const value = parentSelect?.value || '';
                            const currentFields = value ? (typeMap[value]?.fields || []) : [];
                            renderParentFields(parentFields, currentFields);
                            if (childAdd) {
                                childAdd.disabled = !value;
                                childAdd.classList.toggle('opacity-50', !value);
                                childAdd.classList.toggle('pointer-events-none', !value);
                            }
                            block.querySelectorAll('[data-suborder-row]').forEach((row) => {
                                const typeSelect = row.querySelector('[data-sub-type]');
                                filterChildOptions(typeSelect, value);
                                updateRowFields(row, typeSelect?.value);
                                triggerRowRecalc(row);
                            });
                        };

                        const hydrateParentBlock = (block, data) => {
                            if (!block || !data) return;
                            const parentSelect = block.querySelector('[data-parent-select]');
                            if (parentSelect && data.order_type_id !== undefined) {
                                parentSelect.value = data.order_type_id ?? '';
                                window.texhubSearchableSelect?.apply(parentSelect);
                            }
                            Object.entries(data).forEach(([field, value]) => {
                                if (field === 'order_kind' || field === 'order_type_id') return;
                                const el = block.querySelector(`[name$="[${field}]"]`);
                                if (!el) return;
                                el.value = value ?? '';
                                if (field === 'area' && value !== null && value !== '') {
                                    el.dataset.manual = 'true';
                                }
                            });
                        };

                        const createParentBlock = (parentId, data) => {
                            const wrapper = document.createElement('div');
                            const parentIndex = parentList.children.length;
                            wrapper.innerHTML = parentTemplate.innerHTML.replaceAll('__pindex__', String(parentIndex)).trim();
                            const block = wrapper.firstElementChild;
                            if (!block) return null;
                            parentList.appendChild(block);

                            const parentSelect = block.querySelector('[data-parent-select]');
                            const childAdd = block.querySelector('[data-child-add]');

                            if (parentSelect) parentSelect.value = parentId ?? '';
                            if (data) hydrateParentBlock(block, data);
                            updateParentState(block);

                            parentSelect?.addEventListener('change', () => updateParentState(block));
                            parentSelect?.addEventListener('input', () => updateParentState(block));

                            childAdd?.addEventListener('click', () => {
                                if (!parentSelect?.value) return;
                                createChildRow(block, parentSelect.value);
                            });

                            block.querySelector('[data-parent-remove]')?.addEventListener('click', () => {
                                block.remove();
                                triggerRecalc();
                            });

                            return block;
                        };

                        document.addEventListener('change', (event) => {
                            const parentSelect = event.target.closest('[data-parent-select]');
                            if (parentSelect) {
                                const block = parentSelect.closest('[data-parent-block]');
                                updateParentState(block);
                            }
                            const row = event.target.closest('[data-suborder-row]');
                            if (!row) return;
                            if (event.target.matches('[data-sub-type]')) {
                                updateRowFields(row, event.target.value);
                                triggerRowRecalc(row);
                            }
                        });

                        document.querySelector('[data-parent-add]')?.addEventListener('click', () => {
                            createParentBlock('');
                        });

                        const parentInitialData = parentInitialScript
                            ? JSON.parse(parentInitialScript.textContent || '[]')
                            : [];
                        const childInitialData = initialScript ? JSON.parse(initialScript.textContent || '[]') : [];

                        const blocks = new Map();
                        if (Array.isArray(parentInitialData) && parentInitialData.length > 0) {
                            parentInitialData.forEach((item) => {
                                const parentId = item?.order_type_id ?? '';
                                const block = createParentBlock(parentId, item);
                                if (block) blocks.set(parentId, block);
                            });
                        }

                        if (Array.isArray(childInitialData) && childInitialData.length > 0) {
                            childInitialData.forEach((item) => {
                                const typeId = item?.order_type_id;
                                const parentId = typeMap[typeId]?.parent_id || '';
                                let block = blocks.get(parentId);
                                if (!block) {
                                    block = createParentBlock(parentId);
                                    if (block) blocks.set(parentId, block);
                                }
                                if (block) createChildRow(block, parentId, item);
                            });
                        }
                    })();
                </script>
            </div>

            <div
                class="rounded-2xl border border-slate-200/70 bg-white p-3 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5 dark:shadow-none">
                <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Заказ</p>
                <h2 class="mt-2 text-xl font-semibold text-slate-900 dark:text-white">Основные параметры</h2>


                <div class="mt-6 grid gap-4 lg:grid-cols-6">
                    {{-- <x-input label="Мотор" name="motor" value="{{ old('motor') }}" placeholder="Somfy" /> --}}
                    <x-input label="Сумма заказа" name="order_total" value="{{ old('order_total') }}" placeholder="0"
                        data-order-total />
                    <x-input label="Сумма скидки" name="order_total_discounted"
                        value="{{ old('order_total_discounted') }}" placeholder="0" data-order-discounted />
                    <x-input label="Аванс" name="advance_amount" value="{{ old('advance_amount') }}" placeholder="0"
                        data-order-advance />
                    <x-input label="Остаток" name="balance_amount" value="{{ old('balance_amount') }}" placeholder="0"
                        data-order-balance />
                    <x-input label="Итого" name="grand_total" value="{{ old('grand_total') }}" placeholder="0"
                        data-order-grand />
                </div>

                <div class="mt-6">
                    <x-textarea label="Комментарий к заказу" name="comment" rows="3"
                        placeholder="Особые условия, сроки, заметки">{{ old('comment') }}</x-textarea>
                </div>
            </div>
            <div
                class="rounded-2xl border border-slate-200/70 bg-gradient-to-br from-white/90 via-white/70 to-white/60 p-3 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-[radial-gradient(circle_at_top,_rgba(79,70,229,0.18),_transparent_60%),radial-gradient(circle_at_bottom,_rgba(14,116,144,0.18),_transparent_60%)] dark:shadow-none">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <div>
                        <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Итоги</p>
                        <h2 class="mt-2 text-xl font-semibold text-slate-900 dark:text-white">Суммирование</h2>
                        <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">
                            Итоги считаются автоматически по подзаказам и оплатам.
                        </p>
                    </div>
                    <div
                        class="rounded-2xl border border-emerald-200/70 bg-emerald-50 px-4 py-3 dark:border-emerald-500/20 dark:bg-emerald-500/10">
                        <p class="text-xs text-emerald-600 dark:text-emerald-300">Недостающих</p>
                        <p class="mt-1 text-lg font-semibold text-emerald-700 dark:text-emerald-200" data-summary-balance>0
                        </p>
                    </div>
                </div>

                <div class="mt-5 grid gap-4 lg:grid-cols-4">
                    <div
                        class="rounded-2xl border border-slate-200/70 bg-white/70 p-4 dark:border-white/10 dark:bg-white/5">
                        <p class="text-xs text-slate-500">Сумма всех позиций</p>
                        <p class="mt-2 text-xl font-semibold text-slate-900 dark:text-white" data-summary-amount>0</p>
                        <p class="mt-2 text-xs text-slate-400">Общий подытог</p>
                    </div>
                    <div
                        class="rounded-2xl border border-amber-200/70 bg-amber-50/70 p-4 dark:border-amber-500/20 dark:bg-amber-500/10">
                        <p class="text-xs text-amber-600 dark:text-amber-300">Общая скидка</p>
                        <p class="mt-2 text-xl font-semibold text-amber-700 dark:text-amber-200" data-summary-discount>0
                        </p>
                        <p class="mt-2 text-xs text-amber-500/80 dark:text-amber-300/80">Сумма скидок</p>
                    </div>
                    <div
                        class="rounded-2xl border border-indigo-200/70 bg-indigo-50/70 p-4 dark:border-indigo-500/20 dark:bg-indigo-500/10">
                        <p class="text-xs text-indigo-600 dark:text-indigo-300">Итого по позициям</p>
                        <p class="mt-2 text-xl font-semibold text-indigo-700 dark:text-indigo-200" data-summary-total>0</p>
                        <p class="mt-2 text-xs text-indigo-500/80 dark:text-indigo-300/80">С учётом скидок</p>
                    </div>
                    <div
                        class="rounded-2xl border border-cyan-200/70 bg-cyan-50/70 p-4 dark:border-cyan-500/20 dark:bg-cyan-500/10">
                        <p class="text-xs text-cyan-600 dark:text-cyan-300">Площадь</p>
                        <p class="mt-2 text-xl font-semibold text-cyan-700 dark:text-cyan-200" data-summary-area>0</p>
                        <p class="mt-2 text-xs text-cyan-500/80 dark:text-cyan-300/80">Общая площадь, м²</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap items-center justify-end gap-3">
                <x-button variant="ghost" color="default" type="reset">Сбросить</x-button>
                <x-button type="submit" variant="solid" color="primary" size="lg"
                    data-loading-text="Сохраняем...">
                    Сохранить заказ
                </x-button>
            </div>
        </form>
    </div>
@endsection
