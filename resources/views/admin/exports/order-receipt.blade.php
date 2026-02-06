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

        .table-block {
            margin-top: 6px;
        }

        .right {
            text-align: right;
        }

        .summary {
            width: 100%;
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

        .group-title {
            margin-top: 6px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #111827;
        }

        .group-summary {
            width: 100%;
            margin-left: auto;
            border-collapse: collapse;
            margin-top: 4px;
        }

        .group-summary td {
            border: 1px solid #e5e7eb;
            padding: 3px 4px;
        }

        .group-summary td.label {
            text-transform: none;
            font-size: 9px;
        }

        .summary-row {
            background: #fee2e2;
        }

        .summary-row-alt {
            background: #0f172a;
            color: #ffffff;
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
            <div class="group-title">Группа: {{ $groupTitle }}</div>
            <table class="table table-block">
                <thead>
                    <tr>
                        <th>Вид</th>
                        @if ($visibleFields->contains('cornice_type'))
                            <th>Карн.</th>
                        @endif
                        @if ($visibleFields->contains('fabric_code'))
                            <th>Код</th>
                        @endif
                        @if ($visibleFields->contains('profile_color'))
                            <th>Цвет</th>
                        @endif
                        @if ($visibleFields->contains('control_type'))
                            <th>Упр.</th>
                        @endif
                        @if ($visibleFields->contains('room'))
                            <th>Комн.</th>
                        @endif
                        @if ($visibleFields->contains('division'))
                            <th>Разд.</th>
                        @endif
                        @if ($visibleFields->contains('width'))
                            <th class="right">Шир., см</th>
                        @endif
                        @if ($visibleFields->contains('height'))
                            <th class="right">Выс., см</th>
                        @endif
                        @if ($visibleFields->contains('quantity'))
                            <th class="right">Кол</th>
                        @endif
                        @if ($visibleFields->contains('area'))
                            <th class="right">Площ., м²</th>
                        @endif
                        @if ($visibleFields->contains('price'))
                            <th class="right">Цена, с</th>
                        @endif
                        @if ($visibleFields->contains('amount'))
                            <th class="right">Сумма, с</th>
                        @endif
                        @if ($visibleFields->contains('discount'))
                            <th class="right">Скидка, с</th>
                        @endif
                        @if ($visibleFields->contains('total'))
                            <th class="right">Итого, с</th>
                        @endif
                        @if ($visibleFields->contains('note'))
                            <th>Прим.</th>
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
                </thead>
                <tbody>
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
                                <td class="right">{{ number_format($subOrder->width, 2, '.', ' ') }}</td>
                            @endif
                            @if ($visibleFields->contains('height'))
                                <td class="right">{{ number_format($subOrder->height, 2, '.', ' ') }}</td>
                            @endif
                            @if ($visibleFields->contains('quantity'))
                                <td class="right">{{ $subOrder->quantity }}</td>
                            @endif
                        @if ($visibleFields->contains('area'))
                            <td class="right">
                                {{ number_format(($subOrder->area ?? 0) * max(1, $subOrder->quantity ?? 1), 2, '.', ' ') }}
                            </td>
                        @endif
                            @if ($visibleFields->contains('price'))
                                <td class="right">{{ number_format($subOrder->price, 2, '.', ' ') }} с</td>
                            @endif
                            @if ($visibleFields->contains('amount'))
                                <td class="right">{{ number_format($subOrder->amount, 2, '.', ' ') }} с</td>
                            @endif
                            @if ($visibleFields->contains('discount'))
                                @php
                                    $rowAmount = (float) ($subOrder->amount ?? 0);
                                    $rowDiscountPercent = (float) ($subOrder->discount ?? 0);
                                    $rowDiscountValue = $rowAmount * ($rowDiscountPercent / 100);
                                @endphp
                                <td class="right">{{ number_format($rowDiscountValue, 2, '.', ' ') }} с</td>
                            @endif
                            @if ($visibleFields->contains('total'))
                                <td class="right">{{ number_format($subOrder->total, 2, '.', ' ') }} с</td>
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
                </tbody>
            </table>
            <table class="group-summary">
                <tr class="summary-row">
                    <td class="label">Подытог</td>
                    <td class="right">{{ number_format($groupAmount, 2, '.', ' ') }} с</td>
                    <td class="label">Скидка</td>
                    <td class="right">{{ number_format($groupDiscount, 2, '.', ' ') }} с</td>
                    <td class="label">Итого</td>
                    <td class="right">{{ number_format($groupTotal, 2, '.', ' ') }} с</td>
                    <td class="label">Скидка, %</td>
                    <td class="right">{{ number_format($groupDiscountPercent, 2, '.', ' ') }}%</td>
                </tr>
            </table>
        @endforeach

        <table class="summary">
            @php
                $orderDiscountPercent = $subOrdersAmount > 0 ? ($subOrdersDiscount / $subOrdersAmount) * 100 : 0;
            @endphp
            <tr class="summary-row">
                <td class="label">Подытог</td>
                <td class="right">{{ number_format($subOrdersAmount, 2, '.', ' ') }} с</td>
                <td class="label">Скидка</td>
                <td class="right">{{ number_format($subOrdersDiscount, 2, '.', ' ') }} с</td>
                <td class="label">Итого</td>
                <td class="right">{{ number_format($order->grand_total, 2, '.', ' ') }} с</td>
                <td class="label">Скидка, %</td>
                <td class="right">{{ number_format($orderDiscountPercent, 2, '.', ' ') }}%</td>
            </tr>
            <tr class="summary-row-alt">
                <td class="label">Аванс</td>
                <td class="right">{{ number_format($order->advance_amount, 2, '.', ' ') }} с</td>
                <td class="label">Остаток</td>
                <td class="right">{{ number_format($order->balance_amount, 2, '.', ' ') }} с</td>
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
