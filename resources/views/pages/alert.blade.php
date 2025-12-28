<!DOCTYPE html>
<html lang="en" class="bg-white text-gray-900 dark:bg-gray-950 dark:text-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alert Component Docs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen antialiased max-w-screen">
    <div class="mx-auto w-full max-w-4xl px-6 py-10">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-semibold">Alert</h1>
            <button type="button" class="text-sm underline underline-offset-4" data-theme-toggle>
                Toggle Theme
            </button>
        </div>

        <div class="mt-8 grid gap-6">
            <section class="grid gap-3">
                <x-alert variant="default" radius="2xl" border="false" icon="true" close="false">Default
                    variant</x-alert>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>&lt;x-alert
                        variant="default"
                        radius="2xl" border="false" icon="true" close="false"&gt;Default
                        variant&lt;/x-alert&gt;</code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <x-alert variant="primary" radius="2xl" border="false" icon="true" close="false">Primary
                    variant</x-alert>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>&lt;x-alert
                        variant="primary"
                        radius="2xl" border="false" icon="true" close="false"&gt;Primary
                        variant&lt;/x-alert&gt;</code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <x-alert variant="secondary" radius="2xl" border="false" icon="true" close="false">Secondary
                    variant</x-alert>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>&lt;x-alert
                        variant="secondary"
                        radius="2xl" border="false" icon="true" close="false"&gt;Secondary
                        variant&lt;/x-alert&gt;</code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <x-alert variant="success" radius="2xl" border="false" icon="true" close="false">Success
                    variant</x-alert>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>&lt;x-alert
                        variant="success"
                        radius="2xl" border="false" icon="true" close="false"&gt;Success
                        variant&lt;/x-alert&gt;</code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <x-alert variant="warning" radius="2xl" border="false" icon="true" close="false">Warning
                    variant</x-alert>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>&lt;x-alert
                        variant="warning"
                        radius="2xl" border="false" icon="true" close="false"&gt;Warning
                        variant&lt;/x-alert&gt;</code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <x-alert variant="danger" radius="2xl" border="false" icon="true" close="false">Danger
                    variant</x-alert>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>&lt;x-alert
                        variant="danger"
                        radius="2xl" border="false" icon="true" close="false"&gt;Danger
                        variant&lt;/x-alert&gt;</code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <x-alert variant="default" radius="none" border="false" icon="true" close="false">Radius
                    none</x-alert>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>&lt;x-alert
                        variant="default"
                        radius="none" border="false" icon="true" close="false"&gt;Radius
                        none&lt;/x-alert&gt;</code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <x-alert variant="default" radius="sm" border="false" icon="true" close="false">Radius
                    sm</x-alert>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>&lt;x-alert
                        variant="default"
                        radius="sm" border="false" icon="true" close="false"&gt;Radius
                        sm&lt;/x-alert&gt;</code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <x-alert variant="default" radius="md" border="false" icon="true" close="false">Radius
                    md</x-alert>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>&lt;x-alert
                        variant="default"
                        radius="md" border="false" icon="true" close="false"&gt;Radius
                        md&lt;/x-alert&gt;</code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <x-alert variant="default" radius="lg" border="false" icon="true" close="false">Radius
                    lg</x-alert>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>&lt;x-alert
                        variant="default"
                        radius="lg" border="false" icon="true" close="false"&gt;Radius
                        lg&lt;/x-alert&gt;</code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <x-alert variant="default" radius="full" border="false" icon="true" close="false">Radius
                    full</x-alert>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>&lt;x-alert
                        variant="default"
                        radius="full" border="false" icon="true" close="false"&gt;Radius
                        full&lt;/x-alert&gt;</code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <x-alert variant="success" radius="2xl" border="true" icon="true" close="false">Border
                    enabled</x-alert>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>&lt;x-alert
                        variant="success"
                        radius="2xl" border="true" icon="true" close="false"&gt;Border
                        enabled&lt;/x-alert&gt;</code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <x-alert variant="warning" radius="2xl" border="false" icon="false" close="false">Icon
                    disabled</x-alert>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>&lt;x-alert
                        variant="warning"
                        radius="2xl" border="false" icon="false" close="false"&gt;Icon
                        disabled&lt;/x-alert&gt;</code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <x-alert variant="primary" radius="2xl" border="false" icon="true" title="Primary title"
                    close="false">Title example</x-alert>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>&lt;x-alert
                        variant="primary"
                        radius="2xl" border="false" icon="true" title="Primary title" close="false"&gt;Title
                        example&lt;/x-alert&gt;</code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <x-alert variant="success" radius="2xl" border="false" icon="true" close="true">Closable
                    alert</x-alert>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>&lt;x-alert
                        variant="success"
                        radius="2xl" border="false" icon="true" close="true"&gt;Closable
                        alert&lt;/x-alert&gt;</code>
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
