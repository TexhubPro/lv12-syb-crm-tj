<table>
    <tr>
        <td colspan="6">Отчет по панели — Soyabon</td>
    </tr>
    <tr>
        <td colspan="6">Период: {{ $period }}</td>
    </tr>
    <tr>
        <td colspan="6">Сформирован: {{ $generatedAt->format('d.m.Y H:i') }}</td>
    </tr>
    <tr>
        <td colspan="6"></td>
    </tr>
    <tr>
        <th>Заказов</th>
        <th>Выручка, с</th>
        <th>Скидки, с</th>
        <th>Средний чек, с</th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <td>{{ $ordersCount }}</td>
        <td>{{ number_format($totalRevenue, 2, '.', ' ') }}</td>
        <td>{{ number_format($totalDiscount, 2, '.', ' ') }}</td>
        <td>{{ number_format($avgOrder, 2, '.', ' ') }}</td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="6"></td>
    </tr>
    <tr>
        <th>Топ клиенты</th>
        <th>Заказов</th>
        <th>Сумма, с</th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    @foreach ($topClients as $clientRow)
        <tr>
            <td>{{ $clientRow->client?->full_name ?? '—' }}</td>
            <td>{{ $clientRow->orders_count }}</td>
            <td>{{ number_format($clientRow->total_amount, 2, '.', ' ') }}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    @endforeach
    <tr>
        <td colspan="6"></td>
    </tr>
    <tr>
        <th>Топ менеджеры</th>
        <th>Заказов</th>
        <th>Сумма, с</th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    @foreach ($topManagers as $managerRow)
        <tr>
            <td>{{ $managerRow->user?->name ?? $managerRow->user?->phone ?? '—' }}</td>
            <td>{{ $managerRow->orders_count }}</td>
            <td>{{ number_format($managerRow->total_amount, 2, '.', ' ') }}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    @endforeach
</table>
