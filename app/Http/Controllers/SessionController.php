<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Nette\Schema\ValidationException;

class SessionController extends Controller
{

    /**
     * Directs to login page
     *
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        return view('auth.index');
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(): Redirector|Application|RedirectResponse
    {
        $attributes = \request()->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($attributes)){
            session()->regenerate();
            return redirect('/')->with('success', 'Успешная авторизация');
        }


        throw \Illuminate\Validation\ValidationException::withMessages([
            'email' => 'Неверное имя пользователя.'
        ]);
        /*return back()
            ->withInput()
            ->withErrors(['email' => 'Неверные имя пользователя или пароль']);*/
    }

    /**
     * Logout and redirect to auth page.
     *
     * @return Redirector|Application|RedirectResponse
     */
    public function destroy(): Redirector|Application|RedirectResponse
    {
        auth()->logout();

        return redirect('/auth');
    }
}
