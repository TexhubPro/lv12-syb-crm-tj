<div class="mt-10">
    <p class="text-xs uppercase tracking-[0.3em] text-slate-500 dark:text-slate-500">Панель управления</p>
    <nav class="mt-4 grid gap-2">
        <a href="{{ route('admin.dashboard') }}"
            class="group flex items-center gap-3 rounded-2xl px-2 py-1.5 text-sm font-medium transition
                {{ request()->routeIs('admin.dashboard') ? 'bg-slate-900/5 text-slate-900 ring-1 ring-slate-900/10 dark:bg-white/5 dark:text-white dark:ring-white/5' : 'text-slate-600 hover:bg-slate-900/5 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-white/5 dark:hover:text-white' }}">
            <span
                class="flex h-9 w-9 items-center justify-center rounded-xl {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-500/15 text-indigo-500 dark:bg-indigo-500/20 dark:text-indigo-200' : 'bg-slate-900/5 text-slate-600 dark:bg-slate-800/70 dark:text-slate-200' }}">
                <x-icon type="outline" icon="layout-grid-add" size="5"></x-icon>
            </span>
            Дашборд
            <x-badge text="Новое" variant="primary" size="xs" inline="true" class="ml-auto"></x-badge>
        </a>
        <a href="{{ route('admin.order-types.index') }}"
            class="group flex items-center gap-3 rounded-2xl px-2 py-1.5 text-sm font-medium transition
                {{ request()->routeIs('admin.order-types.*') ? 'bg-slate-900/5 text-slate-900 ring-1 ring-slate-900/10 dark:bg-white/5 dark:text-white dark:ring-white/5' : 'text-slate-600 hover:bg-slate-900/5 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-white/5 dark:hover:text-white' }}">
            <span
                class="flex h-9 w-9 items-center justify-center rounded-xl {{ request()->routeIs('admin.order-types.*') ? 'bg-indigo-500/15 text-indigo-500 dark:bg-indigo-500/20 dark:text-indigo-200' : 'bg-slate-900/5 text-slate-600 dark:bg-slate-800/70 dark:text-slate-200' }}">
                <x-icon type="outline" icon="list-details" size="5"></x-icon>
            </span>
            Виды
        </a>
        <a href="{{ route('admin.profile-colors.index') }}"
            class="group flex items-center gap-3 rounded-2xl px-2 py-1.5 text-sm font-medium transition
                {{ request()->routeIs('admin.profile-colors.*') ? 'bg-slate-900/5 text-slate-900 ring-1 ring-slate-900/10 dark:bg-white/5 dark:text-white dark:ring-white/5' : 'text-slate-600 hover:bg-slate-900/5 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-white/5 dark:hover:text-white' }}">
            <span
                class="flex h-9 w-9 items-center justify-center rounded-xl {{ request()->routeIs('admin.profile-colors.*') ? 'bg-indigo-500/15 text-indigo-500 dark:bg-indigo-500/20 dark:text-indigo-200' : 'bg-slate-900/5 text-slate-600 dark:bg-slate-800/70 dark:text-slate-200' }}">
                <x-icon type="outline" icon="palette" size="5"></x-icon>
            </span>
            Цвет профиля
        </a>
        <a href="{{ route('admin.cornice-types.index') }}"
            class="group flex items-center gap-3 rounded-2xl px-2 py-1.5 text-sm font-medium transition
                {{ request()->routeIs('admin.cornice-types.*') ? 'bg-slate-900/5 text-slate-900 ring-1 ring-slate-900/10 dark:bg-white/5 dark:text-white dark:ring-white/5' : 'text-slate-600 hover:bg-slate-900/5 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-white/5 dark:hover:text-white' }}">
            <span
                class="flex h-9 w-9 items-center justify-center rounded-xl {{ request()->routeIs('admin.cornice-types.*') ? 'bg-indigo-500/15 text-indigo-500 dark:bg-indigo-500/20 dark:text-indigo-200' : 'bg-slate-900/5 text-slate-600 dark:bg-slate-800/70 dark:text-slate-200' }}">
                <x-icon type="outline" icon="layout-bottombar" size="5"></x-icon>
            </span>
            Тип карниза
        </a>
        <a href="{{ route('admin.fabric-codes.index') }}"
            class="group flex items-center gap-3 rounded-2xl px-2 py-1.5 text-sm font-medium transition
                {{ request()->routeIs('admin.fabric-codes.*') ? 'bg-slate-900/5 text-slate-900 ring-1 ring-slate-900/10 dark:bg-white/5 dark:text-white dark:ring-white/5' : 'text-slate-600 hover:bg-slate-900/5 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-white/5 dark:hover:text-white' }}">
            <span
                class="flex h-9 w-9 items-center justify-center rounded-xl {{ request()->routeIs('admin.fabric-codes.*') ? 'bg-indigo-500/15 text-indigo-500 dark:bg-indigo-500/20 dark:text-indigo-200' : 'bg-slate-900/5 text-slate-600 dark:bg-slate-800/70 dark:text-slate-200' }}">
                <x-icon type="outline" icon="qrcode" size="5"></x-icon>
            </span>
            Код ткани
        </a>
        <a href="{{ route('admin.control-types.index') }}"
            class="group flex items-center gap-3 rounded-2xl px-2 py-1.5 text-sm font-medium transition
                {{ request()->routeIs('admin.control-types.*') ? 'bg-slate-900/5 text-slate-900 ring-1 ring-slate-900/10 dark:bg-white/5 dark:text-white dark:ring-white/5' : 'text-slate-600 hover:bg-slate-900/5 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-white/5 dark:hover:text-white' }}">
            <span
                class="flex h-9 w-9 items-center justify-center rounded-xl {{ request()->routeIs('admin.control-types.*') ? 'bg-indigo-500/15 text-indigo-500 dark:bg-indigo-500/20 dark:text-indigo-200' : 'bg-slate-900/5 text-slate-600 dark:bg-slate-800/70 dark:text-slate-200' }}">
                <x-icon type="outline" icon="device-remote" size="5"></x-icon>
            </span>
            Тип управления
        </a>
        <a href="{{ route('admin.clients.index') }}"
            class="group flex items-center gap-3 rounded-2xl px-2 py-1.5 text-sm font-medium transition
                {{ request()->routeIs('admin.clients.*') ? 'bg-slate-900/5 text-slate-900 ring-1 ring-slate-900/10 dark:bg-white/5 dark:text-white dark:ring-white/5' : 'text-slate-600 hover:bg-slate-900/5 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-white/5 dark:hover:text-white' }}">
            <span
                class="flex h-9 w-9 items-center justify-center rounded-xl {{ request()->routeIs('admin.clients.*') ? 'bg-indigo-500/15 text-indigo-500 dark:bg-indigo-500/20 dark:text-indigo-200' : 'bg-slate-900/5 text-slate-600 dark:bg-slate-800/70 dark:text-slate-200' }}">
                <x-icon type="outline" icon="users" size="5"></x-icon>
            </span>
            Клиенты
        </a>
        <a href="{{ route('admin.cashier') }}"
            class="group flex items-center gap-3 rounded-2xl px-2 py-1.5 text-sm font-medium transition
                {{ request()->routeIs('admin.cashier') ? 'bg-slate-900/5 text-slate-900 ring-1 ring-slate-900/10 dark:bg-white/5 dark:text-white dark:ring-white/5' : 'text-slate-600 hover:bg-slate-900/5 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-white/5 dark:hover:text-white' }}">
            <span
                class="flex h-9 w-9 items-center justify-center rounded-xl {{ request()->routeIs('admin.cashier') ? 'bg-indigo-500/15 text-indigo-500 dark:bg-indigo-500/20 dark:text-indigo-200' : 'bg-slate-900/5 text-slate-600 dark:bg-slate-800/70 dark:text-slate-200' }}">
                <x-icon type="outline" icon="cash-register" size="5"></x-icon>
            </span>
            Касса
        </a>
        <a href="{{ route('admin.orders.index') }}"
            class="group flex items-center gap-3 rounded-2xl px-2 py-1.5 text-sm font-medium transition
                {{ request()->routeIs('admin.orders.*') ? 'bg-slate-900/5 text-slate-900 ring-1 ring-slate-900/10 dark:bg-white/5 dark:text-white dark:ring-white/5' : 'text-slate-600 hover:bg-slate-900/5 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-white/5 dark:hover:text-white' }}">
            <span
                class="flex h-9 w-9 items-center justify-center rounded-xl {{ request()->routeIs('admin.orders.*') ? 'bg-indigo-500/15 text-indigo-500 dark:bg-indigo-500/20 dark:text-indigo-200' : 'bg-slate-900/5 text-slate-600 dark:bg-slate-800/70 dark:text-slate-200' }}">
                <x-icon type="outline" icon="files" size="5"></x-icon>
            </span>
            Заказы
        </a>
        <a href="{{ route('admin.employees.index') }}"
            class="group flex items-center gap-3 rounded-2xl px-2 py-1.5 text-sm font-medium transition
                {{ request()->routeIs('admin.employees.*') ? 'bg-slate-900/5 text-slate-900 ring-1 ring-slate-900/10 dark:bg-white/5 dark:text-white dark:ring-white/5' : 'text-slate-600 hover:bg-slate-900/5 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-white/5 dark:hover:text-white' }}">
            <span
                class="flex h-9 w-9 items-center justify-center rounded-xl {{ request()->routeIs('admin.employees.*') ? 'bg-indigo-500/15 text-indigo-500 dark:bg-indigo-500/20 dark:text-indigo-200' : 'bg-slate-900/5 text-slate-600 dark:bg-slate-800/70 dark:text-slate-200' }}">
                <x-icon type="outline" icon="users" size="5"></x-icon>
            </span>
            Сотрудники
        </a>
        <a href="{{ route('admin.bank.index') }}"
            class="group flex items-center gap-3 rounded-2xl px-2 py-1.5 text-sm font-medium transition
                {{ request()->routeIs('admin.bank.*') ? 'bg-slate-900/5 text-slate-900 ring-1 ring-slate-900/10 dark:bg-white/5 dark:text-white dark:ring-white/5' : 'text-slate-600 hover:bg-slate-900/5 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-white/5 dark:hover:text-white' }}">
            <span
                class="flex h-9 w-9 items-center justify-center rounded-xl {{ request()->routeIs('admin.bank.*') ? 'bg-indigo-500/15 text-indigo-500 dark:bg-indigo-500/20 dark:text-indigo-200' : 'bg-slate-900/5 text-slate-600 dark:bg-slate-800/70 dark:text-slate-200' }}">
                <x-icon type="outline" icon="cash-banknote" size="5"></x-icon>
            </span>
            Банк
        </a>
    </nav>
</div>
