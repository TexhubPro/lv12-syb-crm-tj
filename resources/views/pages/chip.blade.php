<!DOCTYPE html>
<html lang="en" class="bg-white text-gray-900 dark:bg-gray-950 dark:text-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chip Component Docs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen antialiased">
    <div class="mx-auto w-full max-w-4xl px-6 py-10">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-semibold">Chip</h1>
            <button type="button" class="text-sm underline underline-offset-4" data-theme-toggle>
                Toggle Theme
            </button>
        </div>

        <div class="mt-8 grid gap-8">
            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Usage</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-chip>Chip</x-chip>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-chip&gt;Chip&lt;/x-chip&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Disabled</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-chip disabled="true" color="primary">Chip</x-chip>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-chip disabled=&quot;true&quot; color=&quot;primary&quot;&gt;Chip&lt;/x-chip&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Sizes</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="flex flex-wrap gap-3">
                        <x-chip size="sm">Small</x-chip>
                        <x-chip size="md">Medium</x-chip>
                        <x-chip size="lg">Large</x-chip>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-chip size=&quot;sm&quot;&gt;Small&lt;/x-chip&gt;
                        &lt;x-chip size=&quot;md&quot;&gt;Medium&lt;/x-chip&gt;
                        &lt;x-chip size=&quot;lg&quot;&gt;Large&lt;/x-chip&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Colors</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="flex flex-wrap gap-3">
                        <x-chip color="default">Default</x-chip>
                        <x-chip color="primary">Primary</x-chip>
                        <x-chip color="secondary">Secondary</x-chip>
                        <x-chip color="success">Success</x-chip>
                        <x-chip color="warning">Warning</x-chip>
                        <x-chip color="danger">Danger</x-chip>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-chip color=&quot;primary&quot;&gt;Primary&lt;/x-chip&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Radius</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="flex flex-wrap gap-3">
                        <x-chip radius="full">Full</x-chip>
                        <x-chip radius="lg">Large</x-chip>
                        <x-chip radius="md">Medium</x-chip>
                        <x-chip radius="sm">Small</x-chip>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-chip radius=&quot;full&quot;&gt;Full&lt;/x-chip&gt;
                        &lt;x-chip radius=&quot;sm&quot;&gt;Small&lt;/x-chip&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Variants</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="flex flex-wrap gap-3">
                        <x-chip color="warning" variant="solid">Solid</x-chip>
                        <x-chip color="warning" variant="bordered">Bordered</x-chip>
                        <x-chip color="warning" variant="light">Light</x-chip>
                        <x-chip color="warning" variant="flat">Flat</x-chip>
                        <x-chip color="warning" variant="faded">Faded</x-chip>
                        <x-chip color="warning" variant="shadow">Shadow</x-chip>
                        <x-chip color="warning" dot="true">Dot</x-chip>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-chip color=&quot;warning&quot; variant=&quot;bordered&quot;&gt;Bordered&lt;/x-chip&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Start & End Content</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="flex flex-wrap gap-3">
                        <x-chip color="success" variant="bordered">
                            <x-slot:startContent>
                                <x-icon type="outline" icon="check" size="16"></x-icon>
                            </x-slot:startContent>
                            Chip
                        </x-chip>
                        <x-chip color="secondary" variant="flat">
                            Chip
                            <x-slot:endContent>
                                <x-icon type="outline" icon="bell" size="16"></x-icon>
                            </x-slot:endContent>
                        </x-chip>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-chip color=&quot;success&quot; variant=&quot;bordered&quot;&gt;
                        &lt;x-slot:startContent&gt;
                        &lt;x-icon type=&quot;outline&quot; icon=&quot;check&quot;
                        size=&quot;16&quot;&gt;&lt;/x-icon&gt;
                        &lt;/x-slot:startContent&gt;
                        Chip
                        &lt;/x-chip&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">With Close Button</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="flex flex-wrap gap-3">
                        <x-chip color="default" variant="bordered">
                            Chip
                            <x-slot:endContent>
                                <span
                                    class="ml-1 inline-flex h-5 w-5 items-center justify-center rounded-full bg-gray-700/20">
                                    <x-icon type="outline" icon="x" size="12"></x-icon>
                                </span>
                            </x-slot:endContent>
                        </x-chip>
                        <x-chip color="default" variant="bordered">
                            Chip
                            <x-slot:endContent>
                                <span
                                    class="ml-1 inline-flex h-5 w-5 items-center justify-center rounded-full bg-gray-700/20">
                                    <x-icon type="outline" icon="x" size="12"></x-icon>
                                </span>
                            </x-slot:endContent>
                        </x-chip>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-chip color=&quot;default&quot; variant=&quot;bordered&quot;&gt;
                        Chip
                        &lt;x-slot:endContent&gt;
                        &lt;span class=&quot;ml-1 inline-flex h-5 w-5 items-center justify-center rounded-full
                        bg-gray-700/20&quot;&gt;
                        &lt;x-icon type=&quot;outline&quot; icon=&quot;x&quot; size=&quot;12&quot;&gt;&lt;/x-icon&gt;
                        &lt;/span&gt;
                        &lt;/x-slot:endContent&gt;
                        &lt;/x-chip&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">With Avatar</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="flex flex-wrap gap-3">
                        <x-chip color="default" variant="light">
                            <x-slot:startContent>
                                <x-avatar size="xs" initials="A" />
                            </x-slot:startContent>
                            Avatar
                        </x-chip>
                        <x-chip color="default" variant="light">
                            <x-slot:startContent>
                                <x-avatar size="xs" initials="J" />
                            </x-slot:startContent>
                            Avatar
                        </x-chip>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-chip variant=&quot;light&quot;&gt;
                        &lt;x-slot:startContent&gt;
                        &lt;x-avatar size=&quot;xs&quot; initials=&quot;A&quot; /&gt;
                        &lt;/x-slot:startContent&gt;
                        Avatar
                        &lt;/x-chip&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">List of Chips</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="flex flex-wrap gap-3">
                        <x-chip color="default" variant="light">Banana</x-chip>
                        <x-chip color="default" variant="light">Cherry</x-chip>
                        <x-chip color="default" variant="light">Watermelon</x-chip>
                        <x-chip color="default" variant="light">Orange</x-chip>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-chip variant=&quot;light&quot;&gt;Banana&lt;/x-chip&gt;
                        &lt;x-chip variant=&quot;light&quot;&gt;Cherry&lt;/x-chip&gt;
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
