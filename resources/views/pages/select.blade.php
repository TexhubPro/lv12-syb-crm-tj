<!DOCTYPE html>
<html lang="en" class="bg-white text-gray-900 dark:bg-gray-950 dark:text-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Component Docs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen antialiased">
    <div class="mx-auto w-full max-w-4xl px-6 py-10">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-semibold">Select</h1>
            <button type="button" class="text-sm underline underline-offset-4" data-theme-toggle>
                Toggle Theme
            </button>
        </div>

        <div class="mt-8 grid gap-8">
            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Usage</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-select label="Country" name="country">
                        <option value="us">United States</option>
                        <option value="uk">United Kingdom</option>
                        <option value="ca">Canada</option>
                    </x-select>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-wrap block" data-code>
                        &lt;x-select label=&quot;Country&quot; name=&quot;country&quot;&gt;
                        &lt;option value=&quot;us&quot;&gt;United States&lt;/option&gt;
                        &lt;option value=&quot;uk&quot;&gt;United Kingdom&lt;/option&gt;
                        &lt;option value=&quot;ca&quot;&gt;Canada&lt;/option&gt;
                        &lt;/x-select&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Placeholder</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-select label="City" placeholder="Select a city">
                        <option value="buenos">Buenos Aires</option>
                        <option value="london">London</option>
                        <option value="tokyo">Tokyo</option>
                    </x-select>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-wrap block" data-code>
                        &lt;x-select label=&quot;City&quot; placeholder=&quot;Select a city&quot;&gt;
                        &lt;option value=&quot;buenos&quot;&gt;Buenos Aires&lt;/option&gt;
                        &lt;option value=&quot;london&quot;&gt;London&lt;/option&gt;
                        &lt;option value=&quot;tokyo&quot;&gt;Tokyo&lt;/option&gt;
                        &lt;/x-select&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Disabled</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-select label="Country" disabled="true">
                        <option>United States</option>
                        <option>United Kingdom</option>
                        <option>Canada</option>
                    </x-select>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-wrap block" data-code>
                        &lt;x-select label=&quot;Country&quot; disabled=&quot;true&quot;&gt;
                        &lt;option&gt;United States&lt;/option&gt;
                        &lt;option&gt;United Kingdom&lt;/option&gt;
                        &lt;option&gt;Canada&lt;/option&gt;
                        &lt;/x-select&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Label Placement</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="grid gap-4">
                        <x-select label="Country" label-placement="outside">
                            <option>United States</option>
                            <option>United Kingdom</option>
                        </x-select>
                        <x-select label="Country" label-placement="inside">
                            <option>United States</option>
                            <option>United Kingdom</option>
                        </x-select>
                        <x-select label="Country" label-placement="outside-left">
                            <option>United States</option>
                            <option>United Kingdom</option>
                        </x-select>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-wrap block" data-code>
                        &lt;x-select label=&quot;Country&quot;
                        label-placement=&quot;inside&quot;&gt;...&lt;/x-select&gt;
                        &lt;x-select label=&quot;Country&quot;
                        label-placement=&quot;outside-left&quot;&gt;...&lt;/x-select&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">With Description</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-select label="Plan" description="Select a plan for your team.">
                        <option>Free</option>
                        <option>Pro</option>
                        <option>Enterprise</option>
                    </x-select>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-wrap block" data-code>
                        &lt;x-select label=&quot;Plan&quot; description=&quot;Select a plan for your
                        team.&quot;&gt;...&lt;/x-select&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Error Message</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-select label="Country" invalid="true" error-message="Please select a country.">
                        <option>United States</option>
                        <option>United Kingdom</option>
                        <option>Canada</option>
                    </x-select>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-wrap block" data-code>
                        &lt;x-select label=&quot;Country&quot; invalid=&quot;true&quot; error-message=&quot;Please
                        select a country.&quot;&gt;...&lt;/x-select&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Sizes</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="grid gap-4">
                        <x-select label="Small" size="sm">
                            <option>Small</option>
                        </x-select>
                        <x-select label="Medium" size="md">
                            <option>Medium</option>
                        </x-select>
                        <x-select label="Large" size="lg">
                            <option>Large</option>
                        </x-select>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-wrap block" data-code>
                        &lt;x-select label=&quot;Small&quot; size=&quot;sm&quot;&gt;...&lt;/x-select&gt;
                        &lt;x-select label=&quot;Large&quot; size=&quot;lg&quot;&gt;...&lt;/x-select&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Radius</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="grid gap-4">
                        <x-select label="None" radius="none">
                            <option>None</option>
                        </x-select>
                        <x-select label="Small" radius="sm">
                            <option>Small</option>
                        </x-select>
                        <x-select label="Medium" radius="md">
                            <option>Medium</option>
                        </x-select>
                        <x-select label="Large" radius="lg">
                            <option>Large</option>
                        </x-select>
                        <x-select label="Full" radius="full">
                            <option>Full</option>
                        </x-select>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-wrap block" data-code>
                        &lt;x-select label=&quot;Full&quot; radius=&quot;full&quot;&gt;...&lt;/x-select&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Variants</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="grid gap-4">
                        <x-select label="Filled" variant="filled">
                            <option>Filled</option>
                        </x-select>
                        <x-select label="Outline" variant="outline">
                            <option>Outline</option>
                        </x-select>
                        <x-select label="Flat" variant="flat">
                            <option>Flat</option>
                        </x-select>
                        <x-select label="Underlined" variant="underlined">
                            <option>Underlined</option>
                        </x-select>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-wrap block" data-code>
                        &lt;x-select label=&quot;Filled&quot; variant=&quot;filled&quot;&gt;...&lt;/x-select&gt;
                        &lt;x-select label=&quot;Underlined&quot; variant=&quot;underlined&quot;&gt;...&lt;/x-select&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Colors</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="grid gap-4">
                        <x-select label="Default" color="default">
                            <option>Default</option>
                        </x-select>
                        <x-select label="Primary" color="primary">
                            <option>Primary</option>
                        </x-select>
                        <x-select label="Secondary" color="secondary">
                            <option>Secondary</option>
                        </x-select>
                        <x-select label="Success" color="success">
                            <option>Success</option>
                        </x-select>
                        <x-select label="Warning" color="warning">
                            <option>Warning</option>
                        </x-select>
                        <x-select label="Danger" color="danger">
                            <option>Danger</option>
                        </x-select>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-wrap block" data-code>
                        &lt;x-select label=&quot;Primary&quot; color=&quot;primary&quot;&gt;...&lt;/x-select&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Controlled</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-select id="controlled-select" label="Country">
                        <option value="us">United States</option>
                        <option value="uk">United Kingdom</option>
                        <option value="ca">Canada</option>
                    </x-select>
                    <p class="mt-3 text-sm text-gray-500 dark:text-gray-400">Selected: <span
                            id="controlled-value">-</span></p>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-wrap block" data-code>
                        &lt;x-select id=&quot;controlled-select&quot; label=&quot;Country&quot;&gt;...&lt;/x-select&gt;
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

        const select = document.getElementById('controlled-select');
        const valueEl = document.getElementById('controlled-value');
        if (select && valueEl) {
            const update = () => {
                valueEl.textContent = select.value || '-';
            };
            update();
            select.addEventListener('change', update);
        }
    </script>
</body>

</html>
