<?php
// app/Livewire/AuthLogin.php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthLogin extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;
    public $error = '';

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function login()
    {
        $this->validate();

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials, $this->remember)) {
            request()->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        $this->error = 'Credenciais inválidas.';
        $this->password = '';
    }

    public function render()
    {
        return view('livewire.auth-login');
    }
}
