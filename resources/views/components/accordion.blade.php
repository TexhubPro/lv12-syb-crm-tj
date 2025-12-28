@props([
    'variant' => 'default',
    'multiple' => false,
    'flush' => false,
    'radius' => '2xl',
    'border' => false,
])
@php
    $variantKey = strtolower((string) $variant);
    $radiusKey = strtolower((string) $radius);
    $borderEnabled = filter_var($border, FILTER_VALIDATE_BOOLEAN);
    $radiusMap = [
        'none' => 'rounded-none',
        'sm' => 'rounded-sm',
        'md' => 'rounded-md',
        'lg' => 'rounded-lg',
        '2xl' => 'rounded-2xl',
    ];
    $radiusClass = $radiusMap[$radiusKey] ?? $radiusMap['2xl'];
    $borderMap = [
        'default' => 'border-gray-200 dark:border-gray-800',
        'primary' => 'border-blue-200 dark:border-blue-500/30',
        'secondary' => 'border-purple-200 dark:border-purple-500/30',
        'success' => 'border-green-200 dark:border-green-500/30',
        'warning' => 'border-orange-200 dark:border-orange-500/30',
        'danger' => 'border-red-200 dark:border-red-500/30',
    ];
    $borderClass = $borderMap[$variantKey] ?? $borderMap['default'];
    $containerClass = $flush
        ? 'divide-y divide-gray-200 dark:divide-gray-800'
        : 'divide-y divide-gray-200 dark:divide-gray-800 ' . $radiusClass;
    if ($borderEnabled && !$flush) {
        $containerClass .= ' border ' . $borderClass;
    }
@endphp

<div {{ $attributes->merge(['class' => $containerClass]) }} data-accordion data-multiple="{{ $multiple ? 'true' : 'false' }}" data-variant="{{ $variantKey }}">
    {{ $slot }}
</div>
