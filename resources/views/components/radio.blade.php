@props([
    'label' => null,
    'description' => null,
    'name' => null,
    'value' => null,
    'checked' => false,
    'disabled' => false,
    'size' => 'md',
    'color' => 'primary',
    'id' => null,
    'invalid' => false,
    'class' => '',
    'labelClass' => '',
    'descriptionClass' => '',
])
@php
    $sizeKey = strtolower((string) $size);
    $colorKey = strtolower((string) $color);
    $isChecked = filter_var($checked, FILTER_VALIDATE_BOOLEAN);
    $isDisabled = filter_var($disabled, FILTER_VALIDATE_BOOLEAN);
    $isInvalid = filter_var($invalid, FILTER_VALIDATE_BOOLEAN);

    $sizes = [
        'sm' => ['outer' => 'h-4 w-4', 'dot' => 'h-2 w-2', 'text' => 'text-sm'],
        'md' => ['outer' => 'h-5 w-5', 'dot' => 'h-2.5 w-2.5', 'text' => 'text-base'],
        'lg' => ['outer' => 'h-6 w-6', 'dot' => 'h-3 w-3', 'text' => 'text-lg'],
    ];

    $colors = [
        'default' => [
            'base' => 'border-gray-300 text-gray-400',
            'checked' => 'peer-checked:border-gray-900 peer-checked:text-gray-900',
            'ring' => 'peer-focus-visible:ring-gray-400/40',
        ],
        'primary' => [
            'base' => 'border-gray-300 text-gray-400',
            'checked' => 'peer-checked:border-blue-600 peer-checked:text-blue-600',
            'ring' => 'peer-focus-visible:ring-blue-500/40',
        ],
        'secondary' => [
            'base' => 'border-gray-300 text-gray-400',
            'checked' => 'peer-checked:border-purple-600 peer-checked:text-purple-600',
            'ring' => 'peer-focus-visible:ring-purple-500/40',
        ],
        'success' => [
            'base' => 'border-gray-300 text-gray-400',
            'checked' => 'peer-checked:border-green-600 peer-checked:text-green-600',
            'ring' => 'peer-focus-visible:ring-green-500/40',
        ],
        'warning' => [
            'base' => 'border-gray-300 text-gray-400',
            'checked' => 'peer-checked:border-orange-500 peer-checked:text-orange-500',
            'ring' => 'peer-focus-visible:ring-orange-500/40',
        ],
        'danger' => [
            'base' => 'border-gray-300 text-gray-400',
            'checked' => 'peer-checked:border-rose-600 peer-checked:text-rose-600',
            'ring' => 'peer-focus-visible:ring-rose-500/40',
        ],
    ];

    $sizeClass = $sizes[$sizeKey] ?? $sizes['md'];
    $colorClass = $colors[$colorKey] ?? $colors['primary'];

    $labelText = $label !== null ? (string) $label : trim((string) $slot);
    $inputId = $id ?: 'radio-' . \Illuminate\Support\Str::uuid();

    $wrapperClass = trim(implode(' ', array_filter([
        'inline-flex items-center gap-3 select-none',
        $isDisabled ? 'opacity-60 cursor-not-allowed' : 'cursor-pointer',
        $class,
    ])));

    $indicatorClass = trim(implode(' ', array_filter([
        'relative inline-flex items-center justify-center rounded-full border-2 transition-all duration-150',
        $sizeClass['outer'],
        $colorClass['base'],
        $colorClass['checked'],
        $colorClass['ring'],
        'peer-focus-visible:ring-2 peer-focus-visible:ring-offset-2 peer-focus-visible:ring-offset-white dark:peer-focus-visible:ring-offset-gray-950',
        'peer-checked:[&_.radio-dot]:opacity-100 peer-checked:[&_.radio-dot]:scale-100',
        $isInvalid ? 'border-rose-600 text-rose-600 peer-checked:border-rose-600 peer-checked:text-rose-600 peer-focus-visible:ring-rose-500/40' : '',
    ])));

    $labelBase = trim(implode(' ', array_filter([
        'text-gray-900 dark:text-gray-100',
        $sizeClass['text'],
        $labelClass,
    ])));

    $descBase = trim(implode(' ', array_filter([
        'text-sm text-gray-500 dark:text-gray-400',
        $descriptionClass,
    ])));
@endphp

<label {{ $attributes->merge(['class' => $wrapperClass]) }}>
    <input
        id="{{ $inputId }}"
        type="radio"
        class="peer sr-only"
        @if ($name) name="{{ $name }}" @endif
        @if ($value !== null) value="{{ $value }}" @endif
        @if ($isChecked) checked @endif
        @if ($isDisabled) disabled @endif
    />
    <span class="{{ $indicatorClass }}" aria-hidden="true">
        <span class="radio-dot {{ $sizeClass['dot'] }} rounded-full bg-current opacity-0 scale-75 transition-all duration-200 ease-out"></span>
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
