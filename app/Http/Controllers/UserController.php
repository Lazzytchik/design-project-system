<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Returns user's page view.
     *
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        return view('user.index');
    }
}
