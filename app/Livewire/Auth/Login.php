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


        $user = User::where('phone', $this->phone)->first();
        if (!$user) {
            if (Hash::check($this->password, $user->password)) {

                Auth::login($user, true);

                return redirect()->route('admin.dashboard');
            }
            return;
        }
        return;

    }

    public function render()
    {
        return view('livewire.auth.login')
            ->layout('layouts.auth');
    }
}
