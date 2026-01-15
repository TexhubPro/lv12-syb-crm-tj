<div
    class="relative w-full max-w-md rounded-[32px] border border-slate-200/70 bg-white/90 p-8 shadow-xl shadow-slate-900/10 backdrop-blur dark:border-white/10 dark:bg-slate-950/80 dark:shadow-black/40">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-xs uppercase tracking-[0.4em] text-slate-500">Безопасно</p>
            <h1 class="mt-2 text-2xl font-semibold text-slate-900 dark:text-white">Вход в админку</h1>
        </div>
        <x-button icon-only="true" aria-label="Переключить тему" variant="ghost" color="default" data-theme-toggle>
            <span data-theme-icon-light>
                <x-icon type="outline" icon="sun" size="5"></x-icon>
            </span>
            <span class="hidden" data-theme-icon-dark>
                <x-icon type="outline" icon="moon" size="5"></x-icon>
            </span>
        </x-button>
    </div>

    <p class="mt-3 text-sm text-slate-500 dark:text-slate-400">
        Войдите по номеру телефона, чтобы управлять рабочим пространством.
    </p>

    <form class="mt-6 grid gap-4" wire:submit.prevent="login">
        @if (session('status'))
            <x-alert variant="success" title="Готово">
                {{ session('status') }}
            </x-alert>
        @endif
        @if ($errors->any())
            <x-alert variant="danger" title="Ошибка входа">
                Проверьте номер телефона и пароль.
            </x-alert>
        @endif
        <x-input label="Номер телефона" name="phone" type="tel" wire:model.defer="phone"
            required="true" :invalid="$errors->has('phone')" :error-message="$errors->first('phone')"
            placeholder="931234567" />
        <x-input label="Пароль" name="password" type="password" wire:model.defer="password" required="true"
            toggle-password="true" :invalid="$errors->has('password')" :error-message="$errors->first('password')"
            placeholder="••••••••" />

        <x-button type="submit" size="lg" variant="solid" color="primary" class="mt-2 w-full">
            Войти
        </x-button>
    </form>

    <div
        class="mt-6 rounded-2xl border border-slate-200/70 bg-slate-900/5 p-4 text-xs text-slate-500 dark:border-white/10 dark:bg-white/5 dark:text-slate-400">
        Используйте номер телефона и пароль, выданные администратором.
    </div>
</div>
