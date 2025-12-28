<div class="mt-10">
    <p class="text-xs uppercase tracking-[0.3em] text-slate-500 dark:text-slate-500">Панель менеджера</p>
    <nav class="mt-4 grid gap-2">
        <a href="{{ route('manager.dashboard') }}"
            class="group flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-medium transition
                {{ request()->routeIs('manager.dashboard') ? 'bg-slate-900/5 text-slate-900 ring-1 ring-slate-900/10 dark:bg-white/5 dark:text-white dark:ring-white/5' : 'text-slate-600 hover:bg-slate-900/5 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-white/5 dark:hover:text-white' }}">
            <span
                class="flex h-9 w-9 items-center justify-center rounded-xl {{ request()->routeIs('manager.dashboard') ? 'bg-indigo-500/15 text-indigo-500 dark:bg-indigo-500/20 dark:text-indigo-200' : 'bg-slate-900/5 text-slate-600 dark:bg-slate-800/70 dark:text-slate-200' }}">
                <x-icon type="outline" icon="layout-grid-add" size="5"></x-icon>
            </span>
            Дашборд
        </a>
        <a href="{{ route('manager.cashier') }}"
            class="group flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-medium transition
                {{ request()->routeIs('manager.cashier') ? 'bg-slate-900/5 text-slate-900 ring-1 ring-slate-900/10 dark:bg-white/5 dark:text-white dark:ring-white/5' : 'text-slate-600 hover:bg-slate-900/5 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-white/5 dark:hover:text-white' }}">
            <span
                class="flex h-9 w-9 items-center justify-center rounded-xl {{ request()->routeIs('manager.cashier') ? 'bg-indigo-500/15 text-indigo-500 dark:bg-indigo-500/20 dark:text-indigo-200' : 'bg-slate-900/5 text-slate-600 dark:bg-slate-800/70 dark:text-slate-200' }}">
                <x-icon type="outline" icon="cash-register" size="5"></x-icon>
            </span>
            Касса
        </a>
        <a href="{{ route('manager.orders.index') }}"
            class="group flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-medium transition
                {{ request()->routeIs('manager.orders.*') ? 'bg-slate-900/5 text-slate-900 ring-1 ring-slate-900/10 dark:bg-white/5 dark:text-white dark:ring-white/5' : 'text-slate-600 hover:bg-slate-900/5 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-white/5 dark:hover:text-white' }}">
            <span
                class="flex h-9 w-9 items-center justify-center rounded-xl {{ request()->routeIs('manager.orders.*') ? 'bg-indigo-500/15 text-indigo-500 dark:bg-indigo-500/20 dark:text-indigo-200' : 'bg-slate-900/5 text-slate-600 dark:bg-slate-800/70 dark:text-slate-200' }}">
                <x-icon type="outline" icon="files" size="5"></x-icon>
            </span>
            Мои заказы
        </a>
    </nav>
</div>
