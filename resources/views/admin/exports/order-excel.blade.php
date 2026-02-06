<table>
    @php
        $summaryFields = $subOrders
            ->flatMap(function ($subOrder) {
                return $subOrder->orderType?->fields?->pluck('key') ?? collect();
            })
            ->unique()
            ->values();
        $summaryColumns = collect([
            'cornice_type',
            'fabric_code',
            'profile_color',
            'control_type',
            'room',
            'division',
            'width',
            'height',
            'quantity',
            'area',
            'price',
            'amount',
            'discount',
            'total',
            'note',
            'corsage',
            'tape',
            'sewing',
            'installation',
            'motor',
            'tiebacks',
        ])->filter(fn($key) => $summaryFields->contains($key));
        $summaryColumnCount = 2 + $summaryColumns->count();
        $summaryKeys = ['area', 'amount', 'discount', 'total'];
        $summaryVisible = $summaryColumns->filter(fn($key) => in_array($key, $summaryKeys, true));
        $summaryNonSummaryCount = 2 + $summaryColumns
            ->reject(fn($key) => in_array($key, $summaryKeys, true))
            ->count();
        $subOrdersAreaAdjusted = $subOrders->sum(function ($subOrder) {
            $area = (float) ($subOrder->area ?? 0);
            $qty = (float) ($subOrder->quantity ?? 1);
            return $area * max(1, $qty);
        });
    @endphp
    <tr>
        <td colspan="{{ $summaryColumnCount }}">Заказ #{{ $order->id }} — Soyabon</td>
    </tr>
    <tr>
        <td colspan="{{ $summaryColumnCount }}">Дата: {{ $order->created_at->format('d.m.Y H:i') }}</td>
    </tr>
    <tr>
        <td colspan="{{ $summaryColumnCount }}"></td>
    </tr>
    <tr>
        <td colspan="{{ $summaryColumnCount }}">Клиент: {{ $order->client?->full_name ?? 'Не указан' }}</td>
    </tr>
    <tr>
        <td colspan="{{ $summaryColumnCount }}">Телефон: {{ $order->client?->phone ?? 'Без телефона' }}</td>
    </tr>
    <tr>
        <td colspan="{{ $summaryColumnCount }}">Адрес: {{ $order->client?->address ?? 'Адрес не указан' }}</td>
    </tr>
    <tr>
        <td colspan="{{ $summaryColumnCount }}"></td>
    </tr>
    @php
        $groupedSubOrders = $subOrders->groupBy(function ($subOrder) {
            return $subOrder->orderType?->parent?->id ?? $subOrder->orderType?->id ?? 0;
        });
    @endphp
        @foreach ($groupedSubOrders as $group)
            @php
                $visibleFields = $group
                    ->flatMap(function ($subOrder) {
                        return $subOrder->orderType?->fields?->pluck('key') ?? collect();
                    })
                    ->unique()
                    ->values();
                $visibleColumns = collect([
                    'cornice_type',
                    'fabric_code',
                    'profile_color',
                    'control_type',
                    'room',
                    'division',
                    'width',
                    'height',
                    'quantity',
                    'area',
                    'price',
                    'amount',
                    'discount',
                    'total',
                    'note',
                    'corsage',
                    'tape',
                    'sewing',
                    'installation',
                    'motor',
                    'tiebacks',
                ])->filter(fn($key) => $visibleFields->contains($key));
                $columnCount = 2 + $visibleColumns->count();
                $groupTitle = $group->first()?->orderType?->parent?->name ?? $group->first()?->orderType?->name ?? '—';
                $groupAmount = $group->sum('amount');
                $groupDiscount = $group->sum(function ($subOrder) {
                    $amount = (float) ($subOrder->amount ?? 0);
                    $total = (float) ($subOrder->total ?? 0);
                    return max(0, $amount - $total);
                });
                $groupTotal = $group->sum('total');
                $groupDiscountPercent = $groupAmount > 0 ? ($groupDiscount / $groupAmount) * 100 : 0;
            @endphp
            <tr>
                <td colspan="{{ $columnCount }}">Группа: {{ $groupTitle }}</td>
            </tr>
            <tr>
                <th>Вид</th>
                @if ($visibleFields->contains('cornice_type'))
                    <th>Тип карниза</th>
                @endif
            @if ($visibleFields->contains('fabric_code'))
                <th>Код ткани</th>
            @endif
            @if ($visibleFields->contains('profile_color'))
                <th>Цвет профиля</th>
            @endif
            @if ($visibleFields->contains('control_type'))
                <th>Тип управления</th>
            @endif
            @if ($visibleFields->contains('room'))
                <th>Комната</th>
            @endif
            @if ($visibleFields->contains('division'))
                <th>Разделения</th>
            @endif
            @if ($visibleFields->contains('width'))
                <th>Ширина</th>
            @endif
            @if ($visibleFields->contains('height'))
                <th>Высота</th>
            @endif
            @if ($visibleFields->contains('quantity'))
                <th>Кол-во</th>
            @endif
            @if ($visibleFields->contains('area'))
                <th>Площадь</th>
            @endif
            @if ($visibleFields->contains('price'))
                <th>Цена</th>
            @endif
            @if ($visibleFields->contains('amount'))
                <th>Сумма</th>
            @endif
            @if ($visibleFields->contains('discount'))
                <th>Скидка</th>
            @endif
            @if ($visibleFields->contains('total'))
                <th>Итого</th>
            @endif
            @if ($visibleFields->contains('note'))
                <th>Примечания</th>
            @endif
            @if ($visibleFields->contains('corsage'))
                <th>Карсаж</th>
            @endif
            @if ($visibleFields->contains('tape'))
                <th>Лента</th>
            @endif
            @if ($visibleFields->contains('sewing'))
                <th>Пошив</th>
            @endif
            @if ($visibleFields->contains('installation'))
                <th>Монтаж</th>
            @endif
            @if ($visibleFields->contains('motor'))
                <th>Мотор</th>
            @endif
            @if ($visibleFields->contains('tiebacks'))
                <th>Прихваты</th>
            @endif
        </tr>
        @foreach ($group as $subOrder)
            <tr>
                <td>{{ $subOrder->orderType?->name ?? '—' }}</td>
                @if ($visibleFields->contains('cornice_type'))
                    <td>{{ $subOrder->corniceType?->name ?? '—' }}</td>
                @endif
                @if ($visibleFields->contains('fabric_code'))
                    <td>{{ $subOrder->fabricCode?->name ?? '—' }}</td>
                @endif
                @if ($visibleFields->contains('profile_color'))
                    <td>{{ $subOrder->profileColor?->name ?? '—' }}</td>
                @endif
                @if ($visibleFields->contains('control_type'))
                    <td>{{ $subOrder->controlType?->name ?? '—' }}</td>
                @endif
                @if ($visibleFields->contains('room'))
                    <td>{{ $subOrder->room ?? '—' }}</td>
                @endif
                @if ($visibleFields->contains('division'))
                    <td>{{ $subOrder->division ?? '—' }}</td>
                @endif
                @if ($visibleFields->contains('width'))
                    <td>{{ $subOrder->width }} см</td>
                @endif
                @if ($visibleFields->contains('height'))
                    <td>{{ $subOrder->height }} см</td>
                @endif
                @if ($visibleFields->contains('quantity'))
                    <td>{{ $subOrder->quantity }}</td>
                @endif
                @if ($visibleFields->contains('area'))
                    <td>{{ ($subOrder->area ?? 0) * max(1, $subOrder->quantity ?? 1) }} м²</td>
                @endif
                @if ($visibleFields->contains('price'))
                    <td>{{ $subOrder->price }} с</td>
                @endif
                @if ($visibleFields->contains('amount'))
                    <td>{{ $subOrder->amount }} с</td>
                @endif
                @if ($visibleFields->contains('discount'))
                    @php
                        $rowAmount = (float) ($subOrder->amount ?? 0);
                        $rowDiscountPercent = (float) ($subOrder->discount ?? 0);
                        $rowDiscountValue = $rowAmount * ($rowDiscountPercent / 100);
                    @endphp
                    <td>{{ number_format($rowDiscountValue, 2, '.', ' ') }} с</td>
                @endif
                @if ($visibleFields->contains('total'))
                    <td>{{ $subOrder->total }} с</td>
                @endif
                @if ($visibleFields->contains('note'))
                    <td>{{ $subOrder->note ?? '—' }}</td>
                @endif
                @if ($visibleFields->contains('corsage'))
                    <td>{{ $subOrder->corsage ?? '—' }}</td>
                @endif
                @if ($visibleFields->contains('tape'))
                    <td>{{ $subOrder->tape ?? '—' }}</td>
                @endif
                @if ($visibleFields->contains('sewing'))
                    <td>{{ $subOrder->sewing ?? '—' }}</td>
                @endif
                @if ($visibleFields->contains('installation'))
                    <td>{{ $subOrder->installation ?? '—' }}</td>
                @endif
                @if ($visibleFields->contains('motor'))
                    <td>{{ $subOrder->motor ?? '—' }}</td>
                @endif
                @if ($visibleFields->contains('tiebacks'))
                    <td>{{ $subOrder->tiebacks ?? '—' }}</td>
                @endif
            </tr>
        @endforeach
        <tr style="background:#f3f4f6;">
            <td colspan="{{ max(1, $columnCount - 8) }}">Подытог</td>
            <td>{{ $groupAmount }} с</td>
            <td>Скидка</td>
            <td>{{ $groupDiscount }} с</td>
            <td>Итого</td>
            <td>{{ $groupTotal }} с</td>
            <td>Скидка, %</td>
            <td>{{ number_format($groupDiscountPercent, 2, '.', ' ') }}%</td>
        </tr>
        <tr>
            <td colspan="{{ $columnCount }}"></td>
        </tr>
    @endforeach
    <tr>
        <td colspan="{{ $summaryNonSummaryCount }}"></td>
        @foreach ($summaryVisible as $summaryKey)
            @if ($summaryKey === 'area')
                <td>{{ $subOrdersAreaAdjusted }} м²</td>
            @elseif ($summaryKey === 'amount')
                <td>{{ $subOrdersAmount }} с</td>
            @elseif ($summaryKey === 'discount')
                <td>{{ $subOrdersDiscount }} с</td>
            @elseif ($summaryKey === 'total')
                <td>{{ $subOrdersTotal }} с</td>
            @endif
        @endforeach
    </tr>
    <tr>
        <td colspan="{{ $summaryColumnCount }}"></td>
    </tr>
    @php
        $orderDiscountPercent = $subOrdersAmount > 0 ? ($subOrdersDiscount / $subOrdersAmount) * 100 : 0;
    @endphp
    <tr style="background:#f3f4f6;">
        <td colspan="{{ max(1, $summaryColumnCount - 8) }}">Подытог</td>
        <td>{{ $subOrdersAmount }} с</td>
        <td>Скидка</td>
        <td>{{ $subOrdersDiscount }} с</td>
        <td>Итого</td>
        <td>{{ $order->grand_total }} с</td>
        <td>Скидка, %</td>
        <td>{{ number_format($orderDiscountPercent, 2, '.', ' ') }}%</td>
    </tr>
    <tr style="background:#e2e8f0;">
        <td colspan="{{ max(1, $summaryColumnCount - 4) }}">Аванс</td>
        <td>{{ $order->advance_amount }} с</td>
        <td>Остаток</td>
        <td>{{ $order->balance_amount }} с</td>
    </tr>
</table>
