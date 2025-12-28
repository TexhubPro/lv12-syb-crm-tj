@props([
    'variant' => 'default',
    'radius' => '2xl',
    'border' => false,
    'icon' => true,
    'title' => false,
    'close' => false,
])
@php
    $variantKey = strtolower((string) $variant);
    $radiusKey = strtolower((string) $radius);
    $borderEnabled = filter_var($border, FILTER_VALIDATE_BOOLEAN);
    $iconEnabled = filter_var($icon, FILTER_VALIDATE_BOOLEAN);
    $titleText = is_bool($title) ? '' : trim((string) $title);
    $hasTitle = $title !== false && $titleText !== '';
    $closeEnabled = filter_var($close, FILTER_VALIDATE_BOOLEAN);
    $radiusMap = [
        'none' => 'rounded-none',
        'sm' => 'rounded-sm',
        'md' => 'rounded-md',
        'lg' => 'rounded-lg',
        'full' => 'rounded-full',
        '2xl' => 'rounded-2xl',
        'xl' => 'rounded-xl',
    ];
    $radiusClass = $radiusMap[$radiusKey] ?? $radiusMap['2xl'];
    $variants = [
        'default' => [
            'wrapper' =>
                'bg-gray-100 py-3 px-4 text-gray-900 flex gap-3 w-full items-center dark:bg-gray-900 dark:text-white',
            'icon_wrap' =>
                'p-1.5 bg-gray-200 rounded-full border border-gray-300 dark:bg-gray-700 dark:border-gray-500',
            'icon' => 'info-circle',
            'text' => 'text-base font-light text-gray-800 dark:text-white',
            'border' => 'border-gray-300 dark:border-white/60',
            'close' => 'text-gray-800 dark:text-white',
        ],
        'primary' => [
            'wrapper' => 'bg-blue-50 py-3 px-4 flex gap-3 w-full items-center dark:bg-blue-500/10',
            'icon_wrap' =>
                'p-1.5 bg-blue-100 rounded-full text-blue-600 border border-blue-200 dark:bg-blue-500/40 dark:text-blue-400 dark:border-blue-500/50',
            'icon' => 'info-circle',
            'text' => 'text-base font-light text-blue-700 dark:text-blue-400',
            'border' => 'border-blue-300 dark:border-blue-400',
            'close' => 'text-blue-700 dark:text-blue-400',
        ],
        'secondary' => [
            'wrapper' => 'bg-purple-50 py-3 px-4 flex gap-3 w-full items-center dark:bg-purple-500/10',
            'icon_wrap' =>
                'p-1.5 bg-purple-100 rounded-full text-purple-600 border border-purple-200 dark:bg-purple-500/40 dark:text-purple-400 dark:border-purple-500/50',
            'icon' => 'info-circle',
            'text' => 'text-base font-light text-purple-700 dark:text-purple-400',
            'border' => 'border-purple-300 dark:border-purple-400',
            'close' => 'text-purple-700 dark:text-purple-400',
        ],
        'success' => [
            'wrapper' => 'bg-green-50 py-3 px-4 flex gap-3 w-full items-center dark:bg-green-500/10',
            'icon_wrap' =>
                'p-1.5 bg-green-100 rounded-full text-green-600 border border-green-200 dark:bg-green-500/40 dark:text-green-400 dark:border-green-500/50',
            'icon' => 'rosette-discount-check',
            'text' => 'text-base font-light text-green-700 dark:text-green-400',
            'border' => 'border-green-300 dark:border-green-400',
            'close' => 'text-green-700 dark:text-green-400',
        ],
        'warning' => [
            'wrapper' => 'bg-orange-50 py-3 px-4 flex gap-3 w-full items-center dark:bg-orange-500/10',
            'icon_wrap' =>
                'p-1.5 bg-orange-100 rounded-full text-orange-600 border border-orange-200 dark:bg-orange-500/40 dark:text-orange-400 dark:border-orange-500/50',
            'icon' => 'alert-square-rounded',
            'text' => 'text-base font-light text-orange-700 dark:text-orange-400',
            'border' => 'border-orange-300 dark:border-orange-400',
            'close' => 'text-orange-700 dark:text-orange-400',
        ],
        'danger' => [
            'wrapper' => 'bg-red-50 py-3 px-4 flex gap-3 w-full items-center dark:bg-red-500/10',
            'icon_wrap' =>
                'p-1.5 bg-red-100 rounded-full text-red-600 border border-red-200 dark:bg-red-500/40 dark:text-red-400 dark:border-red-500/50',
            'icon' => 'xbox-x',
            'text' => 'text-base font-light text-red-700 dark:text-red-400',
            'border' => 'border-red-300 dark:border-red-400',
            'close' => 'text-red-700 dark:text-red-400',
        ],
    ];
    $current = $variants[$variantKey] ?? $variants['default'];
    $wrapperClass = $current['wrapper'] . ' ' . $radiusClass;
    if ($borderEnabled) {
        $wrapperClass .= ' border ' . $current['border'];
    }
@endphp

<div data-alert {{ $attributes->merge(['class' => $wrapperClass]) }}>
    @if ($iconEnabled)
        <div class="{{ $current['icon_wrap'] }}">
            <x-icon type="filled" icon="{{ $current['icon'] }}" size="24"></x-icon>
        </div>
    @endif

    <div class="grid gap-0.5 flex-1">
        @if ($hasTitle)
            <span class="{{ $current['text'] }} font-semibold">
                {{ $titleText }}
            </span>
        @endif
        <span class="{{ $current['text'] }}">
            {{ $slot }}
        </span>
    </div>
    @if ($closeEnabled)
        <button type="button" aria-label="Close"
            class="ml-auto shrink-0 {{ $current['close'] }} opacity-80 hover:opacity-100" data-alert-close>
            <x-icon type="outline" icon="x" size="18"></x-icon>
        </button>
    @endif
</div>
