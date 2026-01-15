<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Login extends Component
{
    public string $phone = '';
    public string $password = '';

    public function login(): ?\Symfony\Component\HttpFoundation\Response
    {
        $this->validate([
            'phone' => ['required', 'string', 'max:30'],
            'password' => ['required', 'string'],
        ]);

        $user = User::where('phone', $this->phone)->first();
        if (!$user || !Hash::check($this->password, $user->password)) {
            $this->addError('phone', 'Неверный номер телефона или пароль.');
            $this->reset('password');
            return null;
        }

        Auth::login($user, true);

        $redirect = match ($user?->role) {
            'manager' => route('manager.dashboard'),
            'surveyor' => route('surveyor.cashier'),
            default => route('admin.dashboard'),
        };

        request()->session()->regenerate();
        return redirect()->intended($redirect);
    }

    public function render()
    {
        return view('livewire.auth.login')
            ->layout('layouts.auth');
    }
}
