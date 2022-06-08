<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use App\Models\File;
use App\Models\Project;
use App\Models\User;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\NoReturn;

class UserController extends Controller
{
    /**
     * Returns user's page view.
     *
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {

        if (auth()->user()->isTeacher()){
            $projects = Project::with(['user', 'preview'])->whereNull('publish_date')->get();
        }else{
            $projects = auth()->user()->projects()->with(['user', 'preview'])->get();
        }

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
     * @param Request $request
     *
     * @return Redirector|Application|RedirectResponse
     */
    #[NoReturn] public function newProject(Request $request): Redirector|Application|RedirectResponse
    {


        //ddd(Project::with('preview')->where('id', 20)->get());

        $attributes = $request->validate([
            'name' => 'required',
            'code' => 'required',
            'discipline_id' => ['required', 'exists:disciplines,id'],
            'theme' => ['min:3', 'required'],
            'preview' => ['required', 'mimes:jpg,jpeg,png'],
            'files' => ['required']
        ]);

        $attributes['user_id'] = auth()->user()->id;

        // TODO Store files

        unset($attributes['files'], $attributes['preview']);

        /**
         * @var \Illuminate\Http\UploadedFile $file
         */
        $file = $request->preview;

        $preview = new File([
            'original_name' => $file->getClientOriginalName(),
            'extension' => $file->getClientOriginalExtension(),
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize()
        ]);
        $preview->save();

        $attributes['preview_id'] = $preview->id;

        /**
         * @var Project $project
         */
        $project = Project::factory(1)->create($attributes)->load('preview')->first();

        $project->storePreview($request->preview);

        return redirect('/user')->with('success', 'Проект успешно создан');

    }
}
