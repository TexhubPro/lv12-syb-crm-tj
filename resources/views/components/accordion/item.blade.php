@props([
    'title' => '',
    'open' => false,
    'size' => 'md',
    'icon' => 'chevron-right',
    'iconSize' => 5,
    'id' => null,
    'variant' => null,
])
@aware(['variant' => 'parentVariant'])
@php
    $variantKey = strtolower((string) ($variant ?? ($parentVariant ?? 'default')));
    $sizes = [
        'sm' => ['trigger' => 'px-4 py-3 text-sm', 'body' => 'px-4 pb-4 text-sm'],
        'md' => ['trigger' => 'px-4 py-4 text-base', 'body' => 'px-4 pb-5 text-sm'],
        'lg' => ['trigger' => 'px-5 py-5 text-lg', 'body' => 'px-5 pb-6 text-base'],
    ];
    $sizeKey = $sizes[$size] ?? $sizes['md'];
    $variants = [
        'default' => [
            'title' => 'text-gray-900 dark:text-gray-100',
            'body' => 'text-gray-600 dark:text-gray-300',
            'icon' => 'text-gray-500 dark:text-gray-400',
        ],
        'primary' => [
            'title' => 'text-blue-700 dark:text-blue-300',
            'body' => 'text-blue-600/90 dark:text-blue-200',
            'icon' => 'text-blue-500 dark:text-blue-300',
        ],
        'secondary' => [
            'title' => 'text-purple-700 dark:text-purple-300',
            'body' => 'text-purple-600/90 dark:text-purple-200',
            'icon' => 'text-purple-500 dark:text-purple-300',
        ],
        'success' => [
            'title' => 'text-green-700 dark:text-green-300',
            'body' => 'text-green-600/90 dark:text-green-200',
            'icon' => 'text-green-500 dark:text-green-300',
        ],
        'warning' => [
            'title' => 'text-orange-700 dark:text-orange-300',
            'body' => 'text-orange-600/90 dark:text-orange-200',
            'icon' => 'text-orange-500 dark:text-orange-300',
        ],
        'danger' => [
            'title' => 'text-red-700 dark:text-red-300',
            'body' => 'text-red-600/90 dark:text-red-200',
            'icon' => 'text-red-500 dark:text-red-300',
        ],
    ];
    $variantClasses = $variants[$variantKey] ?? $variants['default'];
    $panelId = $id ?: 'accordion-' . \Illuminate\Support\Str::uuid();
    $state = $open ? 'open' : 'closed';
@endphp

<div {{ $attributes->merge(['class' => 'group']) }} data-accordion-item data-state="{{ $state }}">
    <button type="button"
        class="flex w-full items-center justify-between text-left font-medium {{ $variantClasses['title'] }} {{ $sizeKey['trigger'] }}"
        aria-expanded="{{ $open ? 'true' : 'false' }}" aria-controls="{{ $panelId }}" data-accordion-trigger>
        <span>{{ $title }}</span>
        <span class="{{ $variantClasses['icon'] }} transition-transform duration-200 group-data-[state=open]:rotate-90">
            <x-icon type="outline" icon="{{ $icon }}" size="{{ $iconSize }}"></x-icon>
        </span>
    </button>
    <div id="{{ $panelId }}"
        class="overflow-hidden {{ $variantClasses['body'] }} transition-[height] duration-300 ease-out"
        data-accordion-panel style="height: {{ $open ? 'auto' : '0px' }};">
        <div class="{{ $sizeKey['body'] }}">
            {{ $slot }}
        </div>
    </div>
</div>
