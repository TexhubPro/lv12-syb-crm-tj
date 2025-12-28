<!DOCTYPE html>
<html lang="en" class="bg-slate-50 text-slate-900 dark:bg-slate-950 dark:text-slate-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Менеджер')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=JetBrains+Mono:wght@400;600&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --admin-accent: #4f46e5;
            --admin-accent-soft: rgba(79, 70, 229, 0.2);
        }

        body {
            font-family: "Space Grotesk", ui-sans-serif, sans-serif;
        }

        .admin-noise::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='140' height='140' viewBox='0 0 140 140'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='2'/%3E%3C/filter%3E%3Crect width='140' height='140' filter='url(%23n)' opacity='0.2'/%3E%3C/svg%3E");
            mix-blend-mode: soft-light;
            opacity: 0.35;
            pointer-events: none;
        }
    </style>
</head>

<body class="min-h-screen antialiased bg-slate-50 text-slate-900 dark:bg-slate-950 dark:text-slate-100">
    <div
        class="relative min-h-screen bg-[radial-gradient(circle_at_top,_rgba(79,70,229,0.18),_transparent_60%),radial-gradient(circle_at_bottom,_rgba(14,116,144,0.16),_transparent_50%)] dark:bg-[radial-gradient(circle_at_top,_rgba(79,70,229,0.22),_transparent_60%),radial-gradient(circle_at_bottom,_rgba(14,116,144,0.25),_transparent_50%)] admin-noise">
        @php
            $authUser = auth()->user();
            $userName = $authUser?->name ?? 'Пользователь';
            $userRole = match ($authUser?->role) {
                'admin' => 'Админ',
                'surveyor' => 'Замерщик',
                default => 'Менеджер',
            };
            $userPhone = $authUser?->phone;
            $avatarSrc = $authUser?->avatar;
        @endphp
        <div class="relative flex min-h-screen w-full">
            <div class="lg:hidden">
                <div class="fixed inset-0 z-30 bg-slate-900/50 opacity-0 backdrop-blur-sm transition pointer-events-none data-[state=open]:opacity-100 data-[state=open]:pointer-events-auto"
                    data-admin-overlay data-state="closed" aria-hidden="true"></div>
                <aside
                    class="fixed inset-y-0 left-0 z-40 flex w-[280px] -translate-x-full flex-col border-r border-slate-200 bg-white/95 px-6 py-6 transition data-[state=open]:translate-x-0 data-[state=open]:shadow-2xl dark:border-white/10 dark:bg-slate-950/95"
                    data-admin-sidebar data-state="closed" aria-hidden="true">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <span
                                class="flex h-11 w-11 items-center justify-center rounded-2xl bg-indigo-500/15 text-indigo-500 ring-1 ring-indigo-400/20 dark:bg-indigo-500/20 dark:text-indigo-200 dark:ring-indigo-400/30">
                                <x-icon type="outline" icon="layers-linked" size="22"></x-icon>
                            </span>
                            <div class="leading-tight">
                                <p class="text-lg font-semibold text-slate-900 dark:text-white">Soyabon Менеджер</p>
                                <p class="text-sm text-slate-500 dark:text-slate-400">Центр управления</p>
                            </div>
                        </div>
                        <x-button icon-only="true" aria-label="Закрыть меню" variant="ghost" color="default"
                            data-admin-sidebar-close>
                            <x-icon type="outline" icon="x" size="5"></x-icon>
                        </x-button>
                    </div>

                    @include('manager.partials.sidebar-nav')
                </aside>
            </div>

            <aside
                class="hidden lg:flex lg:w-[280px] lg:flex-col lg:border-r lg:border-slate-200 lg:bg-white/70 lg:px-6 lg:py-8 lg:sticky lg:top-0 lg:h-screen dark:lg:border-white/10 dark:lg:bg-slate-950/60">
                <div class="flex items-center gap-3">
                    <span
                        class="flex h-11 w-11 items-center justify-center rounded-2xl bg-indigo-500/15 text-indigo-500 ring-1 ring-indigo-400/20 dark:bg-indigo-500/20 dark:text-indigo-200 dark:ring-indigo-400/30">
                        <x-icon type="outline" icon="layers-linked" size="22"></x-icon>
                    </span>
                    <div class="leading-tight">
                        <p class="text-lg font-semibold text-slate-900 dark:text-white">Soyabon Менеджер</p>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Центр управления</p>
                    </div>
                </div>

                @include('manager.partials.sidebar-nav')
            </aside>

            <div class="flex min-h-screen w-full flex-1 flex-col">
                <header
                    class="sticky top-0 z-20 border-b border-slate-200/70 bg-white/80 backdrop-blur dark:border-white/10 dark:bg-slate-950/80">
                    <div class="px-4 py-4 md:px-6">
                        <div class="flex flex-col gap-3 lg:flex-row lg:items-center lg:w-full">
                            <div class="flex items-center justify-between lg:justify-end gap-3 lg:gap-4 lg:w-full">
                                <div class="flex items-center gap-2">
                                    <x-button icon-only="true" aria-label="Открыть меню" variant="ghost" color="default"
                                        class="lg:hidden" data-admin-sidebar-open>
                                        <x-icon type="outline" icon="menu-3" size="5"></x-icon>
                                    </x-button>
                                    <div class="flex flex-col leading-tight lg:hidden">
                                        <span
                                            class="text-sm font-semibold text-slate-900 dark:text-white">Soyabon</span>
                                        <span
                                            class="text-[11px] uppercase tracking-[0.2em] text-slate-500 dark:text-slate-500">Дашборд</span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 sm:gap-3 lg:ml-auto lg:justify-between lg:w-full">
                                    <x-button icon-only="true" aria-label="Переключить тему" variant="ghost"
                                        color="default" data-theme-toggle>
                                        <span data-theme-icon-light>
                                            <x-icon type="outline" icon="sun" size="5"></x-icon>
                                        </span>
                                        <span class="hidden" data-theme-icon-dark>
                                            <x-icon type="outline" icon="moon" size="5"></x-icon>
                                        </span>
                                    </x-button>


                                    <div class="relative" data-admin-profile>
                                        <button variant="ghost" color="default"
                                            class="group rounded-xl p-1 lg:px-1.5 border border-slate-200/70 bg-white/70 text-left transition hover:bg-slate-900/5 dark:border-white/10 dark:bg-white/5 dark:hover:bg-white/10"
                                            data-admin-profile-trigger aria-haspopup="menu" aria-expanded="false">
                                            <span class="flex items-center gap-3">
                                                <x-avatar :src="$avatarSrc" :name="$userName" size="sm"
                                                    radius="lg" tone="purple"></x-avatar>
                                                <span class="hidden text-left md:block">
                                                    <span
                                                        class="block text-sm font-medium text-slate-900 dark:text-white">{{ $userName }}</span>
                                                    <span
                                                        class="block text-xs text-slate-500 dark:text-slate-400">{{ $userRole }}</span>
                                                </span>
                                                <span
                                                    class="hidden text-slate-400 transition group-hover:text-slate-600 md:inline-flex dark:text-slate-500 dark:group-hover:text-slate-300">
                                                    <x-icon type="outline" icon="chevron-down"
                                                        size="4"></x-icon>
                                                </span>
                                            </span>
                                        </button>
                                        <div class="pointer-events-none absolute right-0 top-[110%] z-20 w-64 translate-y-2 rounded-2xl border border-slate-200/70 bg-white/95 p-2 opacity-0 shadow-xl shadow-slate-900/10 transition data-[state=open]:pointer-events-auto data-[state=open]:translate-y-0 data-[state=open]:opacity-100 dark:border-white/10 dark:bg-slate-950/95 dark:shadow-black/40"
                                            data-admin-profile-menu data-state="closed" role="menu">
                                            <div
                                                class="flex items-center gap-3 rounded-xl bg-slate-900/5 p-3 dark:bg-white/5">
                                                <x-avatar :src="$avatarSrc" :name="$userName" size="sm"
                                                    radius="lg" tone="purple"></x-avatar>
                                                <div>
                                                    <p class="text-sm font-semibold text-slate-900 dark:text-white">
                                                        {{ $userName }}</p>
                                                    <p class="text-xs text-slate-500 dark:text-slate-400">
                                                        {{ $userRole }}</p>
                                                    @if ($userPhone)
                                                        <p class="text-xs text-slate-400 dark:text-slate-500">
                                                            {{ $userPhone }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="my-2 border-t border-slate-200/70 dark:border-white/10"></div>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit"
                                                    class="flex w-full items-center gap-3 rounded-xl px-3 py-2 text-left text-sm font-medium text-rose-600 transition hover:bg-rose-50 dark:text-rose-400 dark:hover:bg-rose-500/10"
                                                    role="menuitem">
                                                    <x-icon type="outline" icon="logout" size="5"></x-icon>
                                                    Выйти
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </header>

                <main class="flex-1 px-4 pb-10 pt-8 md:px-6">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>

</html>
