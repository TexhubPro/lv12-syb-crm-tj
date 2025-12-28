<!DOCTYPE html>
<html lang="en" class="bg-white text-gray-900 dark:bg-gray-950 dark:text-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Badge Component Docs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen antialiased">
    <div class="mx-auto w-full max-w-4xl px-6 py-10">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-semibold">Badge</h1>
            <button type="button" class="text-sm underline underline-offset-4" data-theme-toggle>
                Toggle Theme
            </button>
        </div>

        <div class="mt-8 grid gap-8">
            <section class="grid gap-3">
                <div class="flex items-center gap-4 rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="relative">
                        <x-avatar src="https://i.pravatar.cc/100?img=12" />
                        <x-badge text="5" border="true" />
                    </div>
                    <div class="relative">
                        <x-avatar src="https://i.pravatar.cc/100?img=32" />
                        <x-badge text="5" border="true" variant="primary" />
                    </div>
                    <div class="relative">
                        <x-avatar src="https://i.pravatar.cc/100?img=47" />
                        <x-badge text="5" border="true" variant="secondary" />
                    </div>
                    <div class="relative">
                        <x-avatar src="https://i.pravatar.cc/100?img=58" />
                        <x-badge text="5" border="true" variant="success" />
                    </div>
                    <div class="relative">
                        <x-avatar src="https://i.pravatar.cc/100?img=68" />
                        <x-badge text="5" border="true" variant="warning" />
                    </div>
                    <div class="relative">
                        <x-avatar src="https://i.pravatar.cc/100?img=79" />
                        <x-badge text="5" border="true" variant="pink" />
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;div class=&quot;relative&quot;&gt;
                        &lt;x-avatar src=&quot;https://i.pravatar.cc/100?img=12&quot; /&gt;
                        &lt;x-badge text=&quot;5&quot; border=&quot;true&quot; /&gt;
                        &lt;/div&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Variants</h2>
                <div class="flex items-center gap-3 rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-badge text="5" inline="true" variant="default" />
                    <x-badge text="5" inline="true" variant="primary" />
                    <x-badge text="5" inline="true" variant="secondary" />
                    <x-badge text="5" inline="true" variant="success" />
                    <x-badge text="5" inline="true" variant="warning" />
                    <x-badge text="5" inline="true" variant="danger" />
                    <x-badge text="5" inline="true" variant="pink" />
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-badge text=&quot;5&quot; inline=&quot;true&quot; variant=&quot;primary&quot; /&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Dot</h2>
                <div class="flex items-center gap-4 rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="relative">
                        <x-avatar src="https://i.pravatar.cc/100?img=12" />
                        <x-badge dot="true" border="true" variant="danger" />
                    </div>
                    <div class="relative">
                        <x-avatar src="https://i.pravatar.cc/100?img=32" />
                        <x-badge dot="true" border="true" variant="success" />
                    </div>
                    <div class="relative">
                        <x-avatar src="https://i.pravatar.cc/100?img=47" />
                        <x-badge dot="true" border="true" variant="warning" />
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-badge dot=&quot;true&quot; border=&quot;true&quot; variant=&quot;danger&quot; /&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Sizes</h2>
                <div class="flex items-center gap-3 rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-badge text="1" inline="true" size="xs" />
                    <x-badge text="2" inline="true" size="sm" />
                    <x-badge text="3" inline="true" size="md" />
                    <x-badge text="4" inline="true" size="lg" />
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-badge text=&quot;1&quot; inline=&quot;true&quot; size=&quot;xs&quot; /&gt;
                        &lt;x-badge text=&quot;2&quot; inline=&quot;true&quot; size=&quot;sm&quot; /&gt;
                        &lt;x-badge text=&quot;3&quot; inline=&quot;true&quot; size=&quot;md&quot; /&gt;
                        &lt;x-badge text=&quot;4&quot; inline=&quot;true&quot; size=&quot;lg&quot; /&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Radius</h2>
                <div class="flex items-center gap-3 rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-badge text="new" inline="true" pill="false" />
                    <x-badge text="new" inline="true" pill="true" />
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-badge text=&quot;new&quot; inline=&quot;true&quot; pill=&quot;false&quot; /&gt;
                        &lt;x-badge text=&quot;new&quot; inline=&quot;true&quot; pill=&quot;true&quot; /&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>
        </div>
    </div>

    <script>
        const root = document.documentElement;
        const storedTheme = localStorage.getItem('theme');
        if (storedTheme === 'dark') root.classList.add('dark');
        if (storedTheme === 'light') root.classList.remove('dark');

        document.querySelector('[data-theme-toggle]')?.addEventListener('click', () => {
            root.classList.toggle('dark');
            localStorage.setItem('theme', root.classList.contains('dark') ? 'dark' : 'light');
        });

        document.addEventListener('click', (event) => {
            const btn = event.target.closest('[data-copy]');
            if (!btn) return;

            const codeEl = btn.closest('[data-code-row]')?.querySelector('[data-code]');
            if (!codeEl) return;

            const text = codeEl.textContent.trim();
            navigator.clipboard?.writeText(text);
            btn.textContent = 'Copied';
            setTimeout(() => (btn.textContent = 'Copy'), 1200);
        });
    </script>
</body>

</html>
