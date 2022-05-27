<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use App\Models\Project;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class UserController extends Controller
{
    /**
     * Returns user's page view.
     *
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $userId = auth()->user()->id;
        $projects = User::find($userId)->projects()->get();

        return view('user.index', [
            'projects' => $projects
        ]);
    }

    public function newProjectForm(): Factory|View|Application
    {
        $disc = Discipline::all();

        return view('user.projects.new', [
            'disciplines' => $disc
        ]);
    }

    /**
     * Result of a post request to create a new project
     *
     * @return Redirector|Application|RedirectResponse
     */
    public function newProject(): Redirector|Application|RedirectResponse
    {
        $attributes = request()->validate([
            'name' => 'required',
            'code' => 'required',
            'discipline_id' => ['required', 'exists:disciplines,id'],
            'theme' => ['min:3', 'required'],
            'files' => ['required']
        ]);

        $attributes['user_id'] = auth()->user()->id;

        // TODO Store files

        unset($attributes['files']);

        Project::factory(1)->create($attributes);

        return redirect('/')->with('success', 'Проект успешно создан');

    }
}
