<!DOCTYPE html>
<html lang="en" class="bg-white text-gray-900 dark:bg-gray-950 dark:text-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkbox Component Docs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen antialiased">
    <div class="mx-auto w-full max-w-4xl px-6 py-10">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-semibold">Checkbox</h1>
            <button type="button" class="text-sm underline underline-offset-4" data-theme-toggle>
                Toggle Theme
            </button>
        </div>

        <div class="mt-8 grid gap-8">
            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Usage</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-checkbox label="Option" checked="true" />
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-checkbox label=&quot;Option&quot; checked=&quot;true&quot; /&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Disabled</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="flex items-center gap-6">
                        <x-checkbox label="Option" disabled="true" />
                        <x-checkbox label="Option" checked="true" disabled="true" />
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-checkbox label=&quot;Option&quot; disabled=&quot;true&quot; /&gt;
                        &lt;x-checkbox label=&quot;Option&quot; checked=&quot;true&quot; disabled=&quot;true&quot; /&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Sizes</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="flex items-center gap-6">
                        <x-checkbox label="Small" size="sm" checked="true" />
                        <x-checkbox label="Medium" size="md" checked="true" />
                        <x-checkbox label="Large" size="lg" checked="true" />
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-checkbox label=&quot;Small&quot; size=&quot;sm&quot; checked=&quot;true&quot; /&gt;
                        &lt;x-checkbox label=&quot;Medium&quot; size=&quot;md&quot; checked=&quot;true&quot; /&gt;
                        &lt;x-checkbox label=&quot;Large&quot; size=&quot;lg&quot; checked=&quot;true&quot; /&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Colors</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="flex flex-wrap gap-6">
                        <x-checkbox label="Default" color="default" checked="true" />
                        <x-checkbox label="Primary" color="primary" checked="true" />
                        <x-checkbox label="Secondary" color="secondary" checked="true" />
                        <x-checkbox label="Success" color="success" checked="true" />
                        <x-checkbox label="Warning" color="warning" checked="true" />
                        <x-checkbox label="Danger" color="danger" checked="true" />
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-checkbox label=&quot;Primary&quot; color=&quot;primary&quot; checked=&quot;true&quot;
                        /&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Radius</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="flex flex-wrap gap-6">
                        <x-checkbox label="Full" radius="full" checked="true" />
                        <x-checkbox label="Large" radius="lg" checked="true" />
                        <x-checkbox label="Medium" radius="md" checked="true" />
                        <x-checkbox label="Small" radius="sm" checked="true" />
                        <x-checkbox label="None" radius="none" checked="true" />
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-checkbox label=&quot;Full&quot; radius=&quot;full&quot; checked=&quot;true&quot; /&gt;
                        &lt;x-checkbox label=&quot;None&quot; radius=&quot;none&quot; checked=&quot;true&quot; /&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Indeterminate</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-checkbox label="Option" indeterminate="true" />
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-checkbox label=&quot;Option&quot; indeterminate=&quot;true&quot; /&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">With Icons</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="flex items-center gap-6">
                        <x-checkbox label="Option" checked="true" icon="heart" />
                        <x-checkbox label="Option" checked="true" color="warning" icon="plus" />
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-checkbox label=&quot;Option&quot; checked=&quot;true&quot; icon=&quot;heart&quot; /&gt;
                        &lt;x-checkbox label=&quot;Option&quot; checked=&quot;true&quot; color=&quot;warning&quot;
                        icon=&quot;plus&quot; /&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Controlled</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-checkbox id="controlled-checkbox" label="Subscribe (controlled)" />
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Selected: <span
                            id="controlled-state">false</span></p>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-checkbox id=&quot;controlled-checkbox&quot; label=&quot;Subscribe (controlled)&quot; /&gt;
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

        const controlled = document.getElementById('controlled-checkbox');
        const controlledState = document.getElementById('controlled-state');
        if (controlled && controlledState) {
            const update = () => {
                controlledState.textContent = controlled.checked ? 'true' : 'false';
            };
            update();
            controlled.addEventListener('change', update);
        }
    </script>
</body>

</html>
