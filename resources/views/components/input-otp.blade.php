@props([
    'length' => 4,
    'value' => '',
    'name' => null,
    'label' => null,
    'description' => null,
    'errorMessage' => null,
    'invalid' => false,
    'required' => false,
    'disabled' => false,
    'readOnly' => false,
    'size' => 'md',
    'radius' => 'md',
    'variant' => 'flat',
    'color' => 'default',
    'type' => 'text',
    'baseClass' => 'focus:scale-110',
    'wrapperClass' => '',
    'segmentWrapperClass' => '',
    'segmentClass' => '',
    'labelClass' => '',
    'descriptionClass' => '',
    'errorClass' => '',
])
@php
    $lengthValue = max(1, (int) $length);
    $sizeKey = strtolower((string) $size);
    $radiusKey = strtolower((string) $radius);
    $variantKey = strtolower((string) $variant);
    $colorKey = strtolower((string) $color);
    $typeKey = strtolower((string) $type);

    $isInvalid = filter_var($invalid, FILTER_VALIDATE_BOOLEAN);
    $isRequired = filter_var($required, FILTER_VALIDATE_BOOLEAN);
    $isDisabled = filter_var($disabled, FILTER_VALIDATE_BOOLEAN);
    $isReadOnly = filter_var($readOnly, FILTER_VALIDATE_BOOLEAN);

    $sizes = [
        'sm' => ['box' => 'h-8 w-8 text-xs', 'label' => 'text-sm', 'hint' => 'text-xs'],
        'md' => ['box' => 'h-10 w-10 text-sm', 'label' => 'text-base', 'hint' => 'text-sm'],
        'lg' => ['box' => 'h-12 w-12 text-base', 'label' => 'text-lg', 'hint' => 'text-base'],
    ];
    $radiusMap = [
        'none' => 'rounded-none',
        'sm' => 'rounded-sm',
        'md' => 'rounded-md',
        'lg' => 'rounded-lg',
        'full' => 'rounded-full',
    ];
    $variants = [
        'flat' => 'border-2 border-transparent',
        'bordered' => 'bg-transparent border-2',
        'underlined' => 'bg-transparent border-b-2 rounded-none',
        'faded' => 'border-2 border-transparent',
    ];
    $colors = [
        'default' => [
            'text' => 'text-gray-900 placeholder:text-gray-400',
            'bg' => 'bg-gray-100',
            'flat' => 'bg-gray-50',
            'border' => 'border-blue-500',
            'focus' => 'focus:border-blue-500 focus:outline focus:outline-[1.5px] focus:outline-blue-500',
            'dark' => 'dark:bg-white/5 dark:text-gray-100 dark:placeholder:text-gray-500 dark:border-white/15',
        ],
        'primary' => [
            'text' => 'text-blue-700 placeholder:text-blue-400',
            'bg' => 'bg-blue-100',
            'flat' => 'bg-blue-50',
            'border' => 'border-blue-200',
            'focus' => 'focus:border-blue-500 focus:outline focus:outline-[1.5px] focus:outline-blue-400/40',
            'dark' => 'dark:bg-blue-950/40 dark:text-blue-200 dark:placeholder:text-blue-300 dark:border-blue-700/60',
        ],
        'secondary' => [
            'text' => 'text-purple-700 placeholder:text-purple-400',
            'bg' => 'bg-purple-100',
            'flat' => 'bg-purple-50',
            'border' => 'border-purple-200',
            'focus' => 'focus:border-purple-500 focus:outline focus:outline-[1.5px] focus:outline-purple-400/40',
            'dark' =>
                'dark:bg-purple-950/40 dark:text-purple-200 dark:placeholder:text-purple-300 dark:border-purple-700/60',
        ],
        'success' => [
            'text' => 'text-green-700 placeholder:text-green-400',
            'bg' => 'bg-green-100',
            'flat' => 'bg-green-50',
            'border' => 'border-green-200',
            'focus' => 'focus:border-green-500 focus:outline focus:outline-[1.5px] focus:outline-green-400/40',
            'dark' =>
                'dark:bg-green-950/40 dark:text-green-200 dark:placeholder:text-green-300 dark:border-green-700/60',
        ],
        'warning' => [
            'text' => 'text-orange-700 placeholder:text-orange-400',
            'bg' => 'bg-orange-100',
            'flat' => 'bg-orange-50',
            'border' => 'border-orange-200',
            'focus' => 'focus:border-orange-500 focus:outline focus:outline-[1.5px] focus:outline-orange-400/40',
            'dark' =>
                'dark:bg-orange-950/40 dark:text-orange-200 dark:placeholder:text-orange-300 dark:border-orange-700/60',
        ],
        'danger' => [
            'text' => 'text-rose-700 placeholder:text-rose-400',
            'bg' => 'bg-rose-100',
            'flat' => 'bg-rose-50',
            'border' => 'border-rose-200',
            'focus' => 'focus:border-rose-500 focus:outline focus:outline-[1.5px] focus:outline-rose-400/40',
            'dark' => 'dark:bg-rose-950/40 dark:text-rose-200 dark:placeholder:text-rose-300 dark:border-rose-700/60',
        ],
    ];

    $sizeClass = $sizes[$sizeKey] ?? $sizes['md'];
    $radiusClass = $radiusMap[$radiusKey] ?? $radiusMap['md'];
    $variantClass = $variants[$variantKey] ?? $variants['flat'];
    $palette = $colors[$colorKey] ?? $colors['default'];

    $characters = preg_split('//u', (string) $value, -1, PREG_SPLIT_NO_EMPTY) ?: [];
    $labelText = $label !== null ? (string) $label : '';

    $attrClass = trim((string) $attributes->get('class', ''));
    $baseWrapper = trim(implode(' ', array_filter(['grid gap-2', $wrapperClass, $attrClass])));

    $labelBase = trim(
        implode(' ', array_filter(['text-gray-900 dark:text-gray-100', $sizeClass['label'], $labelClass])),
    );

    $segmentWrapperBase = trim(implode(' ', array_filter(['flex items-center gap-2', $segmentWrapperClass])));

    $segmentBase = trim(
        implode(
            ' ',
            array_filter([
                'appearance-none text-center font-medium outline-none transition-all duration-150',
                $sizeClass['box'],
                $variantClass,
                $variantKey !== 'underlined' ? $radiusClass : '',
                $palette['text'],
                $palette['dark'],
                $variantKey === 'flat' ? $palette['flat'] : '',
                $variantKey === 'faded' ? $palette['bg'] : '',
                $variantKey === 'bordered' || $variantKey === 'underlined' ? $palette['border'] : '',
                $palette['focus'],
                $isInvalid
                    ? 'border-rose-400 bg-rose-50 text-rose-700 focus:border-rose-500 dark:bg-rose-950/40 dark:text-rose-200 dark:border-rose-700/60'
                    : '',
                $isDisabled ? 'opacity-60 cursor-not-allowed' : '',
                $baseClass,
                $segmentClass,
            ]),
        ),
    );

    $descBase = trim(
        implode(' ', array_filter(['text-gray-500 dark:text-gray-400', $sizeClass['hint'], $descriptionClass])),
    );

    $errorBase = trim(
        implode(' ', array_filter(['text-rose-600 dark:text-rose-400', $sizeClass['hint'], $errorClass])),
    );
@endphp

<div class="{{ $baseWrapper }}" data-otp-root {{ $attributes->except('class') }}>
    @if ($labelText !== '')
        <label class="{{ $labelBase }}">
            {{ $labelText }}@if ($isRequired)
                <span class="text-rose-500"> *</span>
            @endif
        </label>
    @endif
    <div class="{{ $segmentWrapperBase }}">
        @for ($i = 0; $i < $lengthValue; $i++)
            <input type="{{ $typeKey === 'password' ? 'password' : 'text' }}" inputmode="numeric" pattern="[0-9]*"
                maxlength="1" aria-label="OTP digit {{ $i + 1 }} of {{ $lengthValue }}"
                class="{{ $segmentBase }}" value="{{ $characters[$i] ?? '' }}" data-otp-input
                data-otp-index="{{ $i }}" @if ($isDisabled) disabled @endif
                @if ($isReadOnly) readonly @endif @if ($isRequired && $i === 0) required @endif />
        @endfor
        @if ($name)
            <input type="hidden" name="{{ $name }}" value="{{ $value }}" data-otp-hidden />
        @endif
    </div>
    @if (!empty($description))
        <p class="{{ $descBase }}">{{ $description }}</p>
    @endif
    @if (!empty($errorMessage) && $isInvalid)
        <p class="{{ $errorBase }}">{{ $errorMessage }}</p>
    @endif
</div>
