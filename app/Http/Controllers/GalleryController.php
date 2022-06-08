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
        $projects = Project::with('user')->whereNotNull('publish_date')->get();

        return view('gallery.index', [
            'projects' => $projects
        ]);
    }
}
