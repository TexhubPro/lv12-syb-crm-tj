<!DOCTYPE html>
<html lang="en" class="bg-white text-gray-900 dark:bg-gray-950 dark:text-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text Component Docs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen antialiased">
    <div class="mx-auto w-full max-w-4xl px-6 py-10">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-semibold">Text</h1>
            <button type="button" class="text-sm underline underline-offset-4" data-theme-toggle>
                Toggle Theme
            </button>
        </div>

        <div class="mt-8 grid gap-8">
            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Usage</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="grid gap-2">
                        <x-text as="h2" size="3xl" weight="semibold">Sign in to your account</x-text>
                        <x-text size="lg" color="muted">to continue to Acme</x-text>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-text as=&quot;h2&quot; size=&quot;3xl&quot; weight=&quot;semibold&quot;&gt;Sign in to your account&lt;/x-text&gt;
                        &lt;x-text size=&quot;lg&quot; color=&quot;muted&quot;&gt;to continue to Acme&lt;/x-text&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Sizes</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="grid gap-3">
                        <x-text size="xs">Extra small</x-text>
                        <x-text size="sm">Small</x-text>
                        <x-text size="base">Base</x-text>
                        <x-text size="lg">Large</x-text>
                        <x-text size="xl">Extra large</x-text>
                        <x-text size="2xl">2XL</x-text>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-text size=&quot;xs&quot;&gt;Extra small&lt;/x-text&gt;
                        &lt;x-text size=&quot;sm&quot;&gt;Small&lt;/x-text&gt;
                        &lt;x-text size=&quot;base&quot;&gt;Base&lt;/x-text&gt;
                        &lt;x-text size=&quot;lg&quot;&gt;Large&lt;/x-text&gt;
                        &lt;x-text size=&quot;xl&quot;&gt;Extra large&lt;/x-text&gt;
                        &lt;x-text size=&quot;2xl&quot;&gt;2XL&lt;/x-text&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Weights</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="grid gap-3">
                        <x-text weight="light">Light</x-text>
                        <x-text weight="normal">Normal</x-text>
                        <x-text weight="medium">Medium</x-text>
                        <x-text weight="semibold">Semibold</x-text>
                        <x-text weight="bold">Bold</x-text>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-text weight=&quot;light&quot;&gt;Light&lt;/x-text&gt;
                        &lt;x-text weight=&quot;normal&quot;&gt;Normal&lt;/x-text&gt;
                        &lt;x-text weight=&quot;medium&quot;&gt;Medium&lt;/x-text&gt;
                        &lt;x-text weight=&quot;semibold&quot;&gt;Semibold&lt;/x-text&gt;
                        &lt;x-text weight=&quot;bold&quot;&gt;Bold&lt;/x-text&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Colors</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="grid gap-2">
                        <x-text color="default">Default</x-text>
                        <x-text color="primary">Primary</x-text>
                        <x-text color="secondary">Secondary</x-text>
                        <x-text color="success">Success</x-text>
                        <x-text color="warning">Warning</x-text>
                        <x-text color="danger">Danger</x-text>
                        <x-text muted="true">Muted</x-text>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-text color=&quot;primary&quot;&gt;Primary&lt;/x-text&gt;
                        &lt;x-text color=&quot;secondary&quot;&gt;Secondary&lt;/x-text&gt;
                        &lt;x-text color=&quot;success&quot;&gt;Success&lt;/x-text&gt;
                        &lt;x-text color=&quot;warning&quot;&gt;Warning&lt;/x-text&gt;
                        &lt;x-text color=&quot;danger&quot;&gt;Danger&lt;/x-text&gt;
                        &lt;x-text muted=&quot;true&quot;&gt;Muted&lt;/x-text&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Alignment</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="grid gap-4">
                        <x-text align="left" class="max-w-sm">Left aligned text for descriptions.</x-text>
                        <x-text align="center" class="max-w-sm">Centered text for headings.</x-text>
                        <x-text align="right" class="max-w-sm">Right aligned note.</x-text>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-text align=&quot;left&quot; class=&quot;max-w-sm&quot;&gt;Left aligned text&lt;/x-text&gt;
                        &lt;x-text align=&quot;center&quot; class=&quot;max-w-sm&quot;&gt;Centered text&lt;/x-text&gt;
                        &lt;x-text align=&quot;right&quot; class=&quot;max-w-sm&quot;&gt;Right aligned text&lt;/x-text&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Leading &amp; Tracking</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="grid gap-3">
                        <x-text leading="tight" class="max-w-sm">Tight leading for compact blocks.</x-text>
                        <x-text leading="relaxed" class="max-w-sm">Relaxed leading for long form content.</x-text>
                        <x-text tracking="wide" class="uppercase">Wide tracking</x-text>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-text leading=&quot;tight&quot;&gt;Tight leading&lt;/x-text&gt;
                        &lt;x-text leading=&quot;relaxed&quot;&gt;Relaxed leading&lt;/x-text&gt;
                        &lt;x-text tracking=&quot;wide&quot; class=&quot;uppercase&quot;&gt;Wide tracking&lt;/x-text&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Transform &amp; Clamp</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="grid gap-4">
                        <x-text transform="uppercase" weight="medium">Uppercase</x-text>
                        <x-text clamp="2" class="max-w-sm">
                            This is a long paragraph that will be clamped to two lines to keep the layout clean and
                            tidy.
                        </x-text>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-text transform=&quot;uppercase&quot; weight=&quot;medium&quot;&gt;Uppercase&lt;/x-text&gt;
                        &lt;x-text clamp=&quot;2&quot; class=&quot;max-w-sm&quot;&gt;Long text...&lt;/x-text&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Tags</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="grid gap-2">
                        <x-text as="h3" size="xl" weight="semibold">Heading level 3</x-text>
                        <x-text as="p" color="muted">Paragraph text example</x-text>
                        <x-text as="span" size="sm">Inline text</x-text>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-text as=&quot;h3&quot; size=&quot;xl&quot; weight=&quot;semibold&quot;&gt;Heading level 3&lt;/x-text&gt;
                        &lt;x-text as=&quot;p&quot; color=&quot;muted&quot;&gt;Paragraph text example&lt;/x-text&gt;
                        &lt;x-text as=&quot;span&quot; size=&quot;sm&quot;&gt;Inline text&lt;/x-text&gt;
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
