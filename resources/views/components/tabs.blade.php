@props([
    'variant' => 'solid',
    'size' => 'md',
    'radius' => 'xl',
    'color' => 'default',
    'disabled' => false,
    'vertical' => false,
    'defaultValue' => null,
])
@php
    $variantKey = strtolower((string) $variant);
    $sizeKey = strtolower((string) $size);
    $radiusKey = strtolower((string) $radius);
    $colorKey = strtolower((string) $color);
    $isDisabled = filter_var($disabled, FILTER_VALIDATE_BOOLEAN);
    $isVertical = filter_var($vertical, FILTER_VALIDATE_BOOLEAN);

    $radiusMap = [
        'none' => 'rounded-none',
        'sm' => 'rounded-sm',
        'md' => 'rounded-md',
        'lg' => 'rounded-lg',
        'xl' => 'rounded-xl',
        '2xl' => 'rounded-2xl',
        'full' => 'rounded-full',
    ];
    $radiusClass = $radiusMap[$radiusKey] ?? $radiusMap['xl'];

    $tabsId = 'tabs-' . \Illuminate\Support\Str::uuid();

    $listBase = $isVertical ? 'flex flex-col items-stretch' : 'inline-flex items-center';
    $listGap = $variantKey === 'underlined' ? 'gap-6' : 'gap-1';
    $listSizeMap = [
        'sm' => 'text-xs p-1',
        'md' => 'text-sm p-1.5',
        'lg' => 'text-base p-2',
    ];
    $listSizeClass = $listSizeMap[$sizeKey] ?? $listSizeMap['md'];
    if ($variantKey === 'underlined') {
        $listSizeClass = str_replace(['p-1', 'p-1.5', 'p-2'], '', $listSizeClass);
        $listSizeClass = trim($listSizeClass);
    }
    $listVariants = [
        'solid' => 'bg-gray-100 shadow-inner dark:bg-gray-900 dark:border dark:border-gray-800',
        'bordered' => 'border border-gray-200 bg-white shadow-sm dark:border-gray-800 dark:bg-gray-900/30',
        'light' => 'bg-transparent',
        'underlined' => 'border-b border-gray-200 pb-1 dark:border-gray-800',
    ];
    $listClass = trim(
        implode(
            ' ',
            array_filter([
                $listBase,
                $listGap,
                $variantKey === 'underlined' ? '' : $radiusClass,
                $listVariants[$variantKey] ?? $listVariants['solid'],
                $listSizeClass,
                $isDisabled ? 'opacity-60 pointer-events-none' : '',
            ]),
        ),
    );

    $wrapperClass = $isVertical ? 'flex gap-6 items-start' : 'grid gap-4';
    $panelWrapClass = $isVertical ? 'flex-1 min-w-0' : '';
    $parentDisabled = $isDisabled;
@endphp

<div {{ $attributes->merge(['class' => $wrapperClass]) }} data-tabs data-variant="{{ $variantKey }}"
    data-size="{{ $sizeKey }}" data-radius="{{ $radiusKey }}" data-color="{{ $colorKey }}"
    data-disabled="{{ $isDisabled ? 'true' : 'false' }}" data-orientation="{{ $isVertical ? 'vertical' : 'horizontal' }}"
    @if ($defaultValue) data-default="{{ $defaultValue }}" @endif data-tabs-id="{{ $tabsId }}">
    <div class="{{ $listClass }}" data-tabs-list>
        {{ $tabs ?? $slot }}
    </div>

    @isset($panels)
        <div class="{{ $panelWrapClass }}" data-tabs-panels>
            {{ $panels }}
        </div>
    @endisset
</div>
