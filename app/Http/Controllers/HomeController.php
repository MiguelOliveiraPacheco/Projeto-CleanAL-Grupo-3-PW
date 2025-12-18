<?php

namespace App\Http\Controllers;

use App\Models\User;

class HomeController extends \Illuminate\Routing\Controller
{
    public function index()
    {
        if (session()->has('user_id')) {
            $user = Utilizador::find(session('user_id'));
            return view('home', ['user' => $user]);
        }

        return view('home', ['user' => null]);
    }
}
