<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Method for /auth request.
     *
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        return view('auth.index');
    }
}
