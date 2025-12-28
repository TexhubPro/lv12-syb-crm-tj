<!DOCTYPE html>
<html lang="en" class="bg-white text-gray-900 dark:bg-gray-950 dark:text-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Breadcrumbs Component Docs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen antialiased">
    <div class="mx-auto w-full max-w-4xl px-6 py-10">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-semibold">Breadcrumbs</h1>
            <button type="button" class="text-sm underline underline-offset-4" data-theme-toggle>
                Toggle Theme
            </button>
        </div>

        <div class="mt-8 grid gap-8">
            <section class="grid gap-3">
                <x-breadcrumbs>
                    <x-breadcrumbs.item href="#">Home</x-breadcrumbs.item>
                    <x-breadcrumbs.item href="#">Music</x-breadcrumbs.item>
                    <x-breadcrumbs.item href="#">Artist</x-breadcrumbs.item>
                    <x-breadcrumbs.item href="#">Album</x-breadcrumbs.item>
                    <x-breadcrumbs.item current="true" last="true">Song</x-breadcrumbs.item>
                </x-breadcrumbs>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-breadcrumbs&gt;
                        &lt;x-breadcrumbs.item href=&quot;#&quot;&gt;Home&lt;/x-breadcrumbs.item&gt;
                        &lt;x-breadcrumbs.item href=&quot;#&quot;&gt;Music&lt;/x-breadcrumbs.item&gt;
                        &lt;x-breadcrumbs.item href=&quot;#&quot;&gt;Artist&lt;/x-breadcrumbs.item&gt;
                        &lt;x-breadcrumbs.item href=&quot;#&quot;&gt;Album&lt;/x-breadcrumbs.item&gt;
                        &lt;x-breadcrumbs.item current=&quot;true&quot;
                        last=&quot;true&quot;&gt;Song&lt;/x-breadcrumbs.item&gt;
                        &lt;/x-breadcrumbs&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Disabled</h2>
                <x-breadcrumbs>
                    <x-breadcrumbs.item href="#" disabled="true">Home</x-breadcrumbs.item>
                    <x-breadcrumbs.item href="#" disabled="true">Music</x-breadcrumbs.item>
                    <x-breadcrumbs.item href="#" disabled="true">Artist</x-breadcrumbs.item>
                    <x-breadcrumbs.item href="#" disabled="true">Album</x-breadcrumbs.item>
                    <x-breadcrumbs.item current="true" last="true">Song</x-breadcrumbs.item>
                </x-breadcrumbs>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-breadcrumbs&gt;
                        &lt;x-breadcrumbs.item href=&quot;#&quot;
                        disabled=&quot;true&quot;&gt;Home&lt;/x-breadcrumbs.item&gt;
                        &lt;x-breadcrumbs.item href=&quot;#&quot;
                        disabled=&quot;true&quot;&gt;Music&lt;/x-breadcrumbs.item&gt;
                        &lt;x-breadcrumbs.item href=&quot;#&quot;
                        disabled=&quot;true&quot;&gt;Artist&lt;/x-breadcrumbs.item&gt;
                        &lt;x-breadcrumbs.item href=&quot;#&quot;
                        disabled=&quot;true&quot;&gt;Album&lt;/x-breadcrumbs.item&gt;
                        &lt;x-breadcrumbs.item current=&quot;true&quot;
                        last=&quot;true&quot;&gt;Song&lt;/x-breadcrumbs.item&gt;
                        &lt;/x-breadcrumbs&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Sizes</h2>
                <div class="grid gap-3">
                    <x-breadcrumbs size="sm">
                        <x-breadcrumbs.item href="#">Home</x-breadcrumbs.item>
                        <x-breadcrumbs.item href="#">Music</x-breadcrumbs.item>
                        <x-breadcrumbs.item current="true" last="true">Song</x-breadcrumbs.item>
                    </x-breadcrumbs>
                    <x-breadcrumbs size="md">
                        <x-breadcrumbs.item href="#">Home</x-breadcrumbs.item>
                        <x-breadcrumbs.item href="#">Music</x-breadcrumbs.item>
                        <x-breadcrumbs.item current="true" last="true">Song</x-breadcrumbs.item>
                    </x-breadcrumbs>
                    <x-breadcrumbs size="lg">
                        <x-breadcrumbs.item href="#">Home</x-breadcrumbs.item>
                        <x-breadcrumbs.item href="#">Music</x-breadcrumbs.item>
                        <x-breadcrumbs.item current="true" last="true">Song</x-breadcrumbs.item>
                    </x-breadcrumbs>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-breadcrumbs size=&quot;sm&quot;&gt;...&lt;/x-breadcrumbs&gt;
                        &lt;x-breadcrumbs size=&quot;md&quot;&gt;...&lt;/x-breadcrumbs&gt;
                        &lt;x-breadcrumbs size=&quot;lg&quot;&gt;...&lt;/x-breadcrumbs&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Colors</h2>
                <div class="grid gap-3">
                    <x-breadcrumbs color="default">
                        <x-breadcrumbs.item href="#">Home</x-breadcrumbs.item>
                        <x-breadcrumbs.item href="#">Music</x-breadcrumbs.item>
                        <x-breadcrumbs.item current="true" last="true">Song</x-breadcrumbs.item>
                    </x-breadcrumbs>
                    <x-breadcrumbs color="blue">
                        <x-breadcrumbs.item href="#">Home</x-breadcrumbs.item>
                        <x-breadcrumbs.item href="#">Music</x-breadcrumbs.item>
                        <x-breadcrumbs.item current="true" last="true">Song</x-breadcrumbs.item>
                    </x-breadcrumbs>
                    <x-breadcrumbs color="purple">
                        <x-breadcrumbs.item href="#">Home</x-breadcrumbs.item>
                        <x-breadcrumbs.item href="#">Music</x-breadcrumbs.item>
                        <x-breadcrumbs.item current="true" last="true">Song</x-breadcrumbs.item>
                    </x-breadcrumbs>
                    <x-breadcrumbs color="green">
                        <x-breadcrumbs.item href="#">Home</x-breadcrumbs.item>
                        <x-breadcrumbs.item href="#">Music</x-breadcrumbs.item>
                        <x-breadcrumbs.item current="true" last="true">Song</x-breadcrumbs.item>
                    </x-breadcrumbs>
                    <x-breadcrumbs color="orange">
                        <x-breadcrumbs.item href="#">Home</x-breadcrumbs.item>
                        <x-breadcrumbs.item href="#">Music</x-breadcrumbs.item>
                        <x-breadcrumbs.item current="true" last="true">Song</x-breadcrumbs.item>
                    </x-breadcrumbs>
                    <x-breadcrumbs color="red">
                        <x-breadcrumbs.item href="#">Home</x-breadcrumbs.item>
                        <x-breadcrumbs.item href="#">Music</x-breadcrumbs.item>
                        <x-breadcrumbs.item current="true" last="true">Song</x-breadcrumbs.item>
                    </x-breadcrumbs>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-breadcrumbs color=&quot;blue&quot;&gt;...&lt;/x-breadcrumbs&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Variants</h2>
                <div class="grid gap-3">
                    <x-breadcrumbs variant="plain">
                        <x-breadcrumbs.item href="#">Home</x-breadcrumbs.item>
                        <x-breadcrumbs.item href="#">Music</x-breadcrumbs.item>
                        <x-breadcrumbs.item current="true" last="true">Song</x-breadcrumbs.item>
                    </x-breadcrumbs>
                    <x-breadcrumbs variant="soft" radius="lg">
                        <x-breadcrumbs.item href="#">Home</x-breadcrumbs.item>
                        <x-breadcrumbs.item href="#">Music</x-breadcrumbs.item>
                        <x-breadcrumbs.item current="true" last="true">Song</x-breadcrumbs.item>
                    </x-breadcrumbs>
                    <x-breadcrumbs variant="outline" radius="lg">
                        <x-breadcrumbs.item href="#">Home</x-breadcrumbs.item>
                        <x-breadcrumbs.item href="#">Music</x-breadcrumbs.item>
                        <x-breadcrumbs.item current="true" last="true">Song</x-breadcrumbs.item>
                    </x-breadcrumbs>
                    <x-breadcrumbs variant="pill" radius="full" separators="false">
                        <x-breadcrumbs.item href="#">Home</x-breadcrumbs.item>
                        <x-breadcrumbs.item href="#">Music</x-breadcrumbs.item>
                        <x-breadcrumbs.item current="true" last="true">Song</x-breadcrumbs.item>
                    </x-breadcrumbs>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-breadcrumbs variant=&quot;soft&quot; radius=&quot;lg&quot;&gt;...&lt;/x-breadcrumbs&gt;
                        &lt;x-breadcrumbs variant=&quot;outline&quot; radius=&quot;lg&quot;&gt;...&lt;/x-breadcrumbs&gt;
                        &lt;x-breadcrumbs variant=&quot;pill&quot;
                        separators=&quot;false&quot;&gt;...&lt;/x-breadcrumbs&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Radius</h2>
                <div class="grid gap-3">
                    <x-breadcrumbs variant="soft" radius="none">
                        <x-breadcrumbs.item href="#">Home</x-breadcrumbs.item>
                        <x-breadcrumbs.item href="#">Music</x-breadcrumbs.item>
                        <x-breadcrumbs.item current="true" last="true">Song</x-breadcrumbs.item>
                    </x-breadcrumbs>
                    <x-breadcrumbs variant="soft" radius="sm">
                        <x-breadcrumbs.item href="#">Home</x-breadcrumbs.item>
                        <x-breadcrumbs.item href="#">Music</x-breadcrumbs.item>
                        <x-breadcrumbs.item current="true" last="true">Song</x-breadcrumbs.item>
                    </x-breadcrumbs>
                    <x-breadcrumbs variant="soft" radius="md">
                        <x-breadcrumbs.item href="#">Home</x-breadcrumbs.item>
                        <x-breadcrumbs.item href="#">Music</x-breadcrumbs.item>
                        <x-breadcrumbs.item current="true" last="true">Song</x-breadcrumbs.item>
                    </x-breadcrumbs>
                    <x-breadcrumbs variant="soft" radius="lg">
                        <x-breadcrumbs.item href="#">Home</x-breadcrumbs.item>
                        <x-breadcrumbs.item href="#">Music</x-breadcrumbs.item>
                        <x-breadcrumbs.item current="true" last="true">Song</x-breadcrumbs.item>
                    </x-breadcrumbs>
                    <x-breadcrumbs variant="soft" radius="2xl">
                        <x-breadcrumbs.item href="#">Home</x-breadcrumbs.item>
                        <x-breadcrumbs.item href="#">Music</x-breadcrumbs.item>
                        <x-breadcrumbs.item current="true" last="true">Song</x-breadcrumbs.item>
                    </x-breadcrumbs>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-breadcrumbs variant=&quot;soft&quot; radius=&quot;2xl&quot;&gt;...&lt;/x-breadcrumbs&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Start & End Content</h2>
                <x-breadcrumbs>
                    <x-slot:startContent>
                        <x-icon type="outline" icon="home" size="16"></x-icon>
                    </x-slot:startContent>
                    <x-breadcrumbs.item href="#">Home</x-breadcrumbs.item>
                    <x-breadcrumbs.item href="#">Music</x-breadcrumbs.item>
                    <x-breadcrumbs.item href="#">Artist</x-breadcrumbs.item>
                    <x-breadcrumbs.item href="#">Album</x-breadcrumbs.item>
                    <x-breadcrumbs.item current="true" last="true">Song</x-breadcrumbs.item>
                    <x-slot:endContent>
                        <x-icon type="outline" icon="music" size="16"></x-icon>
                    </x-slot:endContent>
                </x-breadcrumbs>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-breadcrumbs&gt;
                        &lt;x-slot:startContent&gt;
                        &lt;x-icon type=&quot;outline&quot; icon=&quot;home&quot; size=&quot;16&quot;&gt;&lt;/x-icon&gt;
                        &lt;/x-slot:startContent&gt;
                        &lt;x-breadcrumbs.item href=&quot;#&quot;&gt;Home&lt;/x-breadcrumbs.item&gt;
                        &lt;x-breadcrumbs.item current=&quot;true&quot;
                        last=&quot;true&quot;&gt;Song&lt;/x-breadcrumbs.item&gt;
                        &lt;x-slot:endContent&gt;
                        &lt;x-icon type=&quot;outline&quot; icon=&quot;music&quot;
                        size=&quot;16&quot;&gt;&lt;/x-icon&gt;
                        &lt;/x-slot:endContent&gt;
                        &lt;/x-breadcrumbs&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Custom Separator</h2>
                <x-breadcrumbs separator="/" separatorType="text">
                    <x-breadcrumbs.item href="#">Home</x-breadcrumbs.item>
                    <x-breadcrumbs.item href="#">Music</x-breadcrumbs.item>
                    <x-breadcrumbs.item href="#">Artist</x-breadcrumbs.item>
                    <x-breadcrumbs.item href="#">Album</x-breadcrumbs.item>
                    <x-breadcrumbs.item current="true" last="true">Song</x-breadcrumbs.item>
                </x-breadcrumbs>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-breadcrumbs separator=&quot;/&quot; separatorType=&quot;text&quot;&gt;
                        &lt;x-breadcrumbs.item href=&quot;#&quot;&gt;Home&lt;/x-breadcrumbs.item&gt;
                        &lt;x-breadcrumbs.item current=&quot;true&quot;
                        last=&quot;true&quot;&gt;Song&lt;/x-breadcrumbs.item&gt;
                        &lt;/x-breadcrumbs&gt;
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
