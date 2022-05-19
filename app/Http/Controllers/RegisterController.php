<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create(): Factory|View|Application
    {
        return view('auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'username' => ['required', 'max:255'],
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')], //'unique:users,email'
            'password' => ['required', 'min:7', 'max:255']
        ]);

        $user = User::create($attributes);

        auth()->login($user);
        //session()->flash('success', 'Вы успешно зарегистрировались');

        return redirect('/')->with('success', 'Вы успешно зарегистрировались');;
    }
}
