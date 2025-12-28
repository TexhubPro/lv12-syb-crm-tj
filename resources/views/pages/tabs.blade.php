<!DOCTYPE html>
<html lang="en" class="bg-white text-gray-900 dark:bg-gray-950 dark:text-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabs Component Docs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen antialiased">
    <div class="mx-auto w-full max-w-4xl px-6 py-10">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-semibold">Tabs</h1>
            <button type="button" class="text-sm underline underline-offset-4" data-theme-toggle>
                Toggle Theme
            </button>
        </div>

        <div class="mt-8 grid gap-8">
            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Usage</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-tabs defaultValue="photos">
                        <x-slot name="tabs">
                            <x-tabs.item value="photos">Photos</x-tabs.item>
                            <x-tabs.item value="music">Music</x-tabs.item>
                            <x-tabs.item value="videos">Videos</x-tabs.item>
                        </x-slot>
                        <x-slot name="panels">
                            <x-tabs.panel value="photos">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </x-tabs.panel>
                            <x-tabs.panel value="music">
                                Music tab content with a calm description and supporting text for your layout.
                            </x-tabs.panel>
                            <x-tabs.panel value="videos">
                                Videos tab content with a longer paragraph to show spacing and alignment.
                            </x-tabs.panel>
                        </x-slot>
                    </x-tabs>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-tabs defaultValue=&quot;photos&quot;&gt;
                        &lt;x-slot name=&quot;tabs&quot;&gt;
                        &lt;x-tabs.item value=&quot;photos&quot;&gt;Photos&lt;/x-tabs.item&gt;
                        &lt;x-tabs.item value=&quot;music&quot;&gt;Music&lt;/x-tabs.item&gt;
                        &lt;x-tabs.item value=&quot;videos&quot;&gt;Videos&lt;/x-tabs.item&gt;
                        &lt;/x-slot&gt;
                        &lt;x-slot name=&quot;panels&quot;&gt;
                        &lt;x-tabs.panel value=&quot;photos&quot;&gt;...&lt;/x-tabs.panel&gt;
                        &lt;x-tabs.panel value=&quot;music&quot;&gt;...&lt;/x-tabs.panel&gt;
                        &lt;x-tabs.panel value=&quot;videos&quot;&gt;...&lt;/x-tabs.panel&gt;
                        &lt;/x-slot&gt;
                        &lt;/x-tabs&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Disabled</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-tabs defaultValue="photos" disabled="true">
                        <x-slot name="tabs">
                            <x-tabs.item value="photos">Photos</x-tabs.item>
                            <x-tabs.item value="music">Music</x-tabs.item>
                            <x-tabs.item value="videos">Videos</x-tabs.item>
                        </x-slot>
                        <x-slot name="panels">
                            <x-tabs.panel value="photos">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.
                            </x-tabs.panel>
                            <x-tabs.panel value="music">Music tab content.</x-tabs.panel>
                            <x-tabs.panel value="videos">Videos tab content.</x-tabs.panel>
                        </x-slot>
                    </x-tabs>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-tabs disabled=&quot;true&quot;&gt;...&lt;/x-tabs&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Disabled Item</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-tabs defaultValue="photos">
                        <x-slot name="tabs">
                            <x-tabs.item value="photos">Photos</x-tabs.item>
                            <x-tabs.item value="music" disabled="true">Music</x-tabs.item>
                            <x-tabs.item value="videos">Videos</x-tabs.item>
                        </x-slot>
                        <x-slot name="panels">
                            <x-tabs.panel value="photos">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.
                            </x-tabs.panel>
                            <x-tabs.panel value="music">Music tab content.</x-tabs.panel>
                            <x-tabs.panel value="videos">Videos tab content.</x-tabs.panel>
                        </x-slot>
                    </x-tabs>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-tabs.item value=&quot;music&quot; disabled=&quot;true&quot;&gt;Music&lt;/x-tabs.item&gt;
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
                        <x-tabs size="sm" defaultValue="photos">
                            <x-slot name="tabs">
                                <x-tabs.item value="photos">Photos</x-tabs.item>
                                <x-tabs.item value="music">Music</x-tabs.item>
                                <x-tabs.item value="videos">Videos</x-tabs.item>
                            </x-slot>
                        </x-tabs>
                        <x-tabs size="md" defaultValue="photos">
                            <x-slot name="tabs">
                                <x-tabs.item value="photos">Photos</x-tabs.item>
                                <x-tabs.item value="music">Music</x-tabs.item>
                                <x-tabs.item value="videos">Videos</x-tabs.item>
                            </x-slot>
                        </x-tabs>
                        <x-tabs size="lg" defaultValue="photos">
                            <x-slot name="tabs">
                                <x-tabs.item value="photos">Photos</x-tabs.item>
                                <x-tabs.item value="music">Music</x-tabs.item>
                                <x-tabs.item value="videos">Videos</x-tabs.item>
                            </x-slot>
                        </x-tabs>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-tabs size=&quot;sm&quot; defaultValue=&quot;photos&quot;&gt;...&lt;/x-tabs&gt;
                        &lt;x-tabs size=&quot;md&quot; defaultValue=&quot;photos&quot;&gt;...&lt;/x-tabs&gt;
                        &lt;x-tabs size=&quot;lg&quot; defaultValue=&quot;photos&quot;&gt;...&lt;/x-tabs&gt;
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
                        <x-tabs radius="sm" defaultValue="photos">
                            <x-slot name="tabs">
                                <x-tabs.item value="photos">Photos</x-tabs.item>
                                <x-tabs.item value="music">Music</x-tabs.item>
                                <x-tabs.item value="videos">Videos</x-tabs.item>
                            </x-slot>
                        </x-tabs>
                        <x-tabs radius="md" defaultValue="photos">
                            <x-slot name="tabs">
                                <x-tabs.item value="photos">Photos</x-tabs.item>
                                <x-tabs.item value="music">Music</x-tabs.item>
                                <x-tabs.item value="videos">Videos</x-tabs.item>
                            </x-slot>
                        </x-tabs>
                        <x-tabs radius="lg" defaultValue="photos">
                            <x-slot name="tabs">
                                <x-tabs.item value="photos">Photos</x-tabs.item>
                                <x-tabs.item value="music">Music</x-tabs.item>
                                <x-tabs.item value="videos">Videos</x-tabs.item>
                            </x-slot>
                        </x-tabs>
                        <x-tabs radius="full" defaultValue="photos">
                            <x-slot name="tabs">
                                <x-tabs.item value="photos">Photos</x-tabs.item>
                                <x-tabs.item value="music">Music</x-tabs.item>
                                <x-tabs.item value="videos">Videos</x-tabs.item>
                            </x-slot>
                        </x-tabs>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-tabs radius=&quot;sm&quot; defaultValue=&quot;photos&quot;&gt;...&lt;/x-tabs&gt;
                        &lt;x-tabs radius=&quot;md&quot; defaultValue=&quot;photos&quot;&gt;...&lt;/x-tabs&gt;
                        &lt;x-tabs radius=&quot;lg&quot; defaultValue=&quot;photos&quot;&gt;...&lt;/x-tabs&gt;
                        &lt;x-tabs radius=&quot;full&quot; defaultValue=&quot;photos&quot;&gt;...&lt;/x-tabs&gt;
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
                        <x-tabs color="default" defaultValue="photos">
                            <x-slot name="tabs">
                                <x-tabs.item value="photos">Photos</x-tabs.item>
                                <x-tabs.item value="music">Music</x-tabs.item>
                                <x-tabs.item value="videos">Videos</x-tabs.item>
                            </x-slot>
                        </x-tabs>
                        <x-tabs color="primary" defaultValue="photos">
                            <x-slot name="tabs">
                                <x-tabs.item value="photos">Photos</x-tabs.item>
                                <x-tabs.item value="music">Music</x-tabs.item>
                                <x-tabs.item value="videos">Videos</x-tabs.item>
                            </x-slot>
                        </x-tabs>
                        <x-tabs color="secondary" defaultValue="photos">
                            <x-slot name="tabs">
                                <x-tabs.item value="photos">Photos</x-tabs.item>
                                <x-tabs.item value="music">Music</x-tabs.item>
                                <x-tabs.item value="videos">Videos</x-tabs.item>
                            </x-slot>
                        </x-tabs>
                        <x-tabs color="success" defaultValue="photos">
                            <x-slot name="tabs">
                                <x-tabs.item value="photos">Photos</x-tabs.item>
                                <x-tabs.item value="music">Music</x-tabs.item>
                                <x-tabs.item value="videos">Videos</x-tabs.item>
                            </x-slot>
                        </x-tabs>
                        <x-tabs color="warning" defaultValue="photos">
                            <x-slot name="tabs">
                                <x-tabs.item value="photos">Photos</x-tabs.item>
                                <x-tabs.item value="music">Music</x-tabs.item>
                                <x-tabs.item value="videos">Videos</x-tabs.item>
                            </x-slot>
                        </x-tabs>
                        <x-tabs color="danger" defaultValue="photos">
                            <x-slot name="tabs">
                                <x-tabs.item value="photos">Photos</x-tabs.item>
                                <x-tabs.item value="music">Music</x-tabs.item>
                                <x-tabs.item value="videos">Videos</x-tabs.item>
                            </x-slot>
                        </x-tabs>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-tabs color=&quot;primary&quot; defaultValue=&quot;photos&quot;&gt;...&lt;/x-tabs&gt;
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
                        <x-tabs variant="solid" defaultValue="photos">
                            <x-slot name="tabs">
                                <x-tabs.item value="photos">Photos</x-tabs.item>
                                <x-tabs.item value="music">Music</x-tabs.item>
                                <x-tabs.item value="videos">Videos</x-tabs.item>
                            </x-slot>
                        </x-tabs>
                        <x-tabs variant="underlined" defaultValue="photos">
                            <x-slot name="tabs">
                                <x-tabs.item value="photos">Photos</x-tabs.item>
                                <x-tabs.item value="music">Music</x-tabs.item>
                                <x-tabs.item value="videos">Videos</x-tabs.item>
                            </x-slot>
                        </x-tabs>
                        <x-tabs variant="bordered" defaultValue="photos">
                            <x-slot name="tabs">
                                <x-tabs.item value="photos">Photos</x-tabs.item>
                                <x-tabs.item value="music">Music</x-tabs.item>
                                <x-tabs.item value="videos">Videos</x-tabs.item>
                            </x-slot>
                        </x-tabs>
                        <x-tabs variant="light" defaultValue="photos">
                            <x-slot name="tabs">
                                <x-tabs.item value="photos">Photos</x-tabs.item>
                                <x-tabs.item value="music">Music</x-tabs.item>
                                <x-tabs.item value="videos">Videos</x-tabs.item>
                            </x-slot>
                        </x-tabs>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-tabs variant=&quot;underlined&quot; defaultValue=&quot;photos&quot;&gt;...&lt;/x-tabs&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">With Icons</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-tabs color="primary" defaultValue="photos">
                        <x-slot name="tabs">
                            <x-tabs.item value="photos" icon="photo" iconType="outline">Photos</x-tabs.item>
                            <x-tabs.item value="music" icon="music" iconType="outline">Music</x-tabs.item>
                            <x-tabs.item value="videos" icon="video" iconType="outline">Videos</x-tabs.item>
                        </x-slot>
                    </x-tabs>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-tabs.item value=&quot;photos&quot; icon=&quot;photo&quot;&gt;Photos&lt;/x-tabs.item&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Vertical</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-tabs defaultValue="photos" vertical="true">
                        <x-slot name="tabs">
                            <x-tabs.item value="photos">Photos</x-tabs.item>
                            <x-tabs.item value="music">Music</x-tabs.item>
                            <x-tabs.item value="videos">Videos</x-tabs.item>
                        </x-slot>
                        <x-slot name="panels">
                            <x-tabs.panel value="photos">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.
                            </x-tabs.panel>
                            <x-tabs.panel value="music">
                                Music tab content with a left layout for vertical tabs.
                            </x-tabs.panel>
                            <x-tabs.panel value="videos">
                                Videos tab content with a left layout for vertical tabs.
                            </x-tabs.panel>
                        </x-slot>
                    </x-tabs>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-tabs vertical=&quot;true&quot; defaultValue=&quot;photos&quot;&gt;...&lt;/x-tabs&gt;
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
