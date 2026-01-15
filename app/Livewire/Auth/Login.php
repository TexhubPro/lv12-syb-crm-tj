<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public string $phone = '';
    public string $password = '';

    public function login()
    {
        $validated = $this->validate([
            'phone' => ['required', 'string', 'max:30'],
            'password' => ['required', 'string'],
        ]);

        $digits = preg_replace('/\D+/', '', $validated['phone']);
        $trimmedZeros = ltrim($digits, '0');

        $authenticated = Auth::attempt(['phone' => $digits, 'password' => $validated['password']], true);
        if (!$authenticated && $trimmedZeros !== '') {
            $authenticated = Auth::attempt(['phone' => $trimmedZeros, 'password' => $validated['password']], true);
        }

        if (!$authenticated) {
            $this->addError('phone', 'Неверный номер телефона или пароль.');
            $this->reset('password');
            return null;
        }

        request()->session()->regenerate();
        $user = Auth::user();
        $redirect = match ($user?->role) {
            'manager' => route('manager.dashboard'),
            'surveyor' => route('surveyor.cashier'),
            default => route('admin.dashboard'),
        };

        return redirect()->intended($redirect);
    }

    public function render()
    {
        return view('livewire.auth.login')
            ->layout('layouts.auth');
    }
}
