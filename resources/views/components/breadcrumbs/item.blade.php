@props([
    'href' => null,
    'current' => false,
    'disabled' => false,
    'last' => false,
    'class' => '',
])
@aware([
    'variant',
    'size',
    'color',
    'separator',
    'separatorType',
    'separators',
    'disabledAll',
])
@php
    $variantKey = strtolower((string) ($variant ?? 'plain'));
    $sizeKey = strtolower((string) ($size ?? 'md'));
    $colorKey = strtolower((string) ($color ?? 'default'));
    $separatorValue = $separator ?? 'chevron-right';
    $separatorMode = $separatorType ?? 'icon';

    $isCurrent = filter_var($current, FILTER_VALIDATE_BOOLEAN);
    $isDisabled = filter_var($disabled, FILTER_VALIDATE_BOOLEAN) || filter_var($disabledAll ?? false, FILTER_VALIDATE_BOOLEAN);
    $isLast = filter_var($last, FILTER_VALIDATE_BOOLEAN);
    $useSeparators = $separators !== null ? filter_var($separators, FILTER_VALIDATE_BOOLEAN) : $variantKey !== 'pill';

    $sizes = [
        'sm' => ['text' => 'text-sm', 'gap' => 'gap-1.5', 'sep' => 14],
        'md' => ['text' => 'text-base', 'gap' => 'gap-2', 'sep' => 16],
        'lg' => ['text' => 'text-lg', 'gap' => 'gap-2.5', 'sep' => 18],
    ];
    $sizeClass = $sizes[$sizeKey] ?? $sizes['md'];

    $colors = [
        'default' => ['text' => 'text-gray-500 dark:text-gray-400', 'hover' => 'hover:text-gray-900 dark:hover:text-gray-100', 'current' => 'text-gray-900 dark:text-gray-100'],
        'blue' => ['text' => 'text-blue-600/80 dark:text-blue-300', 'hover' => 'hover:text-blue-700 dark:hover:text-blue-200', 'current' => 'text-blue-700 dark:text-blue-200'],
        'purple' => ['text' => 'text-purple-600/80 dark:text-purple-300', 'hover' => 'hover:text-purple-700 dark:hover:text-purple-200', 'current' => 'text-purple-700 dark:text-purple-200'],
        'green' => ['text' => 'text-green-600/80 dark:text-green-300', 'hover' => 'hover:text-green-700 dark:hover:text-green-200', 'current' => 'text-green-700 dark:text-green-200'],
        'orange' => ['text' => 'text-orange-600/80 dark:text-orange-300', 'hover' => 'hover:text-orange-700 dark:hover:text-orange-200', 'current' => 'text-orange-700 dark:text-orange-200'],
        'red' => ['text' => 'text-red-600/80 dark:text-red-300', 'hover' => 'hover:text-red-700 dark:hover:text-red-200', 'current' => 'text-red-700 dark:text-red-200'],
    ];
    $colorClass = $colors[$colorKey] ?? $colors['default'];

    $pillBase = 'rounded-full border border-gray-200 dark:border-gray-800 px-3 py-1.5';
    $pillCurrent = 'bg-gray-900 text-white dark:bg-white dark:text-gray-900';
    $pillMuted = 'bg-transparent';

    $attrClass = trim((string) $attributes->get('class', ''));
    $itemClass = trim(implode(' ', array_filter([
        'inline-flex items-center',
        $sizeClass['gap'],
        $sizeClass['text'],
        $variantKey === 'pill' ? $pillBase : '',
        $variantKey === 'pill' && $isCurrent ? $pillCurrent : '',
        $variantKey === 'pill' && !$isCurrent ? $pillMuted : '',
        $isCurrent ? $colorClass['current'] : $colorClass['text'],
        !$isCurrent && !$isDisabled ? $colorClass['hover'] : '',
        $isDisabled ? 'opacity-50 cursor-not-allowed' : '',
        $class,
        $attrClass,
    ])));

    $separatorIsText = $separatorMode === 'text' || in_array($separatorValue, ['/', '>', '›', '•'], true);
    $attrBag = $attributes->except('class');
@endphp

<li class="inline-flex items-center">
    @if ($href && !$isDisabled && !$isCurrent)
        <a href="{{ $href }}" {{ $attrBag->merge(['class' => $itemClass]) }}>
            {{ $slot }}
        </a>
    @else
        <span {{ $attrBag->merge(['class' => $itemClass]) }} @if($isCurrent) aria-current="page" @endif @if($isDisabled) aria-disabled="true" @endif>
            {{ $slot }}
        </span>
    @endif

    @if ($useSeparators && !$isLast)
        <span class="mx-2 text-gray-400 dark:text-gray-600">
            @if ($separatorIsText)
                {{ $separatorValue }}
            @else
                <x-icon type="outline" icon="{{ $separatorValue }}" size="{{ $sizeClass['sep'] }}"></x-icon>
            @endif
        </span>
    @endif
</li>
