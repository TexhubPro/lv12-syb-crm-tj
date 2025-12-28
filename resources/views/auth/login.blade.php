<!DOCTYPE html>
<html lang="en" class="bg-slate-50 text-slate-900 dark:bg-slate-950 dark:text-slate-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=JetBrains+Mono:wght@400;600&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: "Space Grotesk", ui-sans-serif, sans-serif;
        }
    </style>
</head>

<body class="min-h-screen antialiased">
    <div
        class="relative flex min-h-screen items-center justify-center bg-[radial-gradient(circle_at_top,_rgba(79,70,229,0.18),_transparent_60%),radial-gradient(circle_at_bottom,_rgba(14,116,144,0.16),_transparent_50%)] px-4 py-10 dark:bg-[radial-gradient(circle_at_top,_rgba(79,70,229,0.22),_transparent_60%),radial-gradient(circle_at_bottom,_rgba(14,116,144,0.25),_transparent_50%)]">
        <div
            class="relative w-full max-w-md rounded-[32px] border border-slate-200/70 bg-white/90 p-8 shadow-xl shadow-slate-900/10 backdrop-blur dark:border-white/10 dark:bg-slate-950/80 dark:shadow-black/40">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs uppercase tracking-[0.4em] text-slate-500">Безопасно</p>
                    <h1 class="mt-2 text-2xl font-semibold text-slate-900 dark:text-white">Вход в админку</h1>
                </div>
                <x-button icon-only="true" aria-label="Переключить тему" variant="ghost" color="default"
                    data-theme-toggle>
                    <span data-theme-icon-light>
                        <x-icon type="outline" icon="sun" size="5"></x-icon>
                    </span>
                    <span class="hidden" data-theme-icon-dark>
                        <x-icon type="outline" icon="moon" size="5"></x-icon>
                    </span>
                </x-button>
            </div>

            <p class="mt-3 text-sm text-slate-500 dark:text-slate-400">
                Войдите по номеру телефона, чтобы управлять рабочим пространством.
            </p>

            <form class="mt-6 grid gap-4" method="POST" action="{{ route('login') }}">
                @csrf
                @if (session('status'))
                    <x-alert variant="success" title="Готово">
                        {{ session('status') }}
                    </x-alert>
                @endif
                @if ($errors->any())
                    <x-alert variant="danger" title="Ошибка входа">
                        Проверьте номер телефона и пароль.
                    </x-alert>
                @endif
                <x-input label="Номер телефона" name="phone" type="tel" value="{{ old('phone') }}"
                    required="true" :invalid="$errors->has('phone')" :error-message="$errors->first('phone')" placeholder="931234567" />
                <x-input label="Пароль" name="password" type="password" required="true" toggle-password="true"
                    :invalid="$errors->has('password')" :error-message="$errors->first('password')" placeholder="••••••••" />

                <x-button type="submit" size="lg" variant="solid" color="primary" class="mt-2 w-full">
                    Войти
                </x-button>
            </form>

            <div
                class="mt-6 rounded-2xl border border-slate-200/70 bg-slate-900/5 p-4 text-xs text-slate-500 dark:border-white/10 dark:bg-white/5 dark:text-slate-400">
                Используйте номер телефона и пароль, выданные администратором.
            </div>
        </div>
    </div>
</body>

</html>
