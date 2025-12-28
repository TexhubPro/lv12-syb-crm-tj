@props([
    'text' => null,
    'value' => null,
    'variant' => 'primary',
    'size' => 'md',
    'dot' => false,
    'pill' => true,
    'border' => false,
    'placement' => 'top-right',
    'inline' => false,
    'class' => '',
])
@php
    $sizeMap = [
        'xs' => ['base' => 'h-4 min-w-4 px-1.5 text-[10px]', 'dot' => 'h-2 w-2'],
        'sm' => ['base' => 'h-5 min-w-5 px-2 text-xs', 'dot' => 'h-2.5 w-2.5'],
        'md' => ['base' => 'h-6 min-w-6 px-2.5 text-sm', 'dot' => 'h-3 w-3'],
        'lg' => ['base' => 'h-7 min-w-7 px-3 text-sm', 'dot' => 'h-3.5 w-3.5'],
    ];
    $variantMap = [
        'default' => 'bg-gray-200 text-gray-800 dark:bg-gray-700 dark:text-gray-100',
        'primary' => 'bg-blue-600 text-white',
        'secondary' => 'bg-purple-600 text-white',
        'success' => 'bg-green-600 text-white',
        'warning' => 'bg-orange-500 text-white',
        'danger' => 'bg-red-600 text-white',
        'pink' => 'bg-pink-600 text-white',
    ];
    $sizeKey = $sizeMap[$size] ?? $sizeMap['md'];
    $variantClass = $variantMap[$variant] ?? $variantMap['primary'];
    $showBorder = filter_var($border, FILTER_VALIDATE_BOOLEAN);
    $showDot = filter_var($dot, FILTER_VALIDATE_BOOLEAN);

    $textValue = $text ?? $value;
    $content = $showDot ? '' : trim((string) ($textValue ?? ''));

    $placementMap = [
        'top-right' => 'absolute top-0 right-0',
        'top-left' => 'absolute top-0 left-0',
        'bottom-right' => 'absolute bottom-0 right-0',
        'bottom-left' => 'absolute bottom-0 left-0',
    ];
    $positionClass = $inline ? '' : ($placementMap[$placement] ?? $placementMap['top-right']);

    $translateX = 'translate-x-0';
    $translateY = 'translate-y-0';
    if (!$inline) {
        $right = str_contains($positionClass, 'right-0');
        $left = str_contains($positionClass, 'left-0');
        $top = str_contains($positionClass, 'top-0');
        $bottom = str_contains($positionClass, 'bottom-0');
        $translateX = $right ? 'translate-x-1/2' : ($left ? '-translate-x-1/2' : 'translate-x-0');
        $translateY = $top ? '-translate-y-1/2' : ($bottom ? 'translate-y-1/2' : 'translate-y-0');
    }

    $shapeClass = $pill ? 'rounded-full' : 'rounded-md';
    $borderClass = $showBorder ? 'ring-2 ring-white dark:ring-gray-950' : '';
    $sizeClass = $showDot ? $sizeKey['dot'] : $sizeKey['base'];

    $rootClass = trim(implode(' ', array_filter([
        'inline-flex items-center justify-center font-semibold leading-none',
        $positionClass,
        $inline ? '' : 'transform',
        $inline ? '' : $translateX,
        $inline ? '' : $translateY,
        $sizeClass,
        $shapeClass,
        $variantClass,
        $borderClass,
        $class,
    ])));

    $ariaLabelFinal = $attributes->get('aria-label', $content !== '' ? $content : 'Badge');
    $attrBag = $attributes->except(['class', 'aria-label']);
@endphp

<span {{ $attrBag->merge(['class' => $rootClass]) }} aria-label="{{ $ariaLabelFinal }}">
    @if (!$showDot)
        {{ $content }}
    @endif
</span>
