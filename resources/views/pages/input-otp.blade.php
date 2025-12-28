<!DOCTYPE html>
<html lang="en" class="bg-white text-gray-900 dark:bg-gray-950 dark:text-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input OTP Component Docs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen antialiased">
    <div class="mx-auto w-full max-w-4xl px-6 py-10">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-semibold">Input OTP</h1>
            <button type="button" class="text-sm underline underline-offset-4" data-theme-toggle>
                Toggle Theme
            </button>
        </div>

        <div class="mt-8 grid gap-8">
            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Usage</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-input-otp name="otp" />
                    <p class="mt-3 text-sm text-gray-500 dark:text-gray-400">OTP value: <span data-otp-display>-</span></p>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full" data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-nowrap block" data-code>
&lt;x-input-otp name=&quot;otp&quot; /&gt;
                    </code>
                    <button class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Disabled</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-input-otp disabled="true" value="1234" />
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full" data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-nowrap block" data-code>
&lt;x-input-otp disabled=&quot;true&quot; value=&quot;1234&quot; /&gt;
                    </code>
                    <button class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Read Only</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-input-otp read-only="true" value="1234" />
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full" data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-nowrap block" data-code>
&lt;x-input-otp read-only=&quot;true&quot; value=&quot;1234&quot; /&gt;
                    </code>
                    <button class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Required</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-input-otp required="true" />
                    <div class="mt-4">
                        <x-button variant="bordered" color="default">Submit</x-button>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full" data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-nowrap block" data-code>
&lt;x-input-otp required=&quot;true&quot; /&gt;
                    </code>
                    <button class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Sizes</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="grid gap-4">
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">size: sm</p>
                            <x-input-otp size="sm" />
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">size: md</p>
                            <x-input-otp size="md" />
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">size: lg</p>
                            <x-input-otp size="lg" />
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full" data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-nowrap block" data-code>
&lt;x-input-otp size=&quot;sm&quot; /&gt;
&lt;x-input-otp size=&quot;md&quot; /&gt;
&lt;x-input-otp size=&quot;lg&quot; /&gt;
                    </code>
                    <button class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Colors</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="grid gap-4">
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">color: default</p>
                            <x-input-otp color="default" />
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">color: primary</p>
                            <x-input-otp color="primary" />
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">color: secondary</p>
                            <x-input-otp color="secondary" />
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">color: success</p>
                            <x-input-otp color="success" />
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">color: warning</p>
                            <x-input-otp color="warning" />
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">color: danger</p>
                            <x-input-otp color="danger" />
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full" data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-nowrap block" data-code>
&lt;x-input-otp color=&quot;primary&quot; /&gt;
                    </code>
                    <button class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Variants</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="grid gap-4">
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">variant: flat</p>
                            <x-input-otp variant="flat" />
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">variant: bordered</p>
                            <x-input-otp variant="bordered" />
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">variant: underlined</p>
                            <x-input-otp variant="underlined" />
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">variant: faded</p>
                            <x-input-otp variant="faded" />
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full" data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-nowrap block" data-code>
&lt;x-input-otp variant=&quot;flat&quot; /&gt;
&lt;x-input-otp variant=&quot;bordered&quot; /&gt;
&lt;x-input-otp variant=&quot;underlined&quot; /&gt;
&lt;x-input-otp variant=&quot;faded&quot; /&gt;
                    </code>
                    <button class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Radius</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="grid gap-4">
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">radius: none</p>
                            <x-input-otp radius="none" />
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">radius: sm</p>
                            <x-input-otp radius="sm" />
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">radius: md</p>
                            <x-input-otp radius="md" />
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">radius: lg</p>
                            <x-input-otp radius="lg" />
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">radius: full</p>
                            <x-input-otp radius="full" />
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full" data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-nowrap block" data-code>
&lt;x-input-otp radius=&quot;none&quot; /&gt;
&lt;x-input-otp radius=&quot;full&quot; /&gt;
                    </code>
                    <button class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Password</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-input-otp type="password" variant="bordered" />
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full" data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-nowrap block" data-code>
&lt;x-input-otp type=&quot;password&quot; variant=&quot;bordered&quot; /&gt;
                    </code>
                    <button class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Description</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-input-otp description="This is description to the OTP component." />
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full" data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-nowrap block" data-code>
&lt;x-input-otp description=&quot;This is description to the OTP component.&quot; /&gt;
                    </code>
                    <button class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Error Message</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-input-otp invalid="true" error-message="Invalid OTP code" color="danger" />
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full" data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-nowrap block" data-code>
&lt;x-input-otp invalid=&quot;true&quot; error-message=&quot;Invalid OTP code&quot; color=&quot;danger&quot; /&gt;
                    </code>
                    <button class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Controlled</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <x-input-otp name="controlled-otp" />
                    <p class="mt-3 text-sm text-gray-500 dark:text-gray-400">value: <span data-otp-display>-</span></p>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full" data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-nowrap block" data-code>
&lt;x-input-otp name=&quot;controlled-otp&quot; /&gt;
                    </code>
                    <button class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Different Lengths &amp; Validation</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800">
                    <div class="grid gap-4">
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Basic length (4 digits)</p>
                            <x-input-otp length="4" />
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">6 digits OTP</p>
                            <x-input-otp length="6" />
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-3 py-2 text-xs font-mono dark:border-gray-800 max-w-full" data-code-row>
                    <code class="flex-1 min-w-0 overflow-x-auto whitespace-nowrap block" data-code>
&lt;x-input-otp length=&quot;4&quot; /&gt;
&lt;x-input-otp length=&quot;6&quot; /&gt;
                    </code>
                    <button class="text-[11px] uppercase tracking-wider text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" data-copy>Copy</button>
                </div>
            </section>

            <section class="grid gap-3">
                <h2 class="text-lg font-semibold">Slots</h2>
                <div class="rounded-2xl border border-gray-200 p-6 dark:border-gray-800 text-sm text-gray-600 dark:text-gray-400">
                    <ul class="list-disc pl-5 grid gap-2">
                        <li><span class="font-semibold text-gray-900 dark:text-gray-100">baseClass</span>: applied to every OTP segment.</li>
                        <li><span class="font-semibold text-gray-900 dark:text-gray-100">wrapperClass</span>: wrapper around label + inputs.</li>
                        <li><span class="font-semibold text-gray-900 dark:text-gray-100">segmentWrapperClass</span>: wrapper for all OTP segments.</li>
                        <li><span class="font-semibold text-gray-900 dark:text-gray-100">segmentClass</span>: extra classes for each segment.</li>
                        <li><span class="font-semibold text-gray-900 dark:text-gray-100">labelClass</span>, <span class="font-semibold text-gray-900 dark:text-gray-100">descriptionClass</span>, <span class="font-semibold text-gray-900 dark:text-gray-100">errorClass</span>: text styling.</li>
                    </ul>
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
