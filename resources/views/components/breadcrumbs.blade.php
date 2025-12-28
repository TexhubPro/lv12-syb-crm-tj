@props([
    'variant' => 'plain',
    'size' => 'md',
    'radius' => 'lg',
    'color' => 'default',
    'separator' => 'chevron-right',
    'separatorType' => 'icon',
    'disabled' => false,
    'disabledAll' => null,
    'separators' => null,
    'class' => '',
])
@php
    $variantKey = strtolower((string) $variant);
    $sizeKey = strtolower((string) $size);
    $radiusMap = [
        'none' => 'rounded-none',
        'sm' => 'rounded-sm',
        'md' => 'rounded-md',
        'lg' => 'rounded-lg',
        '2xl' => 'rounded-2xl',
        'full' => 'rounded-full',
    ];
    $radiusClass = $radiusMap[$radius] ?? $radiusMap['lg'];
    $disabledAll = $disabledAll ?? $disabled;
    $isDisabled = filter_var($disabledAll, FILTER_VALIDATE_BOOLEAN);

    $variants = [
        'plain' => 'bg-transparent',
        'soft' => 'bg-gray-100 dark:bg-gray-900/60',
        'outline' => 'bg-transparent border border-gray-200 dark:border-gray-800',
        'pill' => 'bg-transparent',
    ];
    $variantClass = $variants[$variantKey] ?? $variants['plain'];

    $paddingClass = $variantKey === 'plain'
        ? ''
        : 'px-4 py-2';

    $useSeparators = $separators === null ? $variantKey !== 'pill' : filter_var($separators, FILTER_VALIDATE_BOOLEAN);

    $containerClass = trim(implode(' ', array_filter([
        'inline-flex items-center',
        $variantClass,
        $paddingClass,
        $variantKey !== 'plain' ? $radiusClass : '',
        $class,
    ])));

    $listClass = $variantKey === 'pill'
        ? 'flex flex-wrap items-center gap-2'
        : 'flex flex-wrap items-center';

    $attrBag = $attributes->except('class');
@endphp

<nav {{ $attrBag->merge(['class' => $containerClass]) }} aria-label="Breadcrumb">
    <div class="flex items-center gap-2">
        @isset($startContent)
            <div class="flex items-center gap-2">
                {{ $startContent }}
            </div>
        @endisset
        <ol class="{{ $listClass }}">
            {{ $slot }}
        </ol>
        @isset($endContent)
            <div class="flex items-center gap-2">
                {{ $endContent }}
            </div>
        @endisset
    </div>
</nav>
