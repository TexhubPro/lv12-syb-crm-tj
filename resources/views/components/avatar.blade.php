@props([
    'src' => null,
    'alt' => null,
    'name' => null,
    'initials' => null,
    'size' => 'md',
    'radius' => 'full',
    'border' => false,
    'ring' => null,
    'tone' => 'gray',
    'disabled' => false,
    'class' => '',
])
@php
    $sizeMap = [
        'xs' => ['size' => 'h-6 w-6', 'text' => 'text-[10px]'],
        'sm' => ['size' => 'h-8 w-8', 'text' => 'text-xs'],
        'md' => ['size' => 'h-10 w-10', 'text' => 'text-sm'],
        'lg' => ['size' => 'h-12 w-12', 'text' => 'text-base'],
        'xl' => ['size' => 'h-16 w-16', 'text' => 'text-lg'],
        '2xl' => ['size' => 'h-20 w-20', 'text' => 'text-xl'],
    ];
    $radiusMap = [
        'none' => 'rounded-none',
        'sm' => 'rounded-sm',
        'md' => 'rounded-md',
        'lg' => 'rounded-lg',
        'full' => 'rounded-full',
    ];
    $toneMap = [
        'gray' => 'bg-gray-200 text-gray-700 dark:bg-gray-700 dark:text-gray-200',
        'blue' => 'bg-blue-100 text-blue-700 dark:bg-blue-500/20 dark:text-blue-200',
        'green' => 'bg-green-100 text-green-700 dark:bg-green-500/20 dark:text-green-200',
        'orange' => 'bg-orange-100 text-orange-700 dark:bg-orange-500/20 dark:text-orange-200',
        'purple' => 'bg-purple-100 text-purple-700 dark:bg-purple-500/20 dark:text-purple-200',
        'red' => 'bg-red-100 text-red-700 dark:bg-red-500/20 dark:text-red-200',
    ];
    $ringMap = [
        'gray' => 'ring-gray-300 dark:ring-gray-600',
        'blue' => 'ring-blue-500',
        'green' => 'ring-green-500',
        'orange' => 'ring-orange-500',
        'purple' => 'ring-purple-500',
        'red' => 'ring-red-500',
    ];

    $sizeKey = $sizeMap[$size] ?? $sizeMap['md'];
    $radiusClass = $radiusMap[$radius] ?? $radiusMap['full'];
    $toneClass = $toneMap[$tone] ?? $toneMap['gray'];
    $ringClass = $ringMap[$ring] ?? '';
    $defaultRing = 'ring-gray-300 dark:ring-gray-600';

    $showBorder = filter_var($border, FILTER_VALIDATE_BOOLEAN);
    $isDisabled = filter_var($disabled, FILTER_VALIDATE_BOOLEAN);

    $label = trim((string) ($alt ?? $name ?? 'Avatar'));
    $fallback = trim((string) ($initials ?? ''));
    if ($fallback === '' && $name) {
        $parts = preg_split('/\s+/', trim((string) $name));
        $letters = array_map(fn ($p) => mb_substr($p, 0, 1), array_filter($parts));
        $fallback = strtoupper(implode('', array_slice($letters, 0, 2)));
    }

    $rootClass = trim(implode(' ', array_filter([
        'inline-flex items-center justify-center overflow-hidden',
        $sizeKey['size'],
        $radiusClass,
        $toneClass,
        $showBorder ? 'ring-2 ring-offset-2 ring-offset-white dark:ring-offset-gray-950' : '',
        $showBorder ? ($ringClass ?: $defaultRing) : '',
        $isDisabled ? 'opacity-50 grayscale' : '',
        $class,
    ])));

    $ariaLabelFinal = $attributes->get('aria-label', $label);
    $roleFinal = $attributes->get('role', 'img');
    $attrBag = $attributes->except(['class', 'aria-label', 'role']);
@endphp

<span {{ $attrBag->merge(['class' => $rootClass]) }} aria-label="{{ $ariaLabelFinal }}" role="{{ $roleFinal }}">
    @if (!empty($src))
        <img src="{{ $src }}" alt="{{ $label }}" class="h-full w-full object-cover" />
    @elseif (!empty($fallback))
        <span class="font-medium {{ $sizeKey['text'] }}">{{ $fallback }}</span>
    @else
        <span class="font-medium {{ $sizeKey['text'] }}">?</span>
    @endif
</span>
