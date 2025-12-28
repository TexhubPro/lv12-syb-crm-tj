<!DOCTYPE html>
<html lang="en" class="bg-white text-gray-900 dark:bg-gray-950 dark:text-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rich Text Component Docs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen antialiased">
    <div class="mx-auto w-full max-w-4xl px-6 py-10">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-semibold">Rich Text</h1>
            <button type="button" class="text-sm underline underline-offset-4" data-theme-toggle>
                Toggle Theme
            </button>
        </div>

        <div class="mt-8 grid gap-8">
            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Usage</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-rich-text label="Notes" placeholder="Write something..." name="notes" />
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full" data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-nowrap block" data-code>
&lt;x-rich-text label=&quot;Notes&quot; placeholder=&quot;Write something...&quot; name=&quot;notes&quot; /&gt;
                    </code>
                    <button class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Toolbar Disabled</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-rich-text label="Notes" toolbar="false" placeholder="Plain content..." />
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full" data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-nowrap block" data-code>
&lt;x-rich-text label=&quot;Notes&quot; toolbar=&quot;false&quot; placeholder=&quot;Plain content...&quot; /&gt;
                    </code>
                    <button class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Disabled</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-rich-text label="Notes" disabled="true" value="<p>Read-only content.</p>" />
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full" data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-nowrap block" data-code>
&lt;x-rich-text label=&quot;Notes&quot; disabled=&quot;true&quot; value=&quot;&lt;p&gt;Read-only content.&lt;/p&gt;&quot; /&gt;
                    </code>
                    <button class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Label Placement</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="grid gap-4">
                        <x-rich-text label="Notes" label-placement="outside" />
                        <x-rich-text label="Notes" label-placement="inside" />
                        <x-rich-text label="Notes" label-placement="outside-left" />
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full" data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-nowrap block" data-code>
&lt;x-rich-text label=&quot;Notes&quot; label-placement=&quot;inside&quot; /&gt;
&lt;x-rich-text label=&quot;Notes&quot; label-placement=&quot;outside-left&quot; /&gt;
                    </code>
                    <button class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">With Description</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-rich-text label="Notes" description="Keep it short and focused." />
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full" data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-nowrap block" data-code>
&lt;x-rich-text label=&quot;Notes&quot; description=&quot;Keep it short and focused.&quot; /&gt;
                    </code>
                    <button class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Error Message</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-rich-text label="Notes" invalid="true" error-message="Please add at least one paragraph." />
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full" data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-nowrap block" data-code>
&lt;x-rich-text label=&quot;Notes&quot; invalid=&quot;true&quot; error-message=&quot;Please add at least one paragraph.&quot; /&gt;
                    </code>
                    <button class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Sizes</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="grid gap-4">
                        <x-rich-text label="Small" size="sm" />
                        <x-rich-text label="Medium" size="md" />
                        <x-rich-text label="Large" size="lg" />
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full" data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-nowrap block" data-code>
&lt;x-rich-text label=&quot;Small&quot; size=&quot;sm&quot; /&gt;
&lt;x-rich-text label=&quot;Large&quot; size=&quot;lg&quot; /&gt;
                    </code>
                    <button class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Radius</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="grid gap-4">
                        <x-rich-text label="None" radius="none" />
                        <x-rich-text label="Small" radius="sm" />
                        <x-rich-text label="Medium" radius="md" />
                        <x-rich-text label="Large" radius="lg" />
                        <x-rich-text label="Full" radius="full" />
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full" data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-nowrap block" data-code>
&lt;x-rich-text label=&quot;Full&quot; radius=&quot;full&quot; /&gt;
                    </code>
                    <button class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Variants</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="grid gap-4">
                        <x-rich-text label="Filled" variant="filled" />
                        <x-rich-text label="Outline" variant="outline" />
                        <x-rich-text label="Flat" variant="flat" />
                        <x-rich-text label="Underlined" variant="underlined" />
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full" data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-nowrap block" data-code>
&lt;x-rich-text label=&quot;Filled&quot; variant=&quot;filled&quot; /&gt;
&lt;x-rich-text label=&quot;Underlined&quot; variant=&quot;underlined&quot; /&gt;
                    </code>
                    <button class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Colors</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="grid gap-4">
                        <x-rich-text label="Default" color="default" />
                        <x-rich-text label="Primary" color="primary" />
                        <x-rich-text label="Secondary" color="secondary" />
                        <x-rich-text label="Success" color="success" />
                        <x-rich-text label="Warning" color="warning" />
                        <x-rich-text label="Danger" color="danger" />
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full" data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-nowrap block" data-code>
&lt;x-rich-text label=&quot;Primary&quot; color=&quot;primary&quot; /&gt;
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
    </script>
</body>
</html>
