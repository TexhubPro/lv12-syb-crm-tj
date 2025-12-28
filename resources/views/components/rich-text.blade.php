@props([
    'label' => null,
    'description' => null,
    'errorMessage' => null,
    'invalid' => false,
    'required' => false,
    'disabled' => false,
    'size' => 'md',
    'radius' => '2xl',
    'variant' => 'filled',
    'color' => 'default',
    'labelPlacement' => 'outside',
    'name' => null,
    'id' => null,
    'placeholder' => 'Write something...',
    'value' => '',
    'toolbar' => true,
    'baseClass' => '',
    'editorClass' => '',
    'toolbarClass' => '',
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
    $isDisabled = filter_var($disabled, FILTER_VALIDATE_BOOLEAN);
    $toolbarEnabled = filter_var($toolbar, FILTER_VALIDATE_BOOLEAN);

    $sizes = [
        'sm' => ['editor' => 'min-h-[140px] text-xs', 'px' => 'px-3 py-2', 'label' => 'text-sm', 'hint' => 'text-xs'],
        'md' => ['editor' => 'min-h-[180px] text-sm', 'px' => 'px-5 py-3', 'label' => 'text-base', 'hint' => 'text-sm'],
        'lg' => ['editor' => 'min-h-[220px] text-base', 'px' => 'px-7 py-4', 'label' => 'text-lg', 'hint' => 'text-base'],
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
            'text' => 'text-gray-900',
            'bg' => 'bg-gray-100',
            'flat' => 'bg-gray-50',
            'border' => 'border-gray-300/70',
            'focus' => 'focus:border-gray-400/80',
            'dark' => 'dark:bg-white/5 dark:text-gray-100 dark:border-white/15',
        ],
        'primary' => [
            'text' => 'text-blue-700',
            'bg' => 'bg-blue-100',
            'flat' => 'bg-blue-50',
            'border' => 'border-blue-200',
            'focus' => 'focus:border-blue-500',
            'dark' => 'dark:bg-blue-950/40 dark:text-blue-200 dark:border-blue-700/60',
        ],
        'secondary' => [
            'text' => 'text-purple-700',
            'bg' => 'bg-purple-100',
            'flat' => 'bg-purple-50',
            'border' => 'border-purple-200',
            'focus' => 'focus:border-purple-500',
            'dark' => 'dark:bg-purple-950/40 dark:text-purple-200 dark:border-purple-700/60',
        ],
        'success' => [
            'text' => 'text-green-700',
            'bg' => 'bg-green-100',
            'flat' => 'bg-green-50',
            'border' => 'border-green-200',
            'focus' => 'focus:border-green-500',
            'dark' => 'dark:bg-green-950/40 dark:text-green-200 dark:border-green-700/60',
        ],
        'warning' => [
            'text' => 'text-orange-700',
            'bg' => 'bg-orange-100',
            'flat' => 'bg-orange-50',
            'border' => 'border-orange-200',
            'focus' => 'focus:border-orange-500',
            'dark' => 'dark:bg-orange-950/40 dark:text-orange-200 dark:border-orange-700/60',
        ],
        'danger' => [
            'text' => 'text-rose-700',
            'bg' => 'bg-rose-100',
            'flat' => 'bg-rose-50',
            'border' => 'border-rose-200',
            'focus' => 'focus:border-rose-500',
            'dark' => 'dark:bg-rose-950/40 dark:text-rose-200 dark:border-rose-700/60',
        ],
    ];

    $sizeClass = $sizes[$sizeKey] ?? $sizes['md'];
    $radiusClass = $radiusMap[$radiusKey] ?? $radiusMap['lg'];
    $variantClass = $variants[$variantKey] ?? $variants['filled'];
    $palette = $colors[$colorKey] ?? $colors['default'];

    $labelText = $label !== null ? (string) $label : '';
    $editorId = $id ?: 'richtext-' . \Illuminate\Support\Str::uuid();

    $topPadding = $placement === 'inside' && $labelText !== '' ? 'pt-6' : '';

    $attrClass = trim((string) $attributes->get('class', ''));
    $editorBase = trim(implode(' ', array_filter([
        'w-full outline-none transition-all duration-150',
        $sizeClass['editor'],
        $sizeClass['px'],
        $topPadding,
        $variantClass,
        $variantKey !== 'underlined' ? $radiusClass : '',
        $palette['text'],
        $palette['dark'],
        $variantKey === 'filled' ? $palette['bg'] : '',
        $variantKey === 'flat' ? $palette['flat'] : '',
        $variantKey === 'outline' || $variantKey === 'underlined' ? $palette['border'] : '',
        $palette['focus'],
        $isInvalid ? 'border-rose-500 bg-rose-50 text-rose-700 focus:border-rose-500 dark:bg-rose-950/40 dark:text-rose-200 dark:border-rose-700/60' : '',
        $isDisabled ? 'opacity-60 pointer-events-none' : '',
        $baseClass,
        $editorClass,
        $attrClass,
    ])));

    $wrapperBase = trim(implode(' ', array_filter([
        $placement === 'outside-left' ? 'flex items-start gap-4' : 'grid gap-2',
        $wrapperClass,
    ])));

    $labelBase = trim(implode(' ', array_filter([
        'text-gray-900 dark:text-gray-100',
        $sizeClass['label'],
        $labelClass,
    ])));

    $descBase = trim(implode(' ', array_filter([
        'text-gray-500 dark:text-gray-400',
        $sizeClass['hint'],
        $descriptionClass,
    ])));

    $errorBase = trim(implode(' ', array_filter([
        'text-rose-600 dark:text-rose-400',
        $sizeClass['hint'],
        $errorClass,
    ])));

    $toolbarBase = trim(implode(' ', array_filter([
        'flex flex-wrap items-center gap-2 rounded-xl border border-gray-200 bg-white/70 px-3 py-2 text-xs text-gray-700 shadow-sm backdrop-blur dark:border-gray-800 dark:bg-gray-950/70 dark:text-gray-200',
        $toolbarClass,
    ])));
@endphp

<div class="{{ $wrapperBase }}" data-rich-root>
    @if ($placement === 'outside-left')
        <label for="{{ $editorId }}" class="pt-2 {{ $labelBase }}">
            {{ $labelText }}@if ($isRequired)<span class="text-rose-500"> *</span>@endif
        </label>
        <div class="grid gap-2 flex-1">
            @if ($toolbarEnabled)
                <div class="{{ $toolbarBase }}" data-rich-toolbar>
                    <button type="button" data-rich-command="bold" class="rounded-md border border-transparent px-2 py-1 hover:border-gray-200 dark:hover:border-gray-700">B</button>
                    <button type="button" data-rich-command="italic" class="rounded-md border border-transparent px-2 py-1 italic hover:border-gray-200 dark:hover:border-gray-700">I</button>
                    <button type="button" data-rich-command="underline" class="rounded-md border border-transparent px-2 py-1 underline hover:border-gray-200 dark:hover:border-gray-700">U</button>
                    <button type="button" data-rich-command="insertUnorderedList" class="rounded-md border border-transparent px-2 py-1 hover:border-gray-200 dark:hover:border-gray-700">UL</button>
                    <button type="button" data-rich-command="insertOrderedList" class="rounded-md border border-transparent px-2 py-1 hover:border-gray-200 dark:hover:border-gray-700">OL</button>
                    <button type="button" data-rich-command="createLink" class="rounded-md border border-transparent px-2 py-1 hover:border-gray-200 dark:hover:border-gray-700">Link</button>
                    <button type="button" data-rich-command="clear" class="rounded-md border border-transparent px-2 py-1 hover:border-gray-200 dark:hover:border-gray-700">Clear</button>
                </div>
            @endif
            <div class="relative">
                <div
                    id="{{ $editorId }}"
                    class="{{ $editorBase }}"
                    contenteditable="{{ $isDisabled ? 'false' : 'true' }}"
                    data-rich-editor
                    data-placeholder="{{ $placeholder }}"
                >{!! $value !!}</div>
                @if ($name)
                    <input type="hidden" name="{{ $name }}" value="{{ $value }}" data-rich-input />
                @endif
            </div>
            @if (!empty($description))
                <p class="{{ $descBase }}">{{ $description }}</p>
            @endif
            @if (!empty($errorMessage) && $isInvalid)
                <p class="{{ $errorBase }}">{{ $errorMessage }}</p>
            @endif
        </div>
    @else
        @if ($placement !== 'inside' && $labelText !== '')
            <label for="{{ $editorId }}" class="{{ $labelBase }}">
                {{ $labelText }}@if ($isRequired)<span class="text-rose-500"> *</span>@endif
            </label>
        @endif
        @if ($toolbarEnabled)
            <div class="{{ $toolbarBase }}" data-rich-toolbar>
                <button type="button" data-rich-command="bold" class="rounded-md border border-transparent px-2 py-1 hover:border-gray-200 dark:hover:border-gray-700">B</button>
                <button type="button" data-rich-command="italic" class="rounded-md border border-transparent px-2 py-1 italic hover:border-gray-200 dark:hover:border-gray-700">I</button>
                <button type="button" data-rich-command="underline" class="rounded-md border border-transparent px-2 py-1 underline hover:border-gray-200 dark:hover:border-gray-700">U</button>
                <button type="button" data-rich-command="insertUnorderedList" class="rounded-md border border-transparent px-2 py-1 hover:border-gray-200 dark:hover:border-gray-700">UL</button>
                <button type="button" data-rich-command="insertOrderedList" class="rounded-md border border-transparent px-2 py-1 hover:border-gray-200 dark:hover:border-gray-700">OL</button>
                <button type="button" data-rich-command="createLink" class="rounded-md border border-transparent px-2 py-1 hover:border-gray-200 dark:hover:border-gray-700">Link</button>
                <button type="button" data-rich-command="clear" class="rounded-md border border-transparent px-2 py-1 hover:border-gray-200 dark:hover:border-gray-700">Clear</button>
            </div>
        @endif
        <div class="relative">
            @if ($placement === 'inside' && $labelText !== '')
                <label for="{{ $editorId }}" class="absolute left-4 top-2 text-xs text-gray-500 dark:text-gray-400">
                    {{ $labelText }}@if ($isRequired)<span class="text-rose-500"> *</span>@endif
                </label>
            @endif
            <div
                id="{{ $editorId }}"
                class="{{ $editorBase }}"
                contenteditable="{{ $isDisabled ? 'false' : 'true' }}"
                data-rich-editor
                data-placeholder="{{ $placeholder }}"
            >{!! $value !!}</div>
            @if ($name)
                <input type="hidden" name="{{ $name }}" value="{{ $value }}" data-rich-input />
            @endif
        </div>
        @if (!empty($description))
            <p class="{{ $descBase }}">{{ $description }}</p>
        @endif
        @if (!empty($errorMessage) && $isInvalid)
            <p class="{{ $errorBase }}">{{ $errorMessage }}</p>
        @endif
    @endif
</div>
