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

        if (Auth::attempt(['phone' => $validated['phone'], 'password' => $validated['password']])) {
            $request->session()->regenerate();
            $user = $request->user();
            $redirect = $user?->role === 'manager'
                ? route('manager.dashboard')
                : route('admin.dashboard');

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
