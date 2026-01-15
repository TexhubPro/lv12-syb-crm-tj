<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'phone' => ['required', 'string', 'max:30'],
            'password' => ['required', 'string'],
        ]);

        $digits = preg_replace('/\D+/', '', $validated['phone']);
        $trimmedZeros = ltrim($digits, '0');

        if (
            Auth::attempt(['phone' => $digits, 'password' => $validated['password']], true) ||
            ($trimmedZeros !== '' && Auth::attempt(['phone' => $trimmedZeros, 'password' => $validated['password']], true))
        ) {
            $request->session()->regenerate();
            $user = $request->user();
            $redirect = match ($user?->role) {
                'manager' => route('manager.dashboard'),
                'surveyor' => route('surveyor.cashier'),
                default => route('admin.dashboard'),
            };

            return redirect()->intended($redirect);
        }

        return back()
            ->withErrors(['phone' => 'Неверный номер телефона или пароль.'])
            ->onlyInput('phone');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
