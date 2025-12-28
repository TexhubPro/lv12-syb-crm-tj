@props([
    'value' => '',
    'disabled' => false,
    'active' => false,
    'icon' => null,
    'iconType' => 'outline',
    'iconSize' => 18,
])
@aware(['variant', 'size', 'radius', 'color', 'parentDisabled', 'tabsId'])
@php
    $variantKey = strtolower((string) ($variant ?? 'solid'));
    $sizeKey = strtolower((string) ($size ?? 'md'));
    $radiusKey = strtolower((string) ($radius ?? 'xl'));
    $colorKey = strtolower((string) ($color ?? 'default'));
    $isDisabled =
        filter_var($disabled, FILTER_VALIDATE_BOOLEAN) || filter_var($parentDisabled ?? false, FILTER_VALIDATE_BOOLEAN);
    $isActive = filter_var($active, FILTER_VALIDATE_BOOLEAN);
    $valueSafe = $value !== '' ? \Illuminate\Support\Str::slug($value) : 'tab';
    $tabId = ($tabsId ?: 'tabs') . '-tab-' . $valueSafe;
    $panelId = ($tabsId ?: 'tabs') . '-panel-' . $valueSafe;

    $sizeMap = [
        'sm' => 'text-xs px-3 py-1',
        'md' => 'text-sm px-4 py-2',
        'lg' => 'text-base px-5 py-3',
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
    $radiusClass = $radiusMap[$radiusKey] ?? $radiusMap['xl'];

    $colorSolid = [
        'default' => 'data-[state=active]:bg-white data-[state=active]:text-gray-900 dark:data-[state=active]:bg-white',
        'primary' =>
            'data-[state=active]:bg-blue-600 data-[state=active]:text-white data-[state=active]:ring-1 data-[state=active]:ring-blue-600/30',
        'secondary' =>
            'data-[state=active]:bg-purple-600 data-[state=active]:text-white data-[state=active]:ring-1 data-[state=active]:ring-purple-600/30',
        'success' =>
            'data-[state=active]:bg-green-600 data-[state=active]:text-white data-[state=active]:ring-1 data-[state=active]:ring-green-600/30',
        'warning' =>
            'data-[state=active]:bg-orange-500 data-[state=active]:text-white data-[state=active]:ring-1 data-[state=active]:ring-orange-500/30',
        'danger' =>
            'data-[state=active]:bg-rose-600 data-[state=active]:text-white data-[state=active]:ring-1 data-[state=active]:ring-rose-600/30',
    ];
    $colorLight = [
        'default' =>
            'data-[state=active]:bg-gray-200 data-[state=active]:text-gray-900 dark:data-[state=active]:bg-gray-800',
        'primary' =>
            'data-[state=active]:bg-blue-100 data-[state=active]:text-blue-700 dark:data-[state=active]:bg-blue-500/20 dark:data-[state=active]:text-blue-300',
        'secondary' =>
            'data-[state=active]:bg-purple-100 data-[state=active]:text-purple-700 dark:data-[state=active]:bg-purple-500/20 dark:data-[state=active]:text-purple-300',
        'success' =>
            'data-[state=active]:bg-green-100 data-[state=active]:text-green-700 dark:data-[state=active]:bg-green-500/20 dark:data-[state=active]:text-green-300',
        'warning' =>
            'data-[state=active]:bg-orange-100 data-[state=active]:text-orange-700 dark:data-[state=active]:bg-orange-500/20 dark:data-[state=active]:text-orange-300',
        'danger' =>
            'data-[state=active]:bg-rose-100 data-[state=active]:text-rose-700 dark:data-[state=active]:bg-rose-500/20 dark:data-[state=active]:text-rose-300',
    ];
    $colorUnderline = [
        'default' =>
            'data-[state=active]:border-gray-900 data-[state=active]:text-gray-900 dark:data-[state=active]:border-gray-100',
        'primary' => 'data-[state=active]:border-blue-600 data-[state=active]:text-blue-600',
        'secondary' => 'data-[state=active]:border-purple-600 data-[state=active]:text-purple-600',
        'success' => 'data-[state=active]:border-green-600 data-[state=active]:text-green-600',
        'warning' => 'data-[state=active]:border-orange-500 data-[state=active]:text-orange-500',
        'danger' => 'data-[state=active]:border-rose-600 data-[state=active]:text-rose-600',
    ];

    $baseClass = 'relative inline-flex items-center gap-2 font-medium transition shadow-none focus:outline-none';
    $variantClasses = [
        'solid' =>
            'text-gray-600 dark:text-gray-300 data-[state=active]:shadow-md data-[state=active]:shadow-black/10 dark:data-[state=active]:shadow-black/40 data-[state=active]:ring-1 data-[state=active]:ring-black/5 dark:data-[state=active]:ring-white/10',
        'bordered' =>
            'text-gray-600 dark:text-gray-300 data-[state=active]:shadow-md data-[state=active]:shadow-black/10 dark:data-[state=active]:shadow-black/40 data-[state=active]:ring-1 data-[state=active]:ring-gray-200 dark:data-[state=active]:ring-gray-700',
        'light' => 'text-gray-600 dark:text-gray-300',
        'underlined' => 'text-gray-500 dark:text-gray-400 border-b-2 border-transparent pb-2',
    ];
    $colorClass =
        $variantKey === 'underlined'
            ? $colorUnderline[$colorKey] ?? $colorUnderline['default']
            : ($variantKey === 'light'
                ? $colorLight[$colorKey] ?? $colorLight['default']
                : $colorSolid[$colorKey] ?? $colorSolid['default']);

    $attrClass = trim((string) $attributes->get('class', ''));
    $tabClass = trim(
        implode(
            ' ',
            array_filter([
                $baseClass,
                $sizeMap[$sizeKey] ?? $sizeMap['md'],
                $variantKey === 'underlined' ? '' : $radiusClass,
                $variantClasses[$variantKey] ?? $variantClasses['solid'],
                $colorClass,
                $isDisabled ? 'opacity-40 cursor-not-allowed' : 'cursor-pointer',
                $attrClass,
            ]),
        ),
    );
@endphp

<button type="button" id="{{ $tabId }}" {{ $attributes->except('class')->merge(['class' => $tabClass]) }}
    data-tabs-trigger data-value="{{ $value }}" data-state="{{ $isActive ? 'active' : 'inactive' }}"
    aria-controls="{{ $panelId }}" aria-selected="{{ $isActive ? 'true' : 'false' }}"
    @if ($isDisabled) disabled aria-disabled="true" @endif>
    @if ($icon)
        <x-icon type="{{ $iconType }}" icon="{{ $icon }}" size="{{ $iconSize }}"></x-icon>
    @endif
    <span class="whitespace-nowrap">{{ $slot }}</span>
</button>
