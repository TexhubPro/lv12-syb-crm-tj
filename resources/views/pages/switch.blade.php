<!DOCTYPE html>
<html lang="en" class="bg-white text-gray-900 dark:bg-gray-950 dark:text-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Switch Component Docs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen antialiased">
    <div class="mx-auto w-full max-w-4xl px-6 py-10">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-semibold">Switch</h1>
            <button type="button" class="text-sm underline underline-offset-4" data-theme-toggle>
                Toggle Theme
            </button>
        </div>

        <div class="mt-8 grid gap-8">
            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Usage</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-switch checked="true" />
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full" data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-nowrap block" data-code>
&lt;x-switch checked=&quot;true&quot; /&gt;
                    </code>
                    <button class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">With Label</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-switch checked="true" label="Automatic updates" />
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full" data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-nowrap block" data-code>
&lt;x-switch checked=&quot;true&quot; label=&quot;Automatic updates&quot; /&gt;
                    </code>
                    <button class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Disabled</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-switch checked="true" disabled="true" label="Automatic updates" />
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full" data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-nowrap block" data-code>
&lt;x-switch checked=&quot;true&quot; disabled=&quot;true&quot; label=&quot;Automatic updates&quot; /&gt;
                    </code>
                    <button class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Sizes</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="flex flex-wrap items-center gap-6">
                        <x-switch checked="true" size="sm" label="Small" />
                        <x-switch checked="true" size="md" label="Medium" />
                        <x-switch checked="true" size="lg" label="Large" />
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full" data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-nowrap block" data-code>
&lt;x-switch checked=&quot;true&quot; size=&quot;sm&quot; label=&quot;Small&quot; /&gt;
&lt;x-switch checked=&quot;true&quot; size=&quot;lg&quot; label=&quot;Large&quot; /&gt;
                    </code>
                    <button class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Colors</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="flex flex-wrap items-center gap-6">
                        <x-switch checked="true" color="default" label="Default" />
                        <x-switch checked="true" color="primary" label="Primary" />
                        <x-switch checked="true" color="secondary" label="Secondary" />
                        <x-switch checked="true" color="success" label="Success" />
                        <x-switch checked="true" color="warning" label="Warning" />
                        <x-switch checked="true" color="danger" label="Danger" />
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full" data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-nowrap block" data-code>
&lt;x-switch checked=&quot;true&quot; color=&quot;primary&quot; label=&quot;Primary&quot; /&gt;
                    </code>
                    <button class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">With Thumb Icon</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-switch checked="true" color="secondary" label="Dark mode">
                        <x-slot name="thumbContent">
                            <x-icon type="filled" icon="moon" size="12"></x-icon>
                        </x-slot>
                    </x-switch>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full" data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-nowrap block" data-code>
&lt;x-switch checked=&quot;true&quot; color=&quot;secondary&quot; label=&quot;Dark mode&quot;&gt;
    &lt;x-slot name=&quot;thumbContent&quot;&gt;
        &lt;x-icon type=&quot;filled&quot; icon=&quot;moon&quot; size=&quot;12&quot;&gt;&lt;/x-icon&gt;
    &lt;/x-slot&gt;
&lt;/x-switch&gt;
                    </code>
                    <button class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">With Icons</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-switch label="Dark mode" color="default">
                        <x-slot name="startContent">
                            <x-icon type="outline" icon="moon" size="12"></x-icon>
                        </x-slot>
                        <x-slot name="endContent">
                            <x-icon type="outline" icon="sun" size="12"></x-icon>
                        </x-slot>
                    </x-switch>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full" data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-nowrap block" data-code>
&lt;x-switch label=&quot;Dark mode&quot; color=&quot;default&quot;&gt;
    &lt;x-slot name=&quot;startContent&quot;&gt;
        &lt;x-icon type=&quot;outline&quot; icon=&quot;moon&quot; size=&quot;12&quot;&gt;&lt;/x-icon&gt;
    &lt;/x-slot&gt;
    &lt;x-slot name=&quot;endContent&quot;&gt;
        &lt;x-icon type=&quot;outline&quot; icon=&quot;sun&quot; size=&quot;12&quot;&gt;&lt;/x-icon&gt;
    &lt;/x-slot&gt;
&lt;/x-switch&gt;
                    </code>
                    <button class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Controlled</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-switch id="controlled-switch" checked="true" label="Airplane mode" />
                    <p class="mt-3 text-sm text-gray-500 dark:text-gray-400">Selected: <span id="switch-value">true</span></p>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full" data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-nowrap block" data-code>
&lt;x-switch id=&quot;controlled-switch&quot; checked=&quot;true&quot; label=&quot;Airplane mode&quot; /&gt;
                    </code>
                    <button class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" data-copy>Copy</button>
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

        const switchInput = document.getElementById('controlled-switch');
        const switchValue = document.getElementById('switch-value');
        if (switchInput && switchValue) {
            const update = () => {
                switchValue.textContent = switchInput.checked ? 'true' : 'false';
            };
            update();
            switchInput.addEventListener('change', update);
        }
    </script>
</body>
</html>
