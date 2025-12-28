@props([
    'value' => '',
    'active' => false,
    'class' => '',
])
@aware(['tabsId'])
@php
    $valueSafe = $value !== '' ? \Illuminate\Support\Str::slug($value) : 'panel';
    $panelId = ($tabsId ?: 'tabs') . '-panel-' . $valueSafe;
    $tabId = ($tabsId ?: 'tabs') . '-tab-' . $valueSafe;
    $isActive = filter_var($active, FILTER_VALIDATE_BOOLEAN);
    $defaultClass = 'rounded-2xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-800 dark:bg-gray-900/40';
    $panelClass = trim($class !== '' ? $defaultClass . ' ' . $class : $defaultClass);
@endphp

<div
    id="{{ $panelId }}"
    class="{{ $panelClass }}"
    data-tabs-panel
    data-value="{{ $value }}"
    data-state="{{ $isActive ? 'active' : 'inactive' }}"
    aria-labelledby="{{ $tabId }}"
    @if (!$isActive) hidden @endif
>
    {{ $slot }}
</div>
