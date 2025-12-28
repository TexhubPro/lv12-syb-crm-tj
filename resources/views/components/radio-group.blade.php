@props([
    'label' => null,
    'description' => null,
    'error' => null,
    'orientation' => 'vertical',
    'required' => false,
    'disabled' => false,
    'itemsClass' => '',
    'labelClass' => '',
    'descriptionClass' => '',
    'errorClass' => '',
    'class' => '',
])
@php
    $orientationKey = strtolower((string) $orientation);
    $isDisabled = filter_var($disabled, FILTER_VALIDATE_BOOLEAN);
    $isRequired = filter_var($required, FILTER_VALIDATE_BOOLEAN);

    $labelText = $label !== null ? (string) $label : '';
    $hasLabel = $labelText !== '' || isset($labelContent);

    $groupClass = $orientationKey === 'horizontal'
        ? 'flex flex-wrap items-center gap-4'
        : 'grid gap-3';

    $baseClass = trim(implode(' ', array_filter([
        'grid gap-3',
        $isDisabled ? 'opacity-60 pointer-events-none' : '',
        $class,
    ])));

    $labelBase = trim(implode(' ', array_filter([
        'text-sm text-gray-500 dark:text-gray-400',
        $labelClass,
    ])));

    $descBase = trim(implode(' ', array_filter([
        'text-sm text-gray-500 dark:text-gray-400',
        $descriptionClass,
    ])));

    $errorBase = trim(implode(' ', array_filter([
        'text-sm text-rose-600 dark:text-rose-400',
        $errorClass,
    ])));
@endphp

<div {{ $attributes->merge(['class' => $baseClass]) }} data-radio-group>
    @if ($hasLabel)
        <div class="flex items-center gap-1">
            @if (isset($labelContent))
                <span class="{{ $labelBase }}">{{ $labelContent }}</span>
            @else
                <span class="{{ $labelBase }}">{{ $labelText }}</span>
            @endif
            @if ($isRequired)
                <span class="text-rose-500">*</span>
            @endif
        </div>
    @endif

    @if (!empty($description))
        <p class="{{ $descBase }}">{{ $description }}</p>
    @endif

    <div class="{{ $groupClass }} {{ $itemsClass }}">
        {{ $slot }}
    </div>

    @if (!empty($error))
        <p class="{{ $errorBase }}">{{ $error }}</p>
    @endif
</div>
