@extends('admin.layouts.app')

@section('title', 'Редактирование заказа')

@section('content')
    <div class="grid gap-3">
        <div class="flex flex-wrap items-start justify-between gap-3">
            <div>
                <p class="text-xs uppercase tracking-[0.4em] text-slate-500 dark:text-slate-500">Касса</p>
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
            </x-alert>
        @endif

        <form class="grid gap-3" method="POST" action="{{ route('admin.orders.update', $order) }}">
            @csrf
            @method('PUT')

            <div
                class="rounded-2xl border border-slate-200/70 bg-white p-3 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5 dark:shadow-none">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <div>
                        <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Клиент</p>
                        <h2 class="mt-2 text-xl font-semibold text-slate-900 dark:text-white">Данные клиента</h2>
                    </div>
                    <x-switch label="Новый клиент" data-client-toggle></x-switch>
                </div>

                <div class="mt-3 grid gap-4" data-client-select>
                    <x-select label="Выбрать клиента" name="client_id" placeholder="Выберите клиента">
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}" @selected(old('client_id', $order->client_id) == $client->id)>
                                {{ $client->full_name }} — {{ $client->phone }}
                            </option>
                        @endforeach
                    </x-select>
                </div>

                <div class="mt-3 hidden grid grid-cols-1 lg:grid-cols-3 gap-4" data-new-client-fields>
                    <x-input label="ФИО" name="new_client_full_name" value="{{ old('new_client_full_name') }}"
                        placeholder="Иванов Иван Иванович" />
                    <x-input label="Телефон" name="new_client_phone" value="{{ old('new_client_phone') }}"
                        placeholder="931234567" />
                    <x-input label="Адрес" name="new_client_address" value="{{ old('new_client_address') }}"
                        placeholder="Город, улица, дом" />
                </div>
            </div>

            <div class="rounded-2xl border border-slate-200/70 bg-white p-3 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5 dark:shadow-none"
                data-suborders>
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <div>
                        <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Позиции</p>
                        <h2 class="mt-2 text-xl font-semibold text-slate-900 dark:text-white">Подзаказы</h2>
                    </div>
                    <x-button size="sm" variant="faded" color="default" data-suborder-add>
                        Добавить позицию
                    </x-button>
                </div>

                <div class="mt-6 grid gap-6" data-suborders-list>
                    @php
                        $subOrders = old('sub_orders');
                        if ($subOrders === null) {
                            $subOrders = $order->subOrders
                                ->map(function ($subOrder) {
                                    return [
                                        'order_kind' => $subOrder->order_kind,
                                        'order_type_id' => $subOrder->order_type_id,
                                        'cornice_type_id' => $subOrder->cornice_type_id,
                                        'fabric_code_id' => $subOrder->fabric_code_id,
                                        'profile_color_id' => $subOrder->profile_color_id,
                                        'control_type_id' => $subOrder->control_type_id,
                                        'room' => $subOrder->room,
                                        'division' => $subOrder->division,
                                        'width' => $subOrder->width,
                                        'height' => $subOrder->height,
                                        'quantity' => $subOrder->quantity,
                                        'area' => $subOrder->area,
                                        'price' => $subOrder->price,
                                        'amount' => $subOrder->amount,
                                        'discount' => $subOrder->discount,
                                        'total' => $subOrder->total,
                                    ];
                                })
                                ->all();
                        }
                    @endphp

                    @if (is_array($subOrders) && count($subOrders))
                        @foreach ($subOrders as $index => $subOrder)
                            <div class="rounded-xl border border-slate-200/70 bg-white/60 p-3 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5 dark:shadow-none"
                                data-suborder-row>
                                <div class="flex items-center justify-between gap-3">
                                    <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Позиция</p>
                                    <x-button size="sm" variant="ghost" color="danger" icon-only="true"
                                        aria-label="Удалить позицию" data-suborder-remove>
                                        <x-icon type="outline" icon="trash" size="5"></x-icon>
                                    </x-button>
                                </div>
                                <div class="mt-4 grid gap-3 lg:grid-cols-8">
                                    <x-select label="Тип" name="sub_orders[{{ $index }}][order_kind]"
                                        placeholder="Выберите тип" required="true">
                                        @foreach (['Штора', 'Жалюзи', 'Плиссе'] as $kind)
                                            <option value="{{ $kind }}" @selected(($subOrder['order_kind'] ?? '') === $kind)>
                                                {{ $kind }}
                                            </option>
                                        @endforeach
                                    </x-select>
                                    <x-select label="Вид" name="sub_orders[{{ $index }}][order_type_id]"
                                        placeholder="Выберите вид">
                                        @foreach ($orderTypes as $type)
                                            <option value="{{ $type->id }}" @selected(($subOrder['order_type_id'] ?? null) == $type->id)>
                                                {{ $type->name }}
                                            </option>
                                        @endforeach
                                    </x-select>
                                    <x-select label="Тип карниза" name="sub_orders[{{ $index }}][cornice_type_id]"
                                        placeholder="Выберите тип">
                                        @foreach ($corniceTypes as $type)
                                            <option value="{{ $type->id }}" @selected(($subOrder['cornice_type_id'] ?? null) == $type->id)>
                                                {{ $type->name }}
                                            </option>
                                        @endforeach
                                    </x-select>
                                    <x-select label="Код ткани" name="sub_orders[{{ $index }}][fabric_code_id]"
                                        placeholder="Выберите код">
                                        @foreach ($fabricCodes as $code)
                                            <option value="{{ $code->id }}" @selected(($subOrder['fabric_code_id'] ?? null) == $code->id)>
                                                {{ $code->name }}
                                            </option>
                                        @endforeach
                                    </x-select>
                                    <x-select label="Цвет профиля" name="sub_orders[{{ $index }}][profile_color_id]"
                                        placeholder="Выберите цвет">
                                        @foreach ($profileColors as $color)
                                            <option value="{{ $color->id }}" @selected(($subOrder['profile_color_id'] ?? null) == $color->id)>
                                                {{ $color->name }}
                                            </option>
                                        @endforeach
                                    </x-select>
                                    <x-select label="Тип управления"
                                        name="sub_orders[{{ $index }}][control_type_id]" placeholder="Выберите тип">
                                        @foreach ($controlTypes as $controlType)
                                            <option value="{{ $controlType->id }}" @selected(($subOrder['control_type_id'] ?? null) == $controlType->id)>
                                                {{ $controlType->name }}
                                            </option>
                                        @endforeach
                                    </x-select>
                                    <x-select label="Комната" name="sub_orders[{{ $index }}][room]"
                                        placeholder="Выберите комнату">
                                        @foreach (['Кухня', 'Спальня', 'Детская', 'Гостиная', 'Кабинет', 'Балкон'] as $room)
                                            <option value="{{ $room }}" @selected(($subOrder['room'] ?? '') === $room)>
                                                {{ $room }}
                                            </option>
                                        @endforeach
                                    </x-select>
                                    <x-input label="Разделения" name="sub_orders[{{ $index }}][division]"
                                        value="{{ $subOrder['division'] ?? '' }}" placeholder="Например 2" />
                                    <x-input label="Ширина" name="sub_orders[{{ $index }}][width]"
                                        value="{{ $subOrder['width'] ?? '' }}" placeholder="см" data-sub-width />
                                    <x-input label="Высота" name="sub_orders[{{ $index }}][height]"
                                        value="{{ $subOrder['height'] ?? '' }}" placeholder="см" data-sub-height />
                                    <x-input label="Кол-во" name="sub_orders[{{ $index }}][quantity]"
                                        value="{{ $subOrder['quantity'] ?? '' }}" placeholder="1" data-sub-qty />
                                    <x-input label="Площадь" name="sub_orders[{{ $index }}][area]"
                                        value="{{ $subOrder['area'] ?? '' }}" placeholder="0" inputmode="decimal"
                                        step="0.01" data-sub-area />
                                    <x-input label="Цена" name="sub_orders[{{ $index }}][price]"
                                        value="{{ $subOrder['price'] ?? '' }}" placeholder="0" data-sub-price />
                                    <x-input label="Сумма" name="sub_orders[{{ $index }}][amount]"
                                        value="{{ $subOrder['amount'] ?? '' }}" placeholder="0" data-sub-amount />
                                    <x-input label="Скидка" name="sub_orders[{{ $index }}][discount]"
                                        value="{{ $subOrder['discount'] ?? '' }}" placeholder="0" data-sub-discount />
                                    <x-input label="Итого" name="sub_orders[{{ $index }}][total]"
                                        value="{{ $subOrder['total'] ?? '' }}" placeholder="0" data-sub-total />
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <template data-suborder-template>
                    <div class="rounded-xl border border-slate-200/70 bg-white/60 p-3 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5 dark:shadow-none"
                        data-suborder-row>
                        <div class="flex items-center justify-between gap-3">
                            <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Позиция</p>
                            <x-button size="sm" variant="ghost" color="danger" icon-only="true"
                                aria-label="Удалить позицию" data-suborder-remove>
                                <x-icon type="outline" icon="trash" size="5"></x-icon>
                            </x-button>
                        </div>
                        <div class="mt-4 grid gap-3 lg:grid-cols-8">
                            <x-select label="Тип" name="sub_orders[__index__][order_kind]" placeholder="Выберите тип"
                                required="true">
                                @foreach (['Штора', 'Жалюзи', 'Плиссе'] as $kind)
                                    <option value="{{ $kind }}">{{ $kind }}</option>
                                @endforeach
                            </x-select>
                            <x-select label="Вид" name="sub_orders[__index__][order_type_id]"
                                placeholder="Выберите вид">
                                @foreach ($orderTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </x-select>
                            <x-select label="Тип карниза" name="sub_orders[__index__][cornice_type_id]"
                                placeholder="Выберите тип">
                                @foreach ($corniceTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </x-select>

                            <x-select label="Код ткани" name="sub_orders[__index__][fabric_code_id]"
                                placeholder="Выберите код">
                                @foreach ($fabricCodes as $code)
                                    <option value="{{ $code->id }}">{{ $code->name }}</option>
                                @endforeach
                            </x-select>
                            <x-select label="Цвет профиля" name="sub_orders[__index__][profile_color_id]"
                                placeholder="Выберите цвет">
                                @foreach ($profileColors as $color)
                                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                                @endforeach
                            </x-select>
                            <x-select label="Тип управления" name="sub_orders[__index__][control_type_id]"
                                placeholder="Выберите тип">
                                @foreach ($controlTypes as $controlType)
                                    <option value="{{ $controlType->id }}">{{ $controlType->name }}</option>
                                @endforeach
                            </x-select>
                            <x-select label="Комната" name="sub_orders[__index__][room]" placeholder="Выберите комнату">
                                @foreach (['Кухня', 'Спальня', 'Детская', 'Гостиная', 'Кабинет', 'Балкон'] as $room)
                                    <option value="{{ $room }}">{{ $room }}</option>
                                @endforeach
                            </x-select>
                            <x-input label="Разделения" name="sub_orders[__index__][division]"
                                placeholder="Например 2" />
                            <x-input label="Ширина" name="sub_orders[__index__][width]" placeholder="см"
                                data-sub-width />
                            <x-input label="Высота" name="sub_orders[__index__][height]" placeholder="см"
                                data-sub-height />
                            <x-input label="Кол-во" name="sub_orders[__index__][quantity]" placeholder="1"
                                data-sub-qty />
                            <x-input label="Площадь" name="sub_orders[__index__][area]" placeholder="0"
                                inputmode="decimal" step="0.01" data-sub-area />
                            <x-input label="Цена" name="sub_orders[__index__][price]" placeholder="0" data-sub-price />
                            <x-input label="Сумма" name="sub_orders[__index__][amount]" placeholder="0"
                                data-sub-amount />
                            <x-input label="Скидка" name="sub_orders[__index__][discount]" placeholder="0"
                                data-sub-discount />
                            <x-input label="Итого" name="sub_orders[__index__][total]" placeholder="0" data-sub-total />

                        </div>
                    </div>
                </template>
            </div>

            <div
                class="rounded-2xl border border-slate-200/70 bg-white p-3 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5 dark:shadow-none">
                <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Заказ</p>
                <h2 class="mt-2 text-xl font-semibold text-slate-900 dark:text-white">Основные параметры</h2>


                <div class="mt-6 grid gap-4 lg:grid-cols-6">
                    {{-- <x-input label="Мотор" name="motor" value="{{ old('motor') }}" placeholder="Somfy" /> --}}
                    <x-input label="Сумма заказа" name="order_total"
                        value="{{ old('order_total', $order->order_total) }}" placeholder="0" data-order-total />
                    <x-input label="Сумма скидки" name="order_total_discounted"
                        value="{{ old('order_total_discounted', $order->order_total_discounted) }}" placeholder="0"
                        data-order-discounted />
                    <x-input label="Оплаченная сумма" name="advance_amount"
                        value="{{ old('advance_amount', $order->advance_amount) }}" placeholder="0" data-order-advance />
                    <x-input label="Остаток" name="balance_amount"
                        value="{{ old('balance_amount', $order->balance_amount) }}" placeholder="0" data-order-balance />
                    <x-input label="Переделки" name="rework_amount"
                        value="{{ old('rework_amount', $order->rework_amount) }}" placeholder="0" data-order-rework />
                    <x-input label="Итого" name="grand_total" value="{{ old('grand_total', $order->grand_total) }}"
                        placeholder="0" data-order-grand />
                </div>

                <div class="mt-6">
                    <x-textarea label="Комментарий к заказу" name="comment" rows="3"
                        placeholder="Особые условия, сроки, заметки">{{ old('comment', $order->comment) }}</x-textarea>
                </div>
            </div>
            <div
                class="rounded-2xl border border-slate-200/70 bg-gradient-to-br from-white/90 via-white/70 to-white/60 p-5 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-[radial-gradient(circle_at_top,_rgba(79,70,229,0.18),_transparent_60%),radial-gradient(circle_at_bottom,_rgba(14,116,144,0.18),_transparent_60%)] dark:shadow-none">
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
                <x-button type="submit" variant="solid" color="primary" size="lg">Сохранить изменения</x-button>
            </div>
        </form>
    </div>
@endsection
