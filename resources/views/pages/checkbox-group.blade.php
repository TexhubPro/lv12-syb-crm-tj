<!DOCTYPE html>
<html lang="en" class="bg-white text-gray-900 dark:bg-gray-950 dark:text-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkbox Group Component Docs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen antialiased">
    <div class="mx-auto w-full max-w-4xl px-6 py-10">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-semibold">Checkbox Group</h1>
            <button type="button" class="text-sm underline underline-offset-4" data-theme-toggle>
                Toggle Theme
            </button>
        </div>

        <div class="mt-8 grid gap-8">
            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Usage</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-checkbox-group label="Select cities">
                        <x-checkbox label="Buenos Aires" checked="true" />
                        <x-checkbox label="Sydney" />
                        <x-checkbox label="San Francisco" />
                        <x-checkbox label="London" checked="true" />
                        <x-checkbox label="Tokyo" />
                    </x-checkbox-group>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-checkbox-group label=&quot;Select cities&quot;&gt;
                        &lt;x-checkbox label=&quot;Buenos Aires&quot; checked=&quot;true&quot; /&gt;
                        &lt;x-checkbox label=&quot;Sydney&quot; /&gt;
                        &lt;x-checkbox label=&quot;San Francisco&quot; /&gt;
                        &lt;x-checkbox label=&quot;London&quot; checked=&quot;true&quot; /&gt;
                        &lt;x-checkbox label=&quot;Tokyo&quot; /&gt;
                        &lt;/x-checkbox-group&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Disabled</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-checkbox-group label="Select cities" disabled="true">
                        <x-checkbox label="Buenos Aires" checked="true" />
                        <x-checkbox label="Sydney" />
                        <x-checkbox label="San Francisco" />
                        <x-checkbox label="London" checked="true" />
                        <x-checkbox label="Tokyo" />
                    </x-checkbox-group>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-checkbox-group label=&quot;Select cities&quot;
                        disabled=&quot;true&quot;&gt;...&lt;/x-checkbox-group&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Horizontal</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-checkbox-group label="Select cities" orientation="horizontal">
                        <x-checkbox label="Buenos Aires" checked="true" color="secondary" />
                        <x-checkbox label="Sydney" />
                        <x-checkbox label="San Francisco" checked="true" color="secondary" />
                        <x-checkbox label="London" />
                        <x-checkbox label="Tokyo" />
                    </x-checkbox-group>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-checkbox-group label=&quot;Select cities&quot;
                        orientation=&quot;horizontal&quot;&gt;...&lt;/x-checkbox-group&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Controlled</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-checkbox-group label="Select cities">
                        <x-checkbox label="Buenos Aires" name="cities" value="buenos-aires" color="warning" />
                        <x-checkbox label="Sydney" name="cities" value="sydney" color="warning" checked="true" />
                        <x-checkbox label="San Francisco" name="cities" value="san-francisco" />
                    </x-checkbox-group>
                    <p class="mt-3 text-sm text-gray-500 dark:text-gray-400">Selected: <span
                            id="group-selected">sydney</span></p>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-checkbox-group label=&quot;Select cities&quot;&gt;
                        &lt;x-checkbox label=&quot;Buenos Aires&quot; name=&quot;cities&quot;
                        value=&quot;buenos-aires&quot; /&gt;
                        &lt;x-checkbox label=&quot;Sydney&quot; name=&quot;cities&quot; value=&quot;sydney&quot;
                        checked=&quot;true&quot; /&gt;
                        &lt;x-checkbox label=&quot;San Francisco&quot; name=&quot;cities&quot;
                        value=&quot;san-francisco&quot; /&gt;
                        &lt;/x-checkbox-group&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Invalid</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-checkbox-group label="Select cities" required="true" error="Select the cities you want to visit"
                        labelClass="text-rose-600 dark:text-rose-400">
                        <x-checkbox label="Buenos Aires" color="danger" />
                        <x-checkbox label="Sydney" color="danger" />
                        <x-checkbox label="San Francisco" color="danger" />
                        <x-checkbox label="London" color="danger" />
                        <x-checkbox label="Tokyo" color="danger" />
                    </x-checkbox-group>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-checkbox-group label=&quot;Select cities&quot; required=&quot;true&quot;
                        error=&quot;Select the cities you want to visit&quot;&gt;...&lt;/x-checkbox-group&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Slots</h2>
                <div
                    class="rounded-2xl border border-gray-200 p-6 text-sm text-gray-600 dark:border-gray-800 dark:text-gray-300">
                    <p class="mb-3">Available slots:</p>
                    <ul class="list-disc pl-5">
                        <li><span class="font-semibold">default</span>: checkboxes list.</li>
                        <li><span class="font-semibold">labelContent</span>: custom label content before list.</li>
                    </ul>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Custom Styles</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-checkbox-group label="Select employees"
                        itemsClass="grid gap-4 rounded-xl border border-blue-500 p-4" labelClass="text-gray-700">
                        <x-checkbox class="items-center" label="Junior Garcia" description="@jrgarciadev"
                            checked="true" />
                        <x-checkbox class="items-center" label="John Doe" description="@johndoe" checked="true" />
                        <x-checkbox class="items-center" label="Zoey Lang" description="@zoeylang" checked="true" />
                        <x-checkbox class="items-center" label="William Howard" description="@william" />
                    </x-checkbox-group>
                    <p class="mt-3 text-sm text-gray-500 dark:text-gray-400">Selected: johndoe, junior, zoeylang</p>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-checkbox-group label=&quot;Select employees&quot; itemsClass=&quot;grid gap-4 rounded-xl
                        border border-blue-500 p-4&quot;&gt;
                        &lt;x-checkbox label=&quot;Junior Garcia&quot; description=&quot;@jrgarciadev&quot;
                        checked=&quot;true&quot; /&gt;
                        &lt;x-checkbox label=&quot;John Doe&quot; description=&quot;@johndoe&quot;
                        checked=&quot;true&quot; /&gt;
                        &lt;x-checkbox label=&quot;Zoey Lang&quot; description=&quot;@zoeylang&quot;
                        checked=&quot;true&quot; /&gt;
                        &lt;x-checkbox label=&quot;William Howard&quot; description=&quot;@william&quot; /&gt;
                        &lt;/x-checkbox-group&gt;
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

        const updateSelected = () => {
            const selected = Array.from(document.querySelectorAll('input[name="cities"]:checked')).map((el) => el
            .value);
            const target = document.getElementById('group-selected');
            if (target) target.textContent = selected.length ? selected.join(', ') : 'none';
        };
        document.addEventListener('change', (event) => {
            if (event.target?.matches('input[name="cities"]')) updateSelected();
        });
        updateSelected();
    </script>
</body>

</html>
