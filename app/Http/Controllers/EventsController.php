<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Returns events page view.
     *
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        return view('events.index');
    }
}
