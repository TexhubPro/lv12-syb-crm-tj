<!DOCTYPE html>
<html lang="en" class="bg-white text-gray-900 dark:bg-gray-950 dark:text-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Component Docs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen antialiased">
    <div class="mx-auto w-full max-w-4xl px-6 py-10">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-semibold">Input</h1>
            <button type="button" class="text-sm underline underline-offset-4" data-theme-toggle>
                Toggle Theme
            </button>
        </div>

        <div class="mt-8 grid gap-8">
            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Usage</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-input label="Username" placeholder="Enter your username" required="true" />
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-input label=&quot;Username&quot; placeholder=&quot;Enter your username&quot;
                        required=&quot;true&quot; /&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Disabled</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-input label="Email" placeholder="Enter your email" disabled="true" />
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-input label=&quot;Email&quot; placeholder=&quot;Enter your email&quot;
                        disabled=&quot;true&quot; /&gt;
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
                        <x-input label="Email" placeholder="Enter your email" label-placement="outside" />
                        <x-input label="Email" placeholder="Enter your email" label-placement="outside-left" />
                        <x-input label="Email" placeholder="Enter your email" label-placement="outside-top" />
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-input label=&quot;Email&quot; placeholder=&quot;Enter your email&quot;
                        label-placement=&quot;inside&quot; /&gt;
                        &lt;x-input label=&quot;Email&quot; placeholder=&quot;Enter your email&quot;
                        label-placement=&quot;outside-left&quot; /&gt;
                        &lt;x-input label=&quot;Email&quot; placeholder=&quot;Enter your email&quot;
                        label-placement=&quot;outside-top&quot; /&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">With Description</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-input label="Email" value="junior@heroui.com"
                        description="We'll never share your email with anyone else." />
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-input label=&quot;Email&quot; value=&quot;junior@heroui.com&quot; description=&quot;We'll
                        never share your email with anyone else.&quot; /&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">With Error Message</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-input label="Email" value="junior2heroui.com" invalid="true"
                        error-message="Please enter a valid email" />
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-input label=&quot;Email&quot; value=&quot;junior2heroui.com&quot; invalid=&quot;true&quot;
                        error-message=&quot;Please enter a valid email&quot; /&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Realtime Validation</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-input label="Password" placeholder="Enter your password" invalid="true" :error-message="[
                        'Password must be 4 characters or more.',
                        'Password must include at least 1 upper case letter.',
                        'Password must include at least 1 symbol.',
                    ]" />
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-input
                        label=&quot;Password&quot;
                        placeholder=&quot;Enter your password&quot;
                        invalid=&quot;true&quot;
                        :error-message=&quot;[&#039;Password must be 4 characters or more.&#039;, &#039;Password must
                        include at least 1 upper case letter.&#039;, &#039;Password must include at least 1
                        symbol.&#039;]&quot;
                        /&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Custom Validation</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-input label="Username" placeholder="Enter your username" invalid="true"
                        error-message="Username is already taken." />
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-input label=&quot;Username&quot; placeholder=&quot;Enter your username&quot;
                        invalid=&quot;true&quot; error-message=&quot;Username is already taken.&quot; /&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Controlled</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-input id="controlled-input" label="Email" placeholder="Enter your email" />
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Input value: <span
                            id="controlled-value"></span></p>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-input id=&quot;controlled-input&quot; label=&quot;Email&quot; placeholder=&quot;Enter your
                        email&quot; /&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Start &amp; End Content</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="grid gap-4">
                        <x-input label="Email" placeholder="you@example.com" wire:model="name">
                            <x-slot name="endContent">
                                <x-icon type="outline" icon="mail" size="24"></x-icon>
                            </x-slot>
                        </x-input>
                        <x-input label="Email" placeholder="you@example.com" wire:model="name">
                            <x-slot name="startContent">
                                <x-icon type="filled" icon="mail" size="24"></x-icon>
                            </x-slot>
                        </x-input>
                        <x-input label="Price" placeholder="0.00" end-content="$" />
                        <x-input label="Website" placeholder="heroui" end-content=".org" />
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-input label=&quot;Email&quot; placeholder=&quot;you@example.com&quot;&gt;
                        &lt;x-slot name=&quot;startContent&quot;&gt;
                        &lt;x-icon type=&quot;outline&quot; icon=&quot;mail&quot; size=&quot;18&quot;&gt;&lt;/x-icon&gt;
                        &lt;/x-slot&gt;
                        &lt;/x-input&gt;
                        &lt;x-input label=&quot;Price&quot; placeholder=&quot;0.00&quot; end-content=&quot;$&quot; /&gt;
                        &lt;x-input label=&quot;Website&quot; placeholder=&quot;heroui&quot;
                        end-content=&quot;.org&quot; /&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Clear Button</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-input label="Email" value="junior@heroui.com" clearable="true" />
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-input label=&quot;Email&quot; value=&quot;junior@heroui.com&quot;
                        clearable=&quot;true&quot; /&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Password Input</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-input label="Password" type="password" placeholder="Enter your password"
                        toggle-password="true" />
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-input label=&quot;Password&quot; type=&quot;password&quot; placeholder=&quot;Enter your
                        password&quot;
                        toggle-password=&quot;true&quot; /&gt;
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
                        <x-input label="Email" placeholder="Small" size="sm" />
                        <x-input label="Email" placeholder="Medium" size="md" />
                        <x-input label="Email" placeholder="Large" size="lg" />
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-input label=&quot;Email&quot; placeholder=&quot;Small&quot; size=&quot;sm&quot; /&gt;
                        &lt;x-input label=&quot;Email&quot; placeholder=&quot;Medium&quot; size=&quot;md&quot; /&gt;
                        &lt;x-input label=&quot;Email&quot; placeholder=&quot;Large&quot; size=&quot;lg&quot; /&gt;
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
                        <x-input label="Email" value="junior@heroui.com" radius="full" />
                        <x-input label="Email" value="junior@heroui.com" radius="2xl" />
                        <x-input label="Email" value="junior@heroui.com" radius="lg" />
                        <x-input label="Email" value="junior@heroui.com" radius="md" />
                        <x-input label="Email" value="junior@heroui.com" radius="sm" />
                        <x-input label="Email" value="junior@heroui.com" radius="none" />
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-input label=&quot;Email&quot; value=&quot;junior@heroui.com&quot; radius=&quot;full&quot;
                        /&gt;
                        &lt;x-input label=&quot;Email&quot; value=&quot;junior@heroui.com&quot; radius=&quot;none&quot;
                        /&gt;
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
                        <x-input label="Email" placeholder="Filled" variant="filled" />
                        <x-input label="Email" placeholder="Outline" variant="outline" />
                        <x-input label="Email" placeholder="Flat" variant="flat" />
                        <x-input label="Email" placeholder="Underlined" variant="underlined" />
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-input label=&quot;Email&quot; placeholder=&quot;Filled&quot; variant=&quot;filled&quot;
                        /&gt;
                        &lt;x-input label=&quot;Email&quot; placeholder=&quot;Underlined&quot;
                        variant=&quot;underlined&quot; /&gt;
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
                        <x-input label="Email" value="junior@heroui.com" color="default" variant="filled" />
                        <x-input label="Email" value="junior@heroui.com" color="primary" variant="filled" />
                        <x-input label="Email" value="junior@heroui.com" color="secondary" variant="filled" />
                        <x-input label="Email" value="junior@heroui.com" color="success" variant="filled" />
                        <x-input label="Email" value="junior@heroui.com" color="warning" variant="filled" />
                        <x-input label="Email" value="junior@heroui.com" color="danger" variant="filled" />
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-input label=&quot;Email&quot; value=&quot;junior@heroui.com&quot;
                        color=&quot;primary&quot; variant=&quot;filled&quot; /&gt;
                    </code>
                    <button
                        class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                        data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Built-in Validation</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="grid gap-4">
                        <x-input label="Username" placeholder="Enter your username" required="true"
                            minlength="4" />
                        <x-input label="Email" placeholder="you@example.com" type="email" />
                        <x-input label="Website" placeholder="https://heroui.com" type="url" />
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full"
                    data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-normal block" data-code>
                        &lt;x-input label=&quot;Username&quot; placeholder=&quot;Enter your username&quot;
                        required=&quot;true&quot; minlength=&quot;4&quot; /&gt;
                        &lt;x-input label=&quot;Email&quot; placeholder=&quot;you@example.com&quot;
                        type=&quot;email&quot; /&gt;
                        &lt;x-input label=&quot;Website&quot; placeholder=&quot;https://heroui.com&quot;
                        type=&quot;url&quot; /&gt;
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

        const controlledInput = document.getElementById('controlled-input');
        const controlledValue = document.getElementById('controlled-value');
        if (controlledInput && controlledValue) {
            const update = () => {
                controlledValue.textContent = controlledInput.value || '-';
            };
            update();
            controlledInput.addEventListener('input', update);
        }
    </script>
</body>

</html>
