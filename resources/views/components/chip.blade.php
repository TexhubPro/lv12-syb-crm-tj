@props([
    'variant' => 'solid',
    'color' => 'default',
    'size' => 'md',
    'radius' => 'full',
    'disabled' => false,
    'dot' => false,
    'class' => '',
])
@php
    $variantKey = strtolower((string) $variant);
    $colorKey = strtolower((string) $color);
    $sizeKey = strtolower((string) $size);
    $radiusKey = strtolower((string) $radius);
    $isDisabled = filter_var($disabled, FILTER_VALIDATE_BOOLEAN);
    $dotEnabled = filter_var($dot, FILTER_VALIDATE_BOOLEAN);

    $sizes = [
        'sm' => ['base' => 'py-1 text-sm', 'px' => 'px-3', 'padStart' => 'pl-1.5', 'padEnd' => 'pr-1.5', 'dot' => 'h-1.5 w-1.5'],
        'md' => ['base' => 'py-1.5 text-base', 'px' => 'px-4', 'padStart' => 'pl-2', 'padEnd' => 'pr-2', 'dot' => 'h-2 w-2'],
        'lg' => ['base' => 'py-2 text-lg', 'px' => 'px-5', 'padStart' => 'pl-2.5', 'padEnd' => 'pr-2.5', 'dot' => 'h-2.5 w-2.5'],
    ];
    $radiusMap = [
        'none' => 'rounded-none',
        'sm' => 'rounded-sm',
        'md' => 'rounded-md',
        'lg' => 'rounded-lg',
        'full' => 'rounded-full',
    ];
    $colors = [
        'default' => [
            'solid' => 'bg-gray-200 text-gray-900',
            'bordered' => 'border border-gray-300 text-gray-700',
            'light' => 'bg-gray-100 text-gray-700',
            'flat' => 'bg-gray-100 text-gray-700',
            'faded' => 'bg-white text-gray-700 border border-gray-200',
            'shadow' => 'bg-gray-900 text-white shadow-lg shadow-gray-900/15',
        ],
        'primary' => [
            'solid' => 'bg-blue-600 text-white',
            'bordered' => 'border border-blue-600 text-blue-700',
            'light' => 'bg-blue-50 text-blue-700',
            'flat' => 'bg-blue-100 text-blue-700',
            'faded' => 'bg-white text-blue-700 border border-blue-200',
            'shadow' => 'bg-blue-600 text-white shadow-lg shadow-blue-600/25',
        ],
        'secondary' => [
            'solid' => 'bg-purple-600 text-white',
            'bordered' => 'border border-purple-600 text-purple-700',
            'light' => 'bg-purple-50 text-purple-700',
            'flat' => 'bg-purple-100 text-purple-700',
            'faded' => 'bg-white text-purple-700 border border-purple-200',
            'shadow' => 'bg-purple-600 text-white shadow-lg shadow-purple-600/25',
        ],
        'success' => [
            'solid' => 'bg-green-600 text-white',
            'bordered' => 'border border-green-600 text-green-700',
            'light' => 'bg-green-50 text-green-700',
            'flat' => 'bg-green-100 text-green-700',
            'faded' => 'bg-white text-green-700 border border-green-200',
            'shadow' => 'bg-green-600 text-white shadow-lg shadow-green-600/25',
        ],
        'warning' => [
            'solid' => 'bg-orange-500 text-white',
            'bordered' => 'border border-orange-500 text-orange-700',
            'light' => 'bg-orange-50 text-orange-700',
            'flat' => 'bg-orange-100 text-orange-700',
            'faded' => 'bg-white text-orange-700 border border-orange-200',
            'shadow' => 'bg-orange-500 text-white shadow-lg shadow-orange-500/25',
        ],
        'danger' => [
            'solid' => 'bg-rose-600 text-white',
            'bordered' => 'border border-rose-600 text-rose-700',
            'light' => 'bg-rose-50 text-rose-700',
            'flat' => 'bg-rose-100 text-rose-700',
            'faded' => 'bg-white text-rose-700 border border-rose-200',
            'shadow' => 'bg-rose-600 text-white shadow-lg shadow-rose-600/25',
        ],
    ];

    $sizeClass = $sizes[$sizeKey] ?? $sizes['md'];
    $radiusClass = $radiusMap[$radiusKey] ?? $radiusMap['full'];
    $palette = $colors[$colorKey] ?? $colors['default'];
    $variantClass = $palette[$variantKey] ?? $palette['solid'];

    $hasStart = isset($startContent);
    $hasEnd = isset($endContent);
    $paddingClass = trim(implode(' ', array_filter([
        $sizeClass['px'],
        $hasStart ? $sizeClass['padStart'] : '',
        $hasEnd ? $sizeClass['padEnd'] : '',
    ])));

    $baseClass = trim(
        implode(
            ' ',
            array_filter([
                'inline-flex items-center gap-2 font-medium',
                $sizeClass['base'],
                $paddingClass,
                $radiusClass,
                $variantClass,
                $isDisabled ? 'opacity-60 cursor-not-allowed' : '',
                $class,
            ]),
        ),
    );
@endphp

<span {{ $attributes->merge(['class' => $baseClass]) }}>
    @if ($dotEnabled)
        <span class="{{ $sizeClass['dot'] }} rounded-full bg-current"></span>
    @endif
    @isset($startContent)
        <span class="inline-flex items-center">{{ $startContent }}</span>
    @endisset
    <span>{{ $slot }}</span>
    @isset($endContent)
        <span class="inline-flex items-center">{{ $endContent }}</span>
    @endisset
</span>
