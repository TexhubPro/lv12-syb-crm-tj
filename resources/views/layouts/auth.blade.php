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
    @livewireStyles
    <style>
        body {
            font-family: "Space Grotesk", ui-sans-serif, sans-serif;
        }
    </style>
</head>

<body class="min-h-screen antialiased">
    <div
        class="relative flex min-h-screen items-center justify-center bg-[radial-gradient(circle_at_top,_rgba(79,70,229,0.18),_transparent_60%),radial-gradient(circle_at_bottom,_rgba(14,116,144,0.16),_transparent_50%)] px-4 py-10 dark:bg-[radial-gradient(circle_at_top,_rgba(79,70,229,0.22),_transparent_60%),radial-gradient(circle_at_bottom,_rgba(14,116,144,0.25),_transparent_50%)]">
        {{ $slot }}
    </div>

    @livewireScripts
</body>

</html>
