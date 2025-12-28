@props([
    'as' => 'p',
    'size' => 'base',
    'weight' => 'normal',
    'color' => 'default',
    'align' => 'left',
    'leading' => 'normal',
    'tracking' => 'normal',
    'transform' => 'none',
    'clamp' => null,
    'muted' => false,
    'class' => '',
])
@php
    $tag = in_array($as, ['h1','h2','h3','h4','h5','h6','p','span','div'], true) ? $as : 'p';

    $sizeMap = [
        'xs' => 'text-xs',
        'sm' => 'text-sm',
        'base' => 'text-base',
        'lg' => 'text-lg',
        'xl' => 'text-xl',
        '2xl' => 'text-2xl',
        '3xl' => 'text-3xl',
        '4xl' => 'text-4xl',
    ];
    $weightMap = [
        'thin' => 'font-thin',
        'light' => 'font-light',
        'normal' => 'font-normal',
        'medium' => 'font-medium',
        'semibold' => 'font-semibold',
        'bold' => 'font-bold',
        'black' => 'font-black',
    ];
    $colorMap = [
        'default' => 'text-gray-900 dark:text-gray-100',
        'muted' => 'text-gray-500 dark:text-gray-400',
        'primary' => 'text-blue-600 dark:text-blue-400',
        'secondary' => 'text-purple-600 dark:text-purple-400',
        'success' => 'text-green-600 dark:text-green-400',
        'warning' => 'text-orange-500 dark:text-orange-400',
        'danger' => 'text-rose-600 dark:text-rose-400',
        'white' => 'text-white',
        'black' => 'text-black',
    ];
    $alignMap = [
        'left' => 'text-left',
        'center' => 'text-center',
        'right' => 'text-right',
        'justify' => 'text-justify',
    ];
    $leadingMap = [
        'none' => 'leading-none',
        'tight' => 'leading-tight',
        'snug' => 'leading-snug',
        'normal' => 'leading-normal',
        'relaxed' => 'leading-relaxed',
        'loose' => 'leading-loose',
    ];
    $trackingMap = [
        'tighter' => 'tracking-tighter',
        'tight' => 'tracking-tight',
        'normal' => 'tracking-normal',
        'wide' => 'tracking-wide',
        'wider' => 'tracking-wider',
        'widest' => 'tracking-widest',
    ];
    $transformMap = [
        'none' => '',
        'uppercase' => 'uppercase',
        'lowercase' => 'lowercase',
        'capitalize' => 'capitalize',
    ];

    $sizeClass = $sizeMap[$size] ?? $sizeMap['base'];
    $weightClass = $weightMap[$weight] ?? $weightMap['normal'];
    $colorClass = $colorMap[$color] ?? $colorMap['default'];
    $alignClass = $alignMap[$align] ?? $alignMap['left'];
    $leadingClass = $leadingMap[$leading] ?? $leadingMap['normal'];
    $trackingClass = $trackingMap[$tracking] ?? $trackingMap['normal'];
    $transformClass = $transformMap[$transform] ?? '';
    $mutedClass = filter_var($muted, FILTER_VALIDATE_BOOLEAN) ? $colorMap['muted'] : '';
    $clampClass = $clamp ? "line-clamp-{$clamp}" : '';

    $attrClass = trim((string) $attributes->get('class', ''));
    $textClass = trim(implode(' ', array_filter([
        $sizeClass,
        $weightClass,
        $colorClass,
        $mutedClass,
        $alignClass,
        $leadingClass,
        $trackingClass,
        $transformClass,
        $clampClass,
        $class,
        $attrClass,
    ])));
@endphp

<{{ $tag }} {{ $attributes->except('class')->merge(['class' => $textClass]) }}>
    {{ $slot }}
</{{ $tag }}>
