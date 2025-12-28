<!DOCTYPE html>
<html lang="en" class="bg-white text-gray-900 dark:bg-gray-950 dark:text-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accordion Component Docs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/js/app.js')
</head>

<body class="min-h-screen antialiased">
    <div class="mx-auto w-full max-w-4xl px-6 py-10">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-semibold">Accordion</h1>
            <button type="button" class="text-sm underline underline-offset-4" data-theme-toggle>
                Toggle Theme
            </button>
        </div>

        <div class="mt-8 grid gap-8">
            <section class="grid gap-3">
                <x-accordion :multiple="false" :border="true">
                    <x-accordion.item title="Accordion 1" :open="true">
                        Content for the first item.
                    </x-accordion.item>
                    <x-accordion.item title="Accordion 2">
                        Content for the second item.
                    </x-accordion.item>
                    <x-accordion.item title="Accordion 3">
                        Content for the third item.
                    </x-accordion.item>
                </x-accordion>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-accordion :multiple=&quot;false&quot; :border=&quot;true&quot;&gt;
                        &lt;x-accordion.item title=&quot;Accordion 1&quot; :open=&quot;true&quot;&gt;Content for the
                        first item.&lt;/x-accordion.item&gt;
                        &lt;x-accordion.item title=&quot;Accordion 2&quot;&gt;Content for the second
                        item.&lt;/x-accordion.item&gt;
                        &lt;x-accordion.item title=&quot;Accordion 3&quot;&gt;Content for the third
                        item.&lt;/x-accordion.item&gt;
                        &lt;/x-accordion&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <x-accordion radius="none" :border="true">
                    <x-accordion.item title="Radius none" :open="true">Sharp corners.</x-accordion.item>
                    <x-accordion.item title="Second item">More content.</x-accordion.item>
                </x-accordion>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-accordion radius=&quot;none&quot; :border=&quot;true&quot;&gt;
                        &lt;x-accordion.item title=&quot;Radius none&quot; :open=&quot;true&quot;&gt;Sharp
                        corners.&lt;/x-accordion.item&gt;
                        &lt;x-accordion.item title=&quot;Second item&quot;&gt;More content.&lt;/x-accordion.item&gt;
                        &lt;/x-accordion&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <x-accordion variant="primary" :border="true">
                    <x-accordion.item title="Primary item" :open="true">Primary content.</x-accordion.item>
                    <x-accordion.item title="Second item">More content.</x-accordion.item>
                </x-accordion>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-accordion variant=&quot;primary&quot; :border=&quot;true&quot;&gt;
                        &lt;x-accordion.item title=&quot;Primary item&quot; :open=&quot;true&quot;&gt;Primary
                        content.&lt;/x-accordion.item&gt;
                        &lt;x-accordion.item title=&quot;Second item&quot;&gt;More content.&lt;/x-accordion.item&gt;
                        &lt;/x-accordion&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <x-accordion variant="success" :border="true" radius="lg">
                    <x-accordion.item title="Success item" :open="true">Success content.</x-accordion.item>
                    <x-accordion.item title="Another item">More content.</x-accordion.item>
                </x-accordion>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-accordion variant=&quot;success&quot; :border=&quot;true&quot; radius=&quot;lg&quot;&gt;
                        &lt;x-accordion.item title=&quot;Success item&quot; :open=&quot;true&quot;&gt;Success
                        content.&lt;/x-accordion.item&gt;
                        &lt;x-accordion.item title=&quot;Another item&quot;&gt;More content.&lt;/x-accordion.item&gt;
                        &lt;/x-accordion&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <x-accordion variant="warning" :border="false">
                    <x-accordion.item title="Borderless item" :open="true">No border style.</x-accordion.item>
                    <x-accordion.item title="Second item">More content.</x-accordion.item>
                </x-accordion>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-accordion variant=&quot;warning&quot; :border=&quot;false&quot;&gt;
                        &lt;x-accordion.item title=&quot;Borderless item&quot; :open=&quot;true&quot;&gt;No border
                        style.&lt;/x-accordion.item&gt;
                        &lt;x-accordion.item title=&quot;Second item&quot;&gt;More content.&lt;/x-accordion.item&gt;
                        &lt;/x-accordion&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <x-accordion variant="secondary" :border="true" :multiple="true">
                    <x-accordion.item title="Multiple item 1" :open="true">Open together.</x-accordion.item>
                    <x-accordion.item title="Multiple item 2" :open="true">Open together.</x-accordion.item>
                    <x-accordion.item title="Multiple item 3">Open together.</x-accordion.item>
                </x-accordion>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-accordion variant=&quot;secondary&quot; :border=&quot;true&quot;
                        :multiple=&quot;true&quot;&gt;
                        &lt;x-accordion.item title=&quot;Multiple item 1&quot; :open=&quot;true&quot;&gt;Open
                        together.&lt;/x-accordion.item&gt;
                        &lt;x-accordion.item title=&quot;Multiple item 2&quot; :open=&quot;true&quot;&gt;Open
                        together.&lt;/x-accordion.item&gt;
                        &lt;x-accordion.item title=&quot;Multiple item 3&quot;&gt;Open
                        together.&lt;/x-accordion.item&gt;
                        &lt;/x-accordion&gt;
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
