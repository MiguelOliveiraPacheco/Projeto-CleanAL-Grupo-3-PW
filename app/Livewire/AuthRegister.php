<?php
// app/Livewire/AuthRegister.php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthRegister extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $success = false;

    protected $rules = [
        'name' => 'required|min:3|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
    ];

    protected $messages = [
        'email.unique' => 'Este email já está registado.',
        'password.confirmed' => 'As passwords não coincidem.',
    ];

    public function register()
    {
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($user);
        request()->session()->regenerate();
        $this->success = true;

        // Limpa os campos
        $this->reset(['name', 'email', 'password', 'password_confirmation']);

        // Redirecionar após 2 segundos
        $this->dispatch('registration-complete');

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.auth-register');
    }
}
