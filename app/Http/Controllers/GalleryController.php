<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Returns gallery page view.
     *
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $projects = Project::with('user')->get();

        return view('gallery.index', [
            'projects' => $projects
        ]);
    }

    /**
     * Detail page of a project.
     *
     * @param Project $project
     * @return Factory|View|Application
     */
    public function details(Project $project): Factory|View|Application
    {
        return view('gallery.detail', [
            'project' => $project
        ]);
    }
}
