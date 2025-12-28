@extends('admin.layouts.app')

@section('title', 'Настройки профиля')

@section('content')
    <div class="grid gap-8">
        <div class="flex flex-wrap items-start justify-between gap-4">
            <div>
                <p class="text-xs uppercase tracking-[0.4em] text-slate-500 dark:text-slate-500">Профиль</p>
                <h1 class="mt-3 text-3xl font-semibold text-slate-900 dark:text-white">Настройки профиля</h1>
                <p class="mt-2 max-w-xl text-sm text-slate-500 dark:text-slate-400">
                    Обновите контактные данные и изображение профиля. Основное поле — номер телефона.
                </p>
            </div>
        </div>

        <div
            class="rounded-2xl border border-slate-200/70 bg-white/70 p-8 shadow-sm shadow-slate-900/5 dark:border-white/10 dark:bg-white/5 dark:shadow-none">
            @if (session('status'))
                <x-alert variant="success" title="Готово">
                    {{ session('status') }}
                </x-alert>
            @endif
            @if ($errors->any())
                <x-alert variant="danger" title="Ошибка">
                    Проверьте поля формы и попробуйте снова.
                </x-alert>
            @endif

            <form class="mt-6 grid gap-5" method="POST" action="{{ route('admin.profile.update') }}"
                enctype="multipart/form-data">
                @csrf
                <div
                    class="flex flex-wrap items-center gap-4 rounded-2xl border border-dashed border-slate-200/70 bg-white/60 p-4 dark:border-white/10 dark:bg-white/5">
                    <x-avatar :src="$user?->avatar" :name="$user?->name" size="lg" radius="full" tone="purple"></x-avatar>
                    <div class="min-w-[200px]">
                        <p class="text-sm font-semibold text-slate-900 dark:text-white">Текущий аватар</p>
                        <p class="text-xs text-slate-500 dark:text-slate-400">Загрузите новое изображение ниже.</p>
                    </div>
                </div>
                <x-input label="Имя" name="name" value="{{ old('name', $user?->name) }}" required="true"
                    :invalid="$errors->has('name')" :error-message="$errors->first('name')" placeholder="Ваше имя" />
                <x-input label="Номер телефона" name="phone" type="tel" value="{{ old('phone', $user?->phone) }}"
                    required="true" :invalid="$errors->has('phone')" :error-message="$errors->first('phone')" placeholder="+7 900 000 00 00" />
                <x-input label="Электронная почта" name="email" type="email" value="{{ old('email', $user?->email) }}"
                    :invalid="$errors->has('email')" :error-message="$errors->first('email')" placeholder="you@example.com" />
                <x-input label="Аватар" name="avatar" type="file" :invalid="$errors->has('avatar')" :error-message="$errors->first('avatar')"
                    description="PNG, JPG или WebP до 2 МБ." />

                <div class="flex flex-wrap items-center gap-3">
                    <x-button type="submit" size="md" variant="solid" color="primary">
                        Сохранить изменения
                    </x-button>
                    <span class="text-xs text-slate-500 dark:text-slate-400">
                        После сохранения данные обновятся в профиле.
                    </span>
                </div>
            </form>
        </div>
    </div>
@endsection
