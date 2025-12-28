@props([
    'variant' => 'solid',
    'color' => 'primary',
    'size' => 'md',
    'radius' => 'md',
    'disabled' => false,
    'loading' => false,
    'iconOnly' => false,
    'href' => null,
    'type' => 'button',
    'ariaLabel' => null,
    'class' => '',
])
@php
    $variantKey = strtolower((string) $variant);
    $colorKey = strtolower((string) $color);
    $sizeKey = strtolower((string) $size);
    $radiusKey = strtolower((string) $radius);
    $isDisabled = filter_var($disabled, FILTER_VALIDATE_BOOLEAN) || filter_var($loading, FILTER_VALIDATE_BOOLEAN);
    $iconOnlyEnabled = filter_var($iconOnly, FILTER_VALIDATE_BOOLEAN);

    $sizeMap = [
        'sm' => ['base' => 'px-3 py-1.5 text-xs', 'icon' => 'h-8 w-8 text-xs'],
        'md' => ['base' => 'px-5 py-2.5 text-sm', 'icon' => 'h-10 w-10 text-sm'],
        'lg' => ['base' => 'px-7 py-3 text-base', 'icon' => 'h-12 w-12 text-base'],
    ];
    $radiusMap = [
        'none' => 'rounded-none',
        'sm' => 'rounded-lg',
        'md' => 'rounded-xl',
        'lg' => 'rounded-2xl',
        'full' => 'rounded-full',
    ];
    $sizeClass = $sizeMap[$sizeKey] ?? $sizeMap['md'];
    $radiusClass = $radiusMap[$radiusKey] ?? $radiusMap['lg'];

    $variants = [
        'default' => [
            'solid' => 'bg-gray-200 text-gray-900 hover:bg-gray-300 active:bg-gray-400 dark:bg-gray-800 dark:text-gray-100 dark:hover:bg-gray-700 dark:active:bg-gray-600',
            'faded' => 'bg-gray-100 text-gray-700 hover:bg-gray-200 dark:bg-gray-900 dark:text-gray-200 dark:hover:bg-gray-800',
            'bordered' => 'border border-gray-300 text-gray-700 hover:bg-gray-100 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-800',
            'light' => 'bg-gray-50 text-gray-700 hover:bg-gray-100 dark:bg-gray-900/60 dark:text-gray-200 dark:hover:bg-gray-800',
            'flat' => 'text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-800',
            'ghost' => 'text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-800',
            'shadow' => 'bg-gray-900 text-white shadow-lg shadow-gray-900/20 hover:bg-gray-800 dark:bg-gray-200 dark:text-gray-900 dark:hover:bg-gray-100',
            'ring' => 'focus-visible:ring-gray-400',
        ],
        'primary' => [
            'solid' => 'bg-blue-600 text-white hover:bg-blue-700 active:bg-blue-800 dark:bg-blue-500 dark:hover:bg-blue-400 dark:active:bg-blue-600',
            'faded' => 'bg-blue-100 text-blue-700 hover:bg-blue-200 dark:bg-blue-950/40 dark:text-blue-200 dark:hover:bg-blue-900/60',
            'bordered' => 'border border-blue-600 text-blue-700 hover:bg-blue-50 dark:border-blue-500 dark:text-blue-200 dark:hover:bg-blue-900/40',
            'light' => 'bg-blue-50 text-blue-700 hover:bg-blue-100 dark:bg-blue-950/40 dark:text-blue-200 dark:hover:bg-blue-900/60',
            'flat' => 'text-blue-700 hover:bg-blue-50 dark:text-blue-200 dark:hover:bg-blue-900/40',
            'ghost' => 'text-blue-700 hover:bg-blue-50 dark:text-blue-200 dark:hover:bg-blue-900/40',
            'shadow' => 'bg-blue-600 text-white shadow-lg shadow-blue-600/30 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-400',
            'ring' => 'focus-visible:ring-blue-500',
        ],
        'secondary' => [
            'solid' => 'bg-purple-600 text-white hover:bg-purple-700 active:bg-purple-800 dark:bg-purple-500 dark:hover:bg-purple-400 dark:active:bg-purple-600',
            'faded' => 'bg-purple-100 text-purple-700 hover:bg-purple-200 dark:bg-purple-950/40 dark:text-purple-200 dark:hover:bg-purple-900/60',
            'bordered' => 'border border-purple-600 text-purple-700 hover:bg-purple-50 dark:border-purple-500 dark:text-purple-200 dark:hover:bg-purple-900/40',
            'light' => 'bg-purple-50 text-purple-700 hover:bg-purple-100 dark:bg-purple-950/40 dark:text-purple-200 dark:hover:bg-purple-900/60',
            'flat' => 'text-purple-700 hover:bg-purple-50 dark:text-purple-200 dark:hover:bg-purple-900/40',
            'ghost' => 'text-purple-700 hover:bg-purple-50 dark:text-purple-200 dark:hover:bg-purple-900/40',
            'shadow' => 'bg-purple-600 text-white shadow-lg shadow-purple-600/30 hover:bg-purple-700 dark:bg-purple-500 dark:hover:bg-purple-400',
            'ring' => 'focus-visible:ring-purple-500',
        ],
        'success' => [
            'solid' => 'bg-green-600 text-white hover:bg-green-700 active:bg-green-800 dark:bg-green-500 dark:hover:bg-green-400 dark:active:bg-green-600',
            'faded' => 'bg-green-100 text-green-700 hover:bg-green-200 dark:bg-green-950/40 dark:text-green-200 dark:hover:bg-green-900/60',
            'bordered' => 'border border-green-600 text-green-700 hover:bg-green-50 dark:border-green-500 dark:text-green-200 dark:hover:bg-green-900/40',
            'light' => 'bg-green-50 text-green-700 hover:bg-green-100 dark:bg-green-950/40 dark:text-green-200 dark:hover:bg-green-900/60',
            'flat' => 'text-green-700 hover:bg-green-50 dark:text-green-200 dark:hover:bg-green-900/40',
            'ghost' => 'text-green-700 hover:bg-green-50 dark:text-green-200 dark:hover:bg-green-900/40',
            'shadow' => 'bg-green-600 text-white shadow-lg shadow-green-600/30 hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-400',
            'ring' => 'focus-visible:ring-green-500',
        ],
        'warning' => [
            'solid' => 'bg-orange-500 text-white hover:bg-orange-600 active:bg-orange-700 dark:bg-orange-400 dark:hover:bg-orange-300 dark:active:bg-orange-500',
            'faded' => 'bg-orange-100 text-orange-700 hover:bg-orange-200 dark:bg-orange-950/40 dark:text-orange-200 dark:hover:bg-orange-900/60',
            'bordered' => 'border border-orange-500 text-orange-700 hover:bg-orange-50 dark:border-orange-400 dark:text-orange-200 dark:hover:bg-orange-900/40',
            'light' => 'bg-orange-50 text-orange-700 hover:bg-orange-100 dark:bg-orange-950/40 dark:text-orange-200 dark:hover:bg-orange-900/60',
            'flat' => 'text-orange-700 hover:bg-orange-50 dark:text-orange-200 dark:hover:bg-orange-900/40',
            'ghost' => 'text-orange-700 hover:bg-orange-50 dark:text-orange-200 dark:hover:bg-orange-900/40',
            'shadow' => 'bg-orange-500 text-white shadow-lg shadow-orange-500/30 hover:bg-orange-600 dark:bg-orange-400 dark:hover:bg-orange-300',
            'ring' => 'focus-visible:ring-orange-500',
        ],
        'danger' => [
            'solid' => 'bg-rose-600 text-white hover:bg-rose-700 active:bg-rose-800 dark:bg-rose-500 dark:hover:bg-rose-400 dark:active:bg-rose-600',
            'faded' => 'bg-rose-100 text-rose-700 hover:bg-rose-200 dark:bg-rose-950/40 dark:text-rose-200 dark:hover:bg-rose-900/60',
            'bordered' => 'border border-rose-600 text-rose-700 hover:bg-rose-50 dark:border-rose-500 dark:text-rose-200 dark:hover:bg-rose-900/40',
            'light' => 'bg-rose-50 text-rose-700 hover:bg-rose-100 dark:bg-rose-950/40 dark:text-rose-200 dark:hover:bg-rose-900/60',
            'flat' => 'text-rose-700 hover:bg-rose-50 dark:text-rose-200 dark:hover:bg-rose-900/40',
            'ghost' => 'text-rose-700 hover:bg-rose-50 dark:text-rose-200 dark:hover:bg-rose-900/40',
            'shadow' => 'bg-rose-600 text-white shadow-lg shadow-rose-600/30 hover:bg-rose-700 dark:bg-rose-500 dark:hover:bg-rose-400',
            'ring' => 'focus-visible:ring-rose-500',
        ],
    ];
    $palette = $variants[$colorKey] ?? $variants['primary'];
    $variantClass = $palette[$variantKey] ?? $palette['solid'];
    $ringClass = $palette['ring'];

    $attrClass = trim((string) $attributes->get('class', ''));
    $baseClass = trim(implode(' ', array_filter([
        'relative inline-flex items-center justify-center gap-2 font-semibold transition-all duration-150 overflow-hidden',
        'focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-offset-white dark:focus-visible:ring-offset-gray-950',
        'active:scale-95 active:shadow-inner',
        $ringClass,
        $iconOnlyEnabled ? $sizeClass['icon'] : $sizeClass['base'],
        $radiusClass,
        $variantClass,
        $isDisabled ? 'opacity-60 cursor-not-allowed pointer-events-none' : '',
        $class,
        $attrClass,
    ])));

    $attrBag = $attributes->except(['class', 'href', 'type', 'disabled', 'aria-label']);
    $ariaLabelFinal = $attributes->get('aria-label', $ariaLabel);
@endphp

@php
    $tag = $href ? 'a' : 'button';
@endphp

@if ($tag === 'a')
    <a
        href="{{ $isDisabled ? null : $href }}"
        {{ $attrBag->merge(['class' => $baseClass]) }}
        data-ripple
        @if ($isDisabled) aria-disabled="true" tabindex="-1" @endif
        @if ($ariaLabelFinal) aria-label="{{ $ariaLabelFinal }}" @endif
    >
        @if ($loading)
            <span class="inline-flex h-4 w-4 animate-spin items-center justify-center rounded-full border-2 border-current border-r-transparent"></span>
        @endif
        @isset($startContent)
            <span class="inline-flex items-center">{{ $startContent }}</span>
        @endisset
        @if (!$iconOnlyEnabled)
            <span>{{ $slot }}</span>
        @else
            {{ $slot }}
        @endif
        @isset($endContent)
            <span class="inline-flex items-center">{{ $endContent }}</span>
        @endisset
    </a>
@else
    <button
        type="{{ $type }}"
        {{ $attrBag->merge(['class' => $baseClass]) }}
        data-ripple
        @if ($isDisabled) disabled @endif
        @if ($ariaLabelFinal) aria-label="{{ $ariaLabelFinal }}" @endif
    >
        @if ($loading)
            <span class="inline-flex h-4 w-4 animate-spin items-center justify-center rounded-full border-2 border-current border-r-transparent"></span>
        @endif
        @isset($startContent)
            <span class="inline-flex items-center">{{ $startContent }}</span>
        @endisset
        @if (!$iconOnlyEnabled)
            <span>{{ $slot }}</span>
        @else
            {{ $slot }}
        @endif
        @isset($endContent)
            <span class="inline-flex items-center">{{ $endContent }}</span>
        @endisset
    </button>
@endif
