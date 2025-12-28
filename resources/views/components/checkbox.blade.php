@props([
    'label' => null,
    'description' => null,
    'name' => null,
    'value' => null,
    'checked' => false,
    'disabled' => false,
    'indeterminate' => false,
    'size' => 'md',
    'color' => 'primary',
    'radius' => 'lg',
    'id' => null,
    'icon' => null,
    'iconType' => 'outline',
    'class' => '',
])
@php
    $sizeKey = strtolower((string) $size);
    $colorKey = strtolower((string) $color);
    $radiusKey = strtolower((string) $radius);

    $sizes = [
        'sm' => ['box' => 'h-5 w-5', 'text' => 'text-sm', 'icon' => 14],
        'md' => ['box' => 'h-6 w-6', 'text' => 'text-base', 'icon' => 16],
        'lg' => ['box' => 'h-7 w-7', 'text' => 'text-lg', 'icon' => 18],
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
            'checked' => 'peer-checked:bg-gray-300 peer-checked:border-gray-300 peer-checked:text-gray-900',
            'base' => 'border-gray-300 bg-white text-gray-900',
            'indeterminate' => 'bg-gray-300 border-gray-300 text-gray-900',
        ],
        'primary' => [
            'checked' => 'peer-checked:bg-blue-600 peer-checked:border-blue-600 peer-checked:text-white',
            'base' => 'border-gray-300 bg-white text-blue-600',
            'indeterminate' => 'bg-blue-600 border-blue-600 text-white',
        ],
        'secondary' => [
            'checked' => 'peer-checked:bg-purple-600 peer-checked:border-purple-600 peer-checked:text-white',
            'base' => 'border-gray-300 bg-white text-purple-600',
            'indeterminate' => 'bg-purple-600 border-purple-600 text-white',
        ],
        'success' => [
            'checked' => 'peer-checked:bg-green-600 peer-checked:border-green-600 peer-checked:text-white',
            'base' => 'border-gray-300 bg-white text-green-600',
            'indeterminate' => 'bg-green-600 border-green-600 text-white',
        ],
        'warning' => [
            'checked' => 'peer-checked:bg-orange-500 peer-checked:border-orange-500 peer-checked:text-white',
            'base' => 'border-gray-300 bg-white text-orange-600',
            'indeterminate' => 'bg-orange-500 border-orange-500 text-white',
        ],
        'danger' => [
            'checked' => 'peer-checked:bg-rose-600 peer-checked:border-rose-600 peer-checked:text-white',
            'base' => 'border-gray-300 bg-white text-rose-600',
            'indeterminate' => 'bg-rose-600 border-rose-600 text-white',
        ],
    ];

    $sizeClass = $sizes[$sizeKey] ?? $sizes['md'];
    $radiusClass = $radiusMap[$radiusKey] ?? $radiusMap['md'];
    $colorClass = $colors[$colorKey] ?? $colors['primary'];

    $isChecked = filter_var($checked, FILTER_VALIDATE_BOOLEAN);
    $isDisabled = filter_var($disabled, FILTER_VALIDATE_BOOLEAN);
    $isIndeterminate = filter_var($indeterminate, FILTER_VALIDATE_BOOLEAN);
    $showIndeterminate = $isIndeterminate && !$isChecked;

    $labelText = $label !== null ? (string) $label : trim((string) $slot);
    $inputId = $id ?: 'checkbox-' . \Illuminate\Support\Str::uuid();

    $wrapperClass = trim(
        implode(
            ' ',
            array_filter([
                'inline-flex items-center gap-3 select-none',
                $isDisabled ? 'opacity-60 cursor-not-allowed' : 'cursor-pointer',
                $class,
            ]),
        ),
    );
@endphp

<label {{ $attributes->merge(['class' => $wrapperClass]) }}>
    <input id="{{ $inputId }}" type="checkbox" class="peer sr-only"
        @if ($name) name="{{ $name }}" @endif
        @if ($value) value="{{ $value }}" @endif
        @if ($isChecked) checked @endif @if ($isDisabled) disabled @endif
        @if ($isIndeterminate) data-indeterminate="true" aria-checked="mixed" @endif />
    <span
        class="relative inline-flex items-center justify-center border transition-colors duration-150 {{ $sizeClass['box'] }} {{ $radiusClass }} {{ $colorClass['base'] }} {{ $colorClass['checked'] }} {{ $isDisabled ? 'cursor-not-allowed' : '' }} {{ $showIndeterminate ? $colorClass['indeterminate'] : '' }} peer-checked:[&_.checkbox-check]:opacity-100 peer-checked:[&_.checkbox-check]:scale-100 peer-checked:[&_.checkbox-check]:rotate-0 peer-checked:[&_.checkbox-indeterminate]:opacity-0 peer-checked:[&_.checkbox-indeterminate]:scale-50 peer-[data-indeterminate=true]:[&_.checkbox-indeterminate]:opacity-100 peer-[data-indeterminate=true]:[&_.checkbox-indeterminate]:scale-100 peer-[data-indeterminate=true]:[&_.checkbox-indeterminate]:rotate-0 peer-[data-indeterminate=true]:[&_.checkbox-check]:opacity-0 peer-[data-indeterminate=true]:[&_.checkbox-check]:scale-50"
        aria-hidden="true">
        <span
            class="checkbox-check flex items-center justify-center transition-all duration-200 ease-out opacity-0 scale-50 rotate-[-10deg]">
            @if (!empty($icon))
                <x-icon type="{{ $iconType }}" icon="{{ $icon }}" size="{{ $sizeClass['icon'] }}"></x-icon>
            @else
                <svg viewBox="0 0 24 24" class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="3"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12l4 4L19 6"></path>
                </svg>
            @endif
        </span>
        <span
            class="checkbox-indeterminate absolute inset-0 flex items-center justify-center transition-all duration-200 ease-out opacity-0 scale-50 rotate-[-10deg]">
            <svg viewBox="0 0 24 24" class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="3"
                stroke-linecap="round">
                <path d="M6 12h12"></path>
            </svg>
        </span>
    </span>
    <span class="grid gap-1">
        @if ($labelText !== '')
            <span class="leading-none {{ $sizeClass['text'] }}">{{ $labelText }}</span>
        @endif
        @if (!empty($description))
            <span class="text-sm text-gray-500 dark:text-gray-400">{{ $description }}</span>
        @endif
    </span>
</label>
