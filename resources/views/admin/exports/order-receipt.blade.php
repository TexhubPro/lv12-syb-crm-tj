<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>Чек заказа #{{ $order->id }}</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 8mm 10mm;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            color: #0f172a;
            font-size: 9px;
        }

        h1,
        h2,
        h3,
        h4 {
            margin: 0;
        }

        .muted {
            color: #6b7280;
        }

        .header {
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 10px 12px;
            background: #f8fafc;
            margin-bottom: 8px;
        }

        .header-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .title {
            font-size: 14px;
            font-weight: 700;
            color: #111827;
            letter-spacing: 0.08em;
        }

        .header-meta {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .section {
            border-top: 1px solid #e5e7eb;
            padding-top: 6px;
            margin-top: 6px;
        }

        .info-grid {
            width: 100%;
            border-collapse: collapse;
        }

        .info-grid td {
            width: 50%;
            vertical-align: top;
            padding: 3px 6px 8px;
        }

        .label {
            font-size: 9px;
            text-transform: uppercase;
            color: #6b7280;
            letter-spacing: 0.08em;
        }

        .value {
            font-weight: 600;
            margin-top: 4px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 6px;
        }

        .table th,
        .table td {
            border: 1px solid #e5e7eb;
            padding: 3px 4px;
            text-align: left;
        }

        .table th {
            background: #f3f4f6;
            font-size: 8px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #6b7280;
        }

        .table td {
            font-size: 9px;
        }

        .right {
            text-align: right;
        }

        .summary {
            width: 34%;
            margin-left: auto;
            border-collapse: collapse;
            margin-top: 6px;
        }

        .summary td {
            border: 1px solid #e5e7eb;
            padding: 4px;
        }

        .summary td.label {
            text-transform: none;
            font-size: 9px;
        }

        .summary .total {
            background: #111827;
            color: #fff;
            font-weight: 700;
        }

        .signature {
            margin-top: 8px;
            display: flex;
            justify-content: space-between;
        }

        .signature-line {
            border-bottom: 1px solid #94a3b8;
            width: 45%;
            height: 14px;
        }
    </style>
</head>

<body>

    <table class="info-grid">
        <tr>
            <td>
                <div class="label">Компания</div>
                <div class="value">SOYABON</div>
                <div class="muted">г. Душанбе, ул. Аль Бируни 6</div>
                <div class="muted">info@soyabon.tj</div>
                <div class="muted">+992 (93) 655-00-00</div>
            </td>
            <td>
                <div class="label">Клиент</div>
                <div class="value">{{ $order->client?->full_name ?? 'Не указан' }}</div>
                <div class="muted">{{ $order->client?->address ?? 'Адрес не указан' }}</div>
                <div class="muted">{{ $order->client?->phone ?? 'Без телефона' }}</div>
                <div class="muted">Оформил: {{ $order->user?->name ?? ($order->user?->phone ?? 'Система') }}</div>
            </td>
        </tr>
    </table>

    <div class="section">
        <table class="table">
            <thead>
                <tr>
                    <th>Тип</th>
                    <th>Вид</th>
                    <th>Карн.</th>
                    <th>Код</th>
                    <th>Цвет</th>
                    <th>Упр.</th>
                    <th>Комн.</th>
                    <th>Разд.</th>
                    <th class="right">Шир., см</th>
                    <th class="right">Выс., см</th>
                    <th class="right">Кол</th>
                    <th class="right">Площ., м²</th>
                    <th class="right">Цена, с</th>
                    <th class="right">Сумма, с</th>
                    <th class="right">Скидка, с</th>
                    <th class="right">Итого, с</th>
                </tr>
            </thead>
            <tbody>
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
                        <td class="right">{{ number_format($subOrder->width, 2, '.', ' ') }}</td>
                        <td class="right">{{ number_format($subOrder->height, 2, '.', ' ') }}</td>
                        <td class="right">{{ $subOrder->quantity }}</td>
                        <td class="right">{{ number_format($subOrder->area, 2, '.', ' ') }}</td>
                        <td class="right">{{ number_format($subOrder->price, 2, '.', ' ') }} с</td>
                        <td class="right">{{ number_format($subOrder->amount, 2, '.', ' ') }} с</td>
                        <td class="right">{{ number_format($subOrder->discount, 2, '.', ' ') }} с</td>
                        <td class="right">{{ number_format($subOrder->total, 2, '.', ' ') }} с</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <table class="summary">
            <tr>
                <td class="label">Сумма</td>
                <td class="right">{{ number_format($subOrdersAmount, 2, '.', ' ') }} с</td>
            </tr>
            <tr>
                <td class="label">Скидка</td>
                <td class="right">{{ number_format($subOrdersDiscount, 2, '.', ' ') }} с</td>
            </tr>
            <tr>
                <td class="label">Переделки</td>
                <td class="right">{{ number_format($order->rework_amount, 2, '.', ' ') }} с</td>
            </tr>
            <tr class="total">
                <td class="label">Итого</td>
                <td class="right">{{ number_format($order->grand_total, 2, '.', ' ') }} с</td>
            </tr>
        </table>
    </div>

    <div class="signature">
        <div>
            Подпись клиента
            <div class="signature-line"></div>
        </div>
        <div>
            Дата
            <div class="signature-line"></div>
        </div>
    </div>
</body>

</html>
