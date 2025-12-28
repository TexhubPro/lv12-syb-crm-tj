<!DOCTYPE html>
<html lang="en" class="bg-white text-gray-900 dark:bg-gray-950 dark:text-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radio Group Component Docs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen antialiased">
    <div class="mx-auto w-full max-w-4xl px-6 py-10">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-semibold">Radio Group</h1>
            <button type="button" class="text-sm underline underline-offset-4" data-theme-toggle>
                Toggle Theme
            </button>
        </div>

        <div class="mt-8 grid gap-8">
            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Usage</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-radio-group label="Select your favorite city">
                        <x-radio name="city" value="buenos" label="Buenos Aires" />
                        <x-radio name="city" value="sydney" label="Sydney" />
                        <x-radio name="city" value="san-francisco" label="San Francisco" />
                        <x-radio name="city" value="london" label="London" />
                        <x-radio name="city" value="tokyo" label="Tokyo" />
                    </x-radio-group>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-wrap block" data-code>
                        &lt;x-radio-group label=&quot;Select your favorite city&quot;&gt;
                        &lt;x-radio name=&quot;city&quot; value=&quot;buenos&quot; label=&quot;Buenos Aires&quot; /&gt;
                        &lt;x-radio name=&quot;city&quot; value=&quot;sydney&quot; label=&quot;Sydney&quot; /&gt;
                        &lt;x-radio name=&quot;city&quot; value=&quot;san-francisco&quot; label=&quot;San
                        Francisco&quot; /&gt;
                        &lt;x-radio name=&quot;city&quot; value=&quot;london&quot; label=&quot;London&quot; /&gt;
                        &lt;x-radio name=&quot;city&quot; value=&quot;tokyo&quot; label=&quot;Tokyo&quot; /&gt;
                        &lt;/x-radio-group&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Disabled</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-radio-group label="Select your favorite city" disabled="true">
                        <x-radio name="city-disabled" value="buenos" label="Buenos Aires" />
                        <x-radio name="city-disabled" value="sydney" label="Sydney" />
                        <x-radio name="city-disabled" value="san-francisco" label="San Francisco" />
                        <x-radio name="city-disabled" value="london" label="London" />
                        <x-radio name="city-disabled" value="tokyo" label="Tokyo" />
                    </x-radio-group>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-wrap block" data-code>
                        &lt;x-radio-group label=&quot;Select your favorite city&quot; disabled=&quot;true&quot;&gt;
                        &lt;x-radio name=&quot;city-disabled&quot; value=&quot;buenos&quot; label=&quot;Buenos
                        Aires&quot; /&gt;
                        &lt;/x-radio-group&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">With Description</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-radio-group label="Select your favorite city">
                        <x-radio name="city-desc" value="buenos" label="Buenos Aires"
                            description="The capital of Argentina" color="warning" checked="true" />
                        <x-radio name="city-desc" value="canberra" label="Canberra"
                            description="The capital of Australia" />
                        <x-radio name="city-desc" value="london" label="London" description="The capital of England" />
                        <x-radio name="city-desc" value="tokyo" label="Tokyo" description="The capital of Japan" />
                    </x-radio-group>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-wrap block" data-code>
                        &lt;x-radio label=&quot;Buenos Aires&quot; description=&quot;The capital of Argentina&quot;
                        color=&quot;warning&quot; checked=&quot;true&quot; /&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Horizontal</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-radio-group label="Select your favorite city" orientation="horizontal">
                        <x-radio name="city-horizontal" value="buenos" label="Buenos Aires" />
                        <x-radio name="city-horizontal" value="sydney" label="Sydney" />
                        <x-radio name="city-horizontal" value="san-francisco" label="San Francisco" />
                        <x-radio name="city-horizontal" value="london" label="London" />
                        <x-radio name="city-horizontal" value="tokyo" label="Tokyo" />
                    </x-radio-group>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-wrap block" data-code>
                        &lt;x-radio-group label=&quot;Select your favorite city&quot;
                        orientation=&quot;horizontal&quot;&gt;
                        &lt;x-radio name=&quot;city-horizontal&quot; value=&quot;buenos&quot; label=&quot;Buenos
                        Aires&quot; /&gt;
                        &lt;/x-radio-group&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Controlled</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-radio-group label="Select your favorite city">
                        <x-radio name="city-controlled" value="buenos" label="Buenos Aires" />
                        <x-radio name="city-controlled" value="sydney" label="Sydney" />
                        <x-radio name="city-controlled" value="san-francisco" label="San Francisco" />
                        <x-radio name="city-controlled" value="london" label="London" checked="true" />
                        <x-radio name="city-controlled" value="tokyo" label="Tokyo" />
                    </x-radio-group>
                    <p class="mt-3 text-sm text-gray-500 dark:text-gray-400">Selected: <span
                            data-radio-value>london</span></p>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-wrap block" data-code>
                        &lt;x-radio name=&quot;city-controlled&quot; value=&quot;london&quot; label=&quot;London&quot;
                        checked=&quot;true&quot; /&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Invalid</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-radio-group label="Select your favorite city" error="Please select a city.">
                        <x-radio name="city-invalid" value="buenos" label="Buenos Aires" color="danger"
                            invalid="true" />
                        <x-radio name="city-invalid" value="sydney" label="Sydney" color="danger" invalid="true" />
                        <x-radio name="city-invalid" value="san-francisco" label="San Francisco" color="danger"
                            invalid="true" />
                        <x-radio name="city-invalid" value="london" label="London" color="danger" invalid="true"
                            checked="true" />
                        <x-radio name="city-invalid" value="tokyo" label="Tokyo" color="danger" invalid="true" />
                    </x-radio-group>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Selected: london</p>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-wrap block" data-code>
                        &lt;x-radio name=&quot;city-invalid&quot; value=&quot;london&quot; label=&quot;London&quot;
                        color=&quot;danger&quot; invalid=&quot;true&quot; checked=&quot;true&quot; /&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Sizes</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="flex flex-wrap items-center gap-6">
                        <x-radio name="size" value="sm" label="Small" size="sm" checked="true" />
                        <x-radio name="size" value="md" label="Medium" size="md" checked="true" />
                        <x-radio name="size" value="lg" label="Large" size="lg" checked="true" />
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-wrap block" data-code>
                        &lt;x-radio name=&quot;size&quot; value=&quot;sm&quot; label=&quot;Small&quot;
                        size=&quot;sm&quot; checked=&quot;true&quot; /&gt;
                        &lt;x-radio name=&quot;size&quot; value=&quot;lg&quot; label=&quot;Large&quot;
                        size=&quot;lg&quot; checked=&quot;true&quot; /&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Colors</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="flex flex-wrap items-center gap-6">
                        <x-radio name="color" value="default" label="Default" color="default" checked="true" />
                        <x-radio name="color" value="primary" label="Primary" color="primary" checked="true" />
                        <x-radio name="color" value="secondary" label="Secondary" color="secondary"
                            checked="true" />
                        <x-radio name="color" value="success" label="Success" color="success" checked="true" />
                        <x-radio name="color" value="warning" label="Warning" color="warning" checked="true" />
                        <x-radio name="color" value="danger" label="Danger" color="danger" checked="true" />
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-wrap block" data-code>
                        &lt;x-radio name=&quot;color&quot; value=&quot;primary&quot; label=&quot;Primary&quot;
                        color=&quot;primary&quot; checked=&quot;true&quot; /&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Card Style</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-radio-group label="Plans" items-class="grid gap-4">
                        <x-radio name="plan" value="free" label="Free" description="Up to 20 items"
                            class="w-full items-start rounded-2xl border border-gray-200 p-4 dark:border-gray-800 has-[input:checked]:border-blue-500/60 has-[input:checked]:ring-2 has-[input:checked]:ring-blue-500/20" />
                        <x-radio name="plan" value="pro" label="Pro"
                            description="Unlimited items. $10 per month."
                            class="w-full items-start rounded-2xl border border-gray-200 p-4 dark:border-gray-800 has-[input:checked]:border-blue-500/60 has-[input:checked]:ring-2 has-[input:checked]:ring-blue-500/20"
                            color="primary" checked="true" />
                        <x-radio name="plan" value="enterprise" label="Enterprise"
                            description="24/7 support. Contact us for pricing."
                            class="w-full items-start rounded-2xl border border-gray-200 p-4 dark:border-gray-800 has-[input:checked]:border-blue-500/60 has-[input:checked]:ring-2 has-[input:checked]:ring-blue-500/20" />
                    </x-radio-group>
                    <p class="mt-3 text-sm text-gray-500 dark:text-gray-400">Selected plan can be changed at any time.
                    </p>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-wrap block" data-code>
                        &lt;x-radio name=&quot;plan&quot; value=&quot;pro&quot; label=&quot;Pro&quot;
                        description=&quot;Unlimited items. $10 per month.&quot;
                        class=&quot;w-full items-start rounded-2xl border border-gray-200 p-4 has-[input:checked]:border-blue-500/60&quot;
                        color=&quot;primary&quot; checked=&quot;true&quot; /&gt;
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

        document.addEventListener('change', (event) => {
            const input = event.target.closest('input[type="radio"][name="city-controlled"]');
            if (!input) return;
            const value = document.querySelector('input[name="city-controlled"]:checked')?.value || '-';
            document.querySelector('[data-radio-value]')?.textContent = value;
        });
    </script>
</body>

</html>
