<table>
    <tr>
        <td colspan="16">Заказ #{{ $order->id }} — Soyabon</td>
    </tr>
    <tr>
        <td colspan="16">Дата: {{ $order->created_at->format('d.m.Y H:i') }}</td>
    </tr>
    <tr>
        <td colspan="16"></td>
    </tr>
    <tr>
        <td colspan="16">Клиент: {{ $order->client?->full_name ?? 'Не указан' }}</td>
    </tr>
    <tr>
        <td colspan="16">Телефон: {{ $order->client?->phone ?? 'Без телефона' }}</td>
    </tr>
    <tr>
        <td colspan="16">Адрес: {{ $order->client?->address ?? 'Адрес не указан' }}</td>
    </tr>
    <tr>
        <td colspan="16"></td>
    </tr>
    <tr>
        <th>Тип</th>
        <th>Вид</th>
        <th>Тип карниза</th>
        <th>Код ткани</th>
        <th>Цвет профиля</th>
        <th>Тип управления</th>
        <th>Комната</th>
        <th>Разделения</th>
        <th>Ширина</th>
        <th>Высота</th>
        <th>Кол-во</th>
        <th>Площадь</th>
        <th>Цена</th>
        <th>Сумма</th>
        <th>Скидка</th>
        <th>Итого</th>
    </tr>
    @foreach ($order->subOrders as $subOrder)
        <tr>
            <td>{{ $subOrder->order_kind ?? '—' }}</td>
            <td>{{ $subOrder->orderType?->name ?? '—' }}</td>
            <td>{{ $subOrder->corniceType?->name ?? '—' }}</td>
            <td>{{ $subOrder->fabricCode?->name ?? '—' }}</td>
            <td>{{ $subOrder->profileColor?->name ?? '—' }}</td>
            <td>{{ $subOrder->controlType?->name ?? '—' }}</td>
            <td>{{ $subOrder->room ?? '—' }}</td>
            <td>{{ $subOrder->division ?? '—' }}</td>
            <td>{{ $subOrder->width }} см</td>
            <td>{{ $subOrder->height }} см</td>
            <td>{{ $subOrder->quantity }}</td>
            <td>{{ $subOrder->area }} м²</td>
            <td>{{ $subOrder->price }} с</td>
            <td>{{ $subOrder->amount }} с</td>
            <td>{{ $subOrder->discount }} с</td>
            <td>{{ $subOrder->total }} с</td>
        </tr>
    @endforeach
    <tr>
        <td colspan="11"></td>
        <td>{{ $subOrdersArea }} м²</td>
        <td></td>
        <td>{{ $subOrdersAmount }} с</td>
        <td>{{ $subOrdersDiscount }} с</td>
        <td>{{ $subOrdersTotal }} с</td>
    </tr>
    <tr>
        <td colspan="16"></td>
    </tr>
    <tr>
        <td colspan="16">Оплаченная сумма: {{ $order->advance_amount }} с</td>
    </tr>
    <tr>
        <td colspan="16">Общая скидка: {{ $subOrdersDiscount }} с</td>
    </tr>
    <tr>
        <td colspan="16">Остаток: {{ $order->balance_amount }} с</td>
    </tr>
    <tr>
        <td colspan="16">Переделки: {{ $order->rework_amount }} с</td>
    </tr>
    <tr>
        <td colspan="16">Итого по заказу: {{ $order->grand_total }} с</td>
    </tr>
</table>
