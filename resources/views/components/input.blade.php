@props([
    'label' => null,
    'description' => null,
    'errorMessage' => null,
    'invalid' => false,
    'required' => false,
    'size' => 'md',
    'radius' => 'xl',
    'variant' => 'filled',
    'color' => 'default',
    'labelPlacement' => 'outside',
    'startContent' => null,
    'endContent' => null,
    'clearable' => false,
    'togglePassword' => false,
    'type' => 'text',
    'name' => null,
    'id' => null,
    'baseClass' => 'hover:focus:bg-gray-100 dark:hover:focus:bg-gray-800',
    'inputClass' => '',
    'wrapperClass' => '',
    'labelClass' => '',
    'descriptionClass' => '',
    'errorClass' => '',
])
@php
    $sizeKey = strtolower((string) $size);
    $radiusKey = strtolower((string) $radius);
    $variantKey = strtolower((string) $variant);
    $colorKey = strtolower((string) $color);
    $placement = strtolower((string) $labelPlacement);
    if ($placement === 'outside-top') {
        $placement = 'outside';
    }

    $isInvalid = filter_var($invalid, FILTER_VALIDATE_BOOLEAN);
    $isRequired = filter_var($required, FILTER_VALIDATE_BOOLEAN);
    $isClearable = filter_var($clearable, FILTER_VALIDATE_BOOLEAN);
    $togglePasswordEnabled = filter_var($togglePassword, FILTER_VALIDATE_BOOLEAN) && $type === 'password';

    $sizes = [
        'sm' => ['input' => 'h-8 text-xs', 'px' => 'px-3', 'label' => 'text-sm', 'hint' => 'text-xs'],
        'md' => ['input' => 'h-10 text-sm', 'px' => 'px-5', 'label' => 'text-base', 'hint' => 'text-sm'],
        'lg' => ['input' => 'h-12 text-base', 'px' => 'px-7', 'label' => 'text-lg', 'hint' => 'text-base'],
    ];
    $radiusMap = [
        'none' => 'rounded-none',
        'sm' => 'rounded-sm',
        'md' => 'rounded-md',
        'lg' => 'rounded-lg',
        'xl' => 'rounded-xl',
        '2xl' => 'rounded-2xl',
        'full' => 'rounded-full',
    ];
    $variants = [
        'filled' => 'border-2 border-transparent',
        'outline' => 'bg-transparent border-2',
        'flat' => 'border-2 border-transparent',
        'underlined' => 'bg-transparent border-b-2 rounded-none',
    ];
    $colors = [
        'default' => [
            'text' => 'text-gray-900 placeholder:text-gray-500',
            'bg' => 'bg-gray-100 hover:bg-gray-200 dark:hover:bg-white/7',
            'flat' => 'bg-gray-50',
            'border' => 'border-gray-300/70',
            'ring' => 'focus:border-blue-500',
            'dark' => 'dark:bg-white/5 dark:text-gray-100 dark:placeholder:text-gray-400 dark:border-white/15',
        ],
        'primary' => [
            'text' => 'text-blue-700 placeholder:text-blue-500',
            'bg' => 'bg-blue-100',
            'flat' => 'bg-blue-50',
            'border' => 'border-blue-200',
            'ring' => 'focus:border-blue-500',
            'dark' => 'dark:bg-blue-950/40 dark:text-blue-200 dark:placeholder:text-blue-300 dark:border-blue-700/60',
        ],
        'secondary' => [
            'text' => 'text-purple-700 placeholder:text-purple-500',
            'bg' => 'bg-purple-100',
            'flat' => 'bg-purple-50',
            'border' => 'border-purple-200',
            'ring' => 'focus:border-purple-500',
            'dark' =>
                'dark:bg-purple-950/40 dark:text-purple-200 dark:placeholder:text-purple-300 dark:border-purple-700/60',
        ],
        'success' => [
            'text' => 'text-green-700 placeholder:text-green-500',
            'bg' => 'bg-green-100',
            'flat' => 'bg-green-50',
            'border' => 'border-green-200',
            'ring' => 'focus:border-green-500',
            'dark' =>
                'dark:bg-green-950/40 dark:text-green-200 dark:placeholder:text-green-300 dark:border-green-700/60',
        ],
        'warning' => [
            'text' => 'text-orange-700 placeholder:text-orange-500',
            'bg' => 'bg-orange-100',
            'flat' => 'bg-orange-50',
            'border' => 'border-orange-200',
            'ring' => 'focus:border-orange-500',
            'dark' =>
                'dark:bg-orange-950/40 dark:text-orange-200 dark:placeholder:text-orange-300 dark:border-orange-700/60',
        ],
        'danger' => [
            'text' => 'text-rose-700 placeholder:text-rose-500',
            'bg' => 'bg-rose-100',
            'flat' => 'bg-rose-50',
            'border' => 'border-rose-200',
            'ring' => 'focus:border-rose-500',
            'dark' => 'dark:bg-rose-950/40 dark:text-rose-200 dark:placeholder:text-rose-300 dark:border-rose-700/60',
        ],
    ];

    $sizeClass = $sizes[$sizeKey] ?? $sizes['md'];
    $radiusClass = $radiusMap[$radiusKey] ?? $radiusMap['lg'];
    $variantClass = $variants[$variantKey] ?? $variants['filled'];
    $palette = $colors[$colorKey] ?? $colors['primary'];

    $labelText = $label !== null ? (string) $label : '';
    $inputId = $id ?: 'input-' . \Illuminate\Support\Str::uuid();

    $hasStart = isset($startContent) && trim((string) $startContent) !== '';
    $hasEnd = isset($endContent) && trim((string) $endContent) !== '';
    $hasValue = trim((string) $attributes->get('value', '')) !== '';
    if ($togglePasswordEnabled) {
        $hasEnd = true;
    }

    $paddingLeft = $hasStart ? 'pl-11' : $sizeClass['px'];
    $paddingRight = $isClearable || $hasEnd ? 'pr-11' : $sizeClass['px'];
    $topPadding = $placement === 'inside' && $labelText !== '' ? 'pt-6' : '';

    $attrClass = trim((string) $attributes->get('class', ''));
    $outlineFocus =
        $variantKey === 'outline'
            ? 'focus:border-2 focus:border-blue-400/70 focus:outline focus:outline-2 focus:outline-blue-400/50 dark:focus:border-blue-300/60 dark:focus:outline-blue-500'
            : '';
    $inputBase = trim(
        implode(
            ' ',
            array_filter([
                'w-full outline-none transition-all duration-150',
                $sizeClass['input'],
                $paddingLeft,
                $paddingRight,
                $topPadding,
                $variantClass,
                $variantKey !== 'underlined' ? $radiusClass : '',
                $palette['text'],
                $palette['dark'],
                $variantKey === 'filled' ? $palette['bg'] : '',
                $variantKey === 'flat' ? $palette['flat'] : '',
                $variantKey === 'outline' || $variantKey === 'underlined' ? $palette['border'] : '',
                $palette['ring'],
                $outlineFocus,
                $isInvalid
                    ? 'border-rose-500 bg-rose-50 text-rose-700 placeholder:text-rose-400 focus:border-rose-500 dark:bg-rose-950/40 dark:text-rose-200 dark:placeholder:text-rose-300 dark:border-rose-700/60'
                    : '',
                $baseClass,
                $attrClass,
            ]),
        ),
    );

    $wrapperBase = trim(
        implode(
            ' ',
            array_filter([$placement === 'outside-left' ? 'flex items-start gap-4' : 'grid gap-2', $wrapperClass]),
        ),
    );

    $labelBase = trim(
        implode(' ', array_filter(['text-gray-900 dark:text-gray-100', $sizeClass['label'], $labelClass])),
    );

    $descBase = trim(
        implode(' ', array_filter(['text-gray-500 dark:text-gray-400', $sizeClass['hint'], $descriptionClass])),
    );

    $errorBase = trim(
        implode(' ', array_filter(['text-rose-600 dark:text-rose-400', $sizeClass['hint'], $errorClass])),
    );

    $inputAttrs = $attributes->except('class');
@endphp

<div class="{{ $wrapperBase }}" data-input-root>
    @if ($placement === 'outside-left')
        <label for="{{ $inputId }}" class="pt-2 {{ $labelBase }}">
            {{ $labelText }}@if ($isRequired)
                <span class="text-rose-500"> *</span>
            @endif
        </label>
        <div class="grid gap-2 flex-1">
            <div class="relative">
                @if ($hasStart)
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                        {{ $startContent }}
                    </span>
                @endif
                <input id="{{ $inputId }}" type="{{ $type }}" class="{{ $inputBase }} {{ $inputClass }}"
                    @if ($name) name="{{ $name }}" @endif {{ $inputAttrs }} />
                @if ($isClearable)
                    <button type="button"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400 {{ $hasValue ? '' : 'hidden' }}"
                        data-input-clear>
                        <x-icon type="outline" icon="x" size="16"></x-icon>
                    </button>
                @endif
                @if ($togglePasswordEnabled)
                    <button type="button"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400"
                        data-input-toggle aria-label="Toggle password">
                        <span class="block" data-eye-on>
                            <x-icon type="outline" icon="eye" size="18"></x-icon>
                        </span>
                        <span class="hidden" data-eye-off>
                            <x-icon type="outline" icon="eye-off" size="18"></x-icon>
                        </span>
                    </button>
                @elseif ($hasEnd)
                    <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                        {{ $endContent }}
                    </span>
                @endif
            </div>
            @if (!empty($description))
                <p class="{{ $descBase }}">{{ $description }}</p>
            @endif
            @if (!empty($errorMessage) && $isInvalid)
                @if (is_array($errorMessage))
                    <ul class="{{ $errorBase }} list-disc pl-5">
                        @foreach ($errorMessage as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @else
                    <p class="{{ $errorBase }}">{{ $errorMessage }}</p>
                @endif
            @endif
        </div>
    @else
        @if ($placement !== 'inside' && $labelText !== '')
            <label for="{{ $inputId }}" class="{{ $labelBase }}">
                {{ $labelText }}@if ($isRequired)
                    <span class="text-rose-500"> *</span>
                @endif
            </label>
        @endif
        <div class="relative">
            @if ($placement === 'inside' && $labelText !== '')
                <label for="{{ $inputId }}"
                    class="absolute left-4 top-2 text-xs text-gray-500 dark:text-gray-400">
                    {{ $labelText }}@if ($isRequired)
                        <span class="text-rose-500"> *</span>
                    @endif
                </label>
            @endif
            @if ($hasStart)
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                    {{ $startContent }}
                </span>
            @endif
            <input id="{{ $inputId }}" type="{{ $type }}"
                class="{{ $inputBase }} {{ $inputClass }}"
                @if ($name) name="{{ $name }}" @endif {{ $inputAttrs }} />
            @if ($isClearable)
                <button type="button"
                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400 {{ $hasValue ? '' : 'hidden' }}"
                    data-input-clear>
                    <x-icon type="outline" icon="x" size="16"></x-icon>
                </button>
            @endif
            @if ($togglePasswordEnabled)
                <button type="button"
                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400" data-input-toggle
                    aria-label="Toggle password">
                    <span class="block" data-eye-on>
                        <x-icon type="outline" icon="eye" size="5"></x-icon>
                    </span>
                    <span class="hidden" data-eye-off>
                        <x-icon type="outline" icon="eye-off" size="5"></x-icon>
                    </span>
                </button>
            @elseif ($hasEnd)
                <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                    {{ $endContent }}
                </span>
            @endif
        </div>
        @if (!empty($description))
            <p class="{{ $descBase }}">{{ $description }}</p>
        @endif
        @if (!empty($errorMessage) && $isInvalid)
            @if (is_array($errorMessage))
                <ul class="{{ $errorBase }} list-disc pl-5">
                    @foreach ($errorMessage as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @else
                <p class="{{ $errorBase }}">{{ $errorMessage }}</p>
            @endif
        @endif
    @endif
</div>
