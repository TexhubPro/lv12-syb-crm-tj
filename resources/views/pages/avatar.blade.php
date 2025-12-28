<!DOCTYPE html>
<html lang="en" class="bg-white text-gray-900 dark:bg-gray-950 dark:text-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avatar Component Docs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen antialiased">
    <div class="mx-auto w-full max-w-4xl px-6 py-10">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-semibold">Avatar</h1>
            <button type="button" class="text-sm underline underline-offset-4" data-theme-toggle>
                Toggle Theme
            </button>
        </div>

        <div class="mt-8 grid gap-8">
            <section class="grid gap-3">
                <div class="flex items-center gap-4 rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-avatar src="https://i.pravatar.cc/100?img=12" alt="User" />
                    <x-avatar src="https://i.pravatar.cc/100?img=32" alt="User" />
                    <x-avatar src="https://i.pravatar.cc/100?img=47" alt="User" />
                    <x-avatar initials="J" />
                    <x-avatar initials="MS" tone="blue" />
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-avatar src=&quot;https://i.pravatar.cc/100?img=12&quot; alt=&quot;User&quot; /&gt;
                        &lt;x-avatar src=&quot;https://i.pravatar.cc/100?img=32&quot; alt=&quot;User&quot; /&gt;
                        &lt;x-avatar src=&quot;https://i.pravatar.cc/100?img=47&quot; alt=&quot;User&quot; /&gt;
                        &lt;x-avatar initials=&quot;J&quot; /&gt;
                        &lt;x-avatar initials=&quot;MS&quot; tone=&quot;blue&quot; /&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Sizes</h2>
                <div class="flex items-center gap-4 rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-avatar src="https://i.pravatar.cc/100?img=12" size="xs" />
                    <x-avatar src="https://i.pravatar.cc/100?img=32" size="sm" />
                    <x-avatar src="https://i.pravatar.cc/100?img=47" size="md" />
                    <x-avatar src="https://i.pravatar.cc/100?img=58" size="lg" />
                    <x-avatar src="https://i.pravatar.cc/100?img=68" size="xl" />
                    <x-avatar src="https://i.pravatar.cc/100?img=79" size="2xl" />
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-avatar src=&quot;https://i.pravatar.cc/100?img=12&quot; size=&quot;xs&quot; /&gt;
                        &lt;x-avatar src=&quot;https://i.pravatar.cc/100?img=32&quot; size=&quot;sm&quot; /&gt;
                        &lt;x-avatar src=&quot;https://i.pravatar.cc/100?img=47&quot; size=&quot;md&quot; /&gt;
                        &lt;x-avatar src=&quot;https://i.pravatar.cc/100?img=58&quot; size=&quot;lg&quot; /&gt;
                        &lt;x-avatar src=&quot;https://i.pravatar.cc/100?img=68&quot; size=&quot;xl&quot; /&gt;
                        &lt;x-avatar src=&quot;https://i.pravatar.cc/100?img=79&quot; size=&quot;2xl&quot; /&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Disabled</h2>
                <div class="flex items-center gap-4 rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-avatar src="https://i.pravatar.cc/100?img=12" disabled="true" />
                    <x-avatar initials="J" disabled="true" />
                    <x-avatar src="https://i.pravatar.cc/100?img=47" disabled="true" />
                    <x-avatar initials="MS" tone="blue" disabled="true" />
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-avatar src=&quot;https://i.pravatar.cc/100?img=12&quot; disabled=&quot;true&quot; /&gt;
                        &lt;x-avatar initials=&quot;J&quot; disabled=&quot;true&quot; /&gt;
                        &lt;x-avatar src=&quot;https://i.pravatar.cc/100?img=47&quot; disabled=&quot;true&quot; /&gt;
                        &lt;x-avatar initials=&quot;MS&quot; tone=&quot;blue&quot; disabled=&quot;true&quot; /&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Bordered</h2>
                <div class="flex items-center gap-4 rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-avatar src="https://i.pravatar.cc/100?img=12" border="true" />
                    <x-avatar src="https://i.pravatar.cc/100?img=32" border="true" ring="blue" />
                    <x-avatar src="https://i.pravatar.cc/100?img=47" border="true" ring="purple" />
                    <x-avatar src="https://i.pravatar.cc/100?img=58" border="true" ring="green" />
                    <x-avatar src="https://i.pravatar.cc/100?img=68" border="true" ring="orange" />
                    <x-avatar src="https://i.pravatar.cc/100?img=79" border="true" ring="red" />
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-avatar src=&quot;https://i.pravatar.cc/100?img=12&quot; border=&quot;true&quot; /&gt;
                        &lt;x-avatar src=&quot;https://i.pravatar.cc/100?img=32&quot; border=&quot;true&quot;
                        ring=&quot;blue&quot; /&gt;
                        &lt;x-avatar src=&quot;https://i.pravatar.cc/100?img=47&quot; border=&quot;true&quot;
                        ring=&quot;purple&quot; /&gt;
                        &lt;x-avatar src=&quot;https://i.pravatar.cc/100?img=58&quot; border=&quot;true&quot;
                        ring=&quot;green&quot; /&gt;
                        &lt;x-avatar src=&quot;https://i.pravatar.cc/100?img=68&quot; border=&quot;true&quot;
                        ring=&quot;orange&quot; /&gt;
                        &lt;x-avatar src=&quot;https://i.pravatar.cc/100?img=79&quot; border=&quot;true&quot;
                        ring=&quot;red&quot; /&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Radius</h2>
                <div class="flex items-center gap-4 rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-avatar src="https://i.pravatar.cc/100?img=12" radius="none" />
                    <x-avatar src="https://i.pravatar.cc/100?img=32" radius="sm" />
                    <x-avatar src="https://i.pravatar.cc/100?img=47" radius="md" />
                    <x-avatar src="https://i.pravatar.cc/100?img=58" radius="lg" />
                    <x-avatar src="https://i.pravatar.cc/100?img=68" radius="full" />
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-avatar src=&quot;https://i.pravatar.cc/100?img=12&quot; radius=&quot;none&quot; /&gt;
                        &lt;x-avatar src=&quot;https://i.pravatar.cc/100?img=32&quot; radius=&quot;sm&quot; /&gt;
                        &lt;x-avatar src=&quot;https://i.pravatar.cc/100?img=47&quot; radius=&quot;md&quot; /&gt;
                        &lt;x-avatar src=&quot;https://i.pravatar.cc/100?img=58&quot; radius=&quot;lg&quot; /&gt;
                        &lt;x-avatar src=&quot;https://i.pravatar.cc/100?img=68&quot; radius=&quot;full&quot; /&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Colors</h2>
                <div class="flex items-center gap-4 rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-avatar initials="JS" tone="gray" border="true" ring="gray" />
                    <x-avatar initials="JS" tone="blue" border="true" ring="blue" />
                    <x-avatar initials="JS" tone="purple" border="true" ring="purple" />
                    <x-avatar initials="JS" tone="green" border="true" ring="green" />
                    <x-avatar initials="JS" tone="orange" border="true" ring="orange" />
                    <x-avatar initials="JS" tone="red" border="true" ring="red" />
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-avatar initials=&quot;JS&quot; tone=&quot;gray&quot; border=&quot;true&quot;
                        ring=&quot;gray&quot; /&gt;
                        &lt;x-avatar initials=&quot;JS&quot; tone=&quot;blue&quot; border=&quot;true&quot;
                        ring=&quot;blue&quot; /&gt;
                        &lt;x-avatar initials=&quot;JS&quot; tone=&quot;purple&quot; border=&quot;true&quot;
                        ring=&quot;purple&quot; /&gt;
                        &lt;x-avatar initials=&quot;JS&quot; tone=&quot;green&quot; border=&quot;true&quot;
                        ring=&quot;green&quot; /&gt;
                        &lt;x-avatar initials=&quot;JS&quot; tone=&quot;orange&quot; border=&quot;true&quot;
                        ring=&quot;orange&quot; /&gt;
                        &lt;x-avatar initials=&quot;JS&quot; tone=&quot;red&quot; border=&quot;true&quot;
                        ring=&quot;red&quot; /&gt;
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
