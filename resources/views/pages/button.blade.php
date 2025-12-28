<!DOCTYPE html>
<html lang="en" class="bg-white text-gray-900 dark:bg-gray-950 dark:text-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Button Component Docs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen antialiased">
    <div class="mx-auto w-full max-w-4xl px-6 py-10">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-semibold">Button</h1>
            <button type="button" class="text-sm underline underline-offset-4" data-theme-toggle>
                Toggle Theme
            </button>
        </div>

        <div class="mt-8 grid gap-8">
            <section class="grid gap-3">
                <x-button color="primary">Button</x-button>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-button color=&quot;primary&quot;&gt;Button&lt;/x-button&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Disabled</h2>
                <x-button color="primary" disabled="true">Button</x-button>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-button color=&quot;primary&quot; disabled=&quot;true&quot;&gt;Button&lt;/x-button&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Sizes</h2>
                <div class="flex flex-col w-min gap-3">
                    <x-button color="default" size="sm">Small</x-button>
                    <x-button color="default" size="md">Medium</x-button>
                    <x-button color="default" size="lg">Large</x-button>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-button size=&quot;sm&quot;&gt;Small&lt;/x-button&gt;
                        &lt;x-button size=&quot;md&quot;&gt;Medium&lt;/x-button&gt;
                        &lt;x-button size=&quot;lg&quot;&gt;Large&lt;/x-button&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Radius</h2>
                <div class="flex flex-wrap gap-3">
                    <x-button color="default" radius="full">Full</x-button>
                    <x-button color="default" radius="lg">Large</x-button>
                    <x-button color="default" radius="md">Medium</x-button>
                    <x-button color="default" radius="sm">Small</x-button>
                    <x-button color="default" radius="none">None</x-button>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-button radius=&quot;full&quot;&gt;Full&lt;/x-button&gt;
                        &lt;x-button radius=&quot;lg&quot;&gt;Large&lt;/x-button&gt;
                        &lt;x-button radius=&quot;md&quot;&gt;Medium&lt;/x-button&gt;
                        &lt;x-button radius=&quot;sm&quot;&gt;Small&lt;/x-button&gt;
                        &lt;x-button radius=&quot;none&quot;&gt;None&lt;/x-button&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Colors</h2>
                <div class="flex flex-wrap gap-3">
                    <x-button color="default">Default</x-button>
                    <x-button color="primary">Primary</x-button>
                    <x-button color="secondary">Secondary</x-button>
                    <x-button color="success">Success</x-button>
                    <x-button color="warning">Warning</x-button>
                    <x-button color="danger">Danger</x-button>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-button color=&quot;primary&quot;&gt;Primary&lt;/x-button&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Variants</h2>
                <div class="flex flex-wrap gap-3">
                    <x-button color="primary" variant="solid">Solid</x-button>
                    <x-button color="primary" variant="faded">Faded</x-button>
                    <x-button color="primary" variant="bordered">Bordered</x-button>
                    <x-button color="primary" variant="light">Light</x-button>
                    <x-button color="primary" variant="flat">Flat</x-button>
                    <x-button color="primary" variant="ghost">Ghost</x-button>
                    <x-button color="primary" variant="shadow">Shadow</x-button>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-button variant=&quot;bordered&quot; color=&quot;primary&quot;&gt;Bordered&lt;/x-button&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Loading</h2>
                <x-button color="primary" loading="true">Loading</x-button>
                <x-button color="secondary" loading="true">Loading</x-button>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-button color=&quot;primary&quot; loading=&quot;true&quot;&gt;Loading&lt;/x-button&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">With Icons</h2>
                <div class="flex flex-wrap gap-3">
                    <x-button color="success">
                        <x-slot:startContent>
                            <x-icon type="outline" icon="camera" size="5"></x-icon>
                        </x-slot:startContent>
                        Take a photo
                    </x-button>
                    <x-button color="danger" variant="bordered">
                        <x-slot:endContent>
                            <x-icon type="outline" icon="user" size="5"></x-icon>
                        </x-slot:endContent>
                        Delete user
                    </x-button>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-button color=&quot;success&quot;&gt;
                        &lt;x-slot:startContent&gt;
                        &lt;x-icon type=&quot;outline&quot; icon=&quot;camera&quot;
                        size=&quot;18&quot;&gt;&lt;/x-icon&gt;
                        &lt;/x-slot:startContent&gt;
                        Take a photo
                        &lt;/x-button&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Icon Only</h2>
                <div class="flex flex-wrap gap-3">
                    <x-button color="danger" iconOnly="true" ariaLabel="Like">
                        <x-icon type="outline" icon="heart" size="5"></x-icon>
                    </x-button>
                    <x-button color="default" variant="bordered" iconOnly="true" ariaLabel="Camera">
                        <x-icon type="outline" icon="camera" size="5"></x-icon>
                    </x-button>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-button iconOnly=&quot;true&quot; ariaLabel=&quot;Like&quot;&gt;
                        &lt;x-icon type=&quot;outline&quot; icon=&quot;heart&quot;
                        size=&quot;18&quot;&gt;&lt;/x-icon&gt;
                        &lt;/x-button&gt;
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
