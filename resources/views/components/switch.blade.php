@props([
    'label' => null,
    'description' => null,
    'name' => null,
    'checked' => false,
    'disabled' => false,
    'size' => 'md',
    'color' => 'primary',
    'id' => null,
    'startContent' => null,
    'endContent' => null,
    'thumbContent' => null,
    'class' => '',
    'labelClass' => '',
    'descriptionClass' => '',
    'trackClass' => '',
    'thumbClass' => '',
])
@php
    $sizeKey = strtolower((string) $size);
    $colorKey = strtolower((string) $color);

    $isChecked = filter_var($checked, FILTER_VALIDATE_BOOLEAN);
    $isDisabled = filter_var($disabled, FILTER_VALIDATE_BOOLEAN);

    $sizes = [
        'sm' => [
            'track' => 'w-10 h-6',
            'thumb' => 'h-4 w-4',
            'shift' => 'peer-checked:[&_.switch-thumb]:translate-x-4',
            'label' => 'text-sm',
        ],
        'md' => [
            'track' => 'w-12 h-7',
            'thumb' => 'h-5 w-5',
            'shift' => 'peer-checked:[&_.switch-thumb]:translate-x-5',
            'label' => 'text-base',
        ],
        'lg' => [
            'track' => 'w-14 h-8',
            'thumb' => 'h-6 w-6',
            'shift' => 'peer-checked:[&_.switch-thumb]:translate-x-6',
            'label' => 'text-lg',
        ],
    ];

    $colors = [
        'default' => [
            'track' => 'bg-gray-200 dark:bg-gray-800 peer-checked:bg-gray-900 dark:peer-checked:bg-gray-100',
            'ring' => 'peer-focus-visible:ring-gray-400/40',
            'icon' => 'text-gray-500 peer-checked:text-white dark:text-gray-400 dark:peer-checked:text-gray-900',
        ],
        'primary' => [
            'track' => 'bg-gray-200 dark:bg-gray-800 peer-checked:bg-blue-600',
            'ring' => 'peer-focus-visible:ring-blue-500/40',
            'icon' => 'text-gray-500 peer-checked:text-white dark:text-gray-400',
        ],
        'secondary' => [
            'track' => 'bg-gray-200 dark:bg-gray-800 peer-checked:bg-purple-600',
            'ring' => 'peer-focus-visible:ring-purple-500/40',
            'icon' => 'text-gray-500 peer-checked:text-white dark:text-gray-400',
        ],
        'success' => [
            'track' => 'bg-gray-200 dark:bg-gray-800 peer-checked:bg-green-600',
            'ring' => 'peer-focus-visible:ring-green-500/40',
            'icon' => 'text-gray-500 peer-checked:text-white dark:text-gray-400',
        ],
        'warning' => [
            'track' => 'bg-gray-200 dark:bg-gray-800 peer-checked:bg-orange-500',
            'ring' => 'peer-focus-visible:ring-orange-500/40',
            'icon' => 'text-gray-500 peer-checked:text-white dark:text-gray-400',
        ],
        'danger' => [
            'track' => 'bg-gray-200 dark:bg-gray-800 peer-checked:bg-rose-600',
            'ring' => 'peer-focus-visible:ring-rose-500/40',
            'icon' => 'text-gray-500 peer-checked:text-white dark:text-gray-400',
        ],
    ];

    $sizeClass = $sizes[$sizeKey] ?? $sizes['md'];
    $colorClass = $colors[$colorKey] ?? $colors['primary'];

    $labelText = $label !== null ? (string) $label : trim((string) $slot);
    $inputId = $id ?: 'switch-' . \Illuminate\Support\Str::uuid();

    $wrapperClass = trim(implode(' ', array_filter([
        'inline-flex items-center gap-3 select-none',
        $isDisabled ? 'opacity-60 cursor-not-allowed' : 'cursor-pointer',
        $class,
    ])));

    $trackBase = trim(implode(' ', array_filter([
        'relative inline-flex shrink-0 items-center rounded-full transition-colors duration-150',
        $sizeClass['track'],
        $sizeClass['shift'],
        $colorClass['track'],
        $colorClass['ring'],
        'peer-focus-visible:ring-2 peer-focus-visible:ring-offset-2 peer-focus-visible:ring-offset-white dark:peer-focus-visible:ring-offset-gray-950',
        $trackClass,
    ])));

    $thumbBase = trim(implode(' ', array_filter([
        'switch-thumb absolute left-1 top-1 rounded-full bg-white shadow-sm transition-transform duration-150',
        $sizeClass['thumb'],
        $thumbClass,
    ])));

    $labelBase = trim(implode(' ', array_filter([
        'text-gray-900 dark:text-gray-100',
        $sizeClass['label'],
        $labelClass,
    ])));

    $descBase = trim(implode(' ', array_filter([
        'text-sm text-gray-500 dark:text-gray-400',
        $descriptionClass,
    ])));

    $iconBase = trim(implode(' ', array_filter([
        'absolute text-[10px] transition-opacity duration-150',
        $colorClass['icon'],
    ])));
@endphp

<label {{ $attributes->merge(['class' => $wrapperClass]) }}>
    <input
        id="{{ $inputId }}"
        type="checkbox"
        class="peer sr-only"
        @if ($name) name="{{ $name }}" @endif
        @if ($isChecked) checked @endif
        @if ($isDisabled) disabled @endif
    />
    <span class="{{ $trackBase }}">
        @if (isset($startContent))
            <span class="{{ $iconBase }} left-2 opacity-100 peer-checked:opacity-0">
                {{ $startContent }}
            </span>
        @endif
        @if (isset($endContent))
            <span class="{{ $iconBase }} right-2 opacity-0 peer-checked:opacity-100">
                {{ $endContent }}
            </span>
        @endif
        <span class="{{ $thumbBase }}">
            @if (isset($thumbContent))
                <span class="flex h-full w-full items-center justify-center text-[10px]">
                    {{ $thumbContent }}
                </span>
            @endif
        </span>
    </span>
    <span class="grid gap-1">
        @if ($labelText !== '')
            <span class="{{ $labelBase }}">{{ $labelText }}</span>
        @endif
        @if (!empty($description))
            <span class="{{ $descBase }}">{{ $description }}</span>
        @endif
    </span>
</label>
