<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use App\Models\File;
use App\Models\Project;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Redirector;

class ProjectController extends Controller
{
    /**
     * Controller method for project editing
     *
     * @param Project $project
     *
     * @return Factory|View|Application
     */
    public function edit(Project $project): Factory|View|Application
    {

        $disc = Discipline::all();

        if (!$project->isAuthor(auth()->user())){
            $this->details($project);
        }

        return \view('gallery.details.edit', [
            'project' => $project,
            'disciplines' => $disc
        ]);

    }

    /**
     * Controller method for edit save the project.
     *
     * @param Project $project
     * @param Request $request
     *
     * @return Redirector|Application|RedirectResponse
     */
    public function editSave(Project $project, Request $request): Redirector|Application|RedirectResponse
    {
        $user = auth()->user();

        if (!$project->isAuthor($user)){
            redirect('/gallery');
        }

        $attributes = $request->validate([
            'name' => 'required',
            'code' => 'required',
            'discipline_id' => ['required', 'exists:disciplines,id'],
            'theme' => ['min:3', 'required'],
            'preview' => ['mimes:jpg,jpeg,png'],
            //'files' => ['required']
        ]);

        // TODO Store files

        unset($attributes['preview']);

        /**
         * @var UploadedFile $file
         */
        $file = $request->preview;

        if ($file !== null){

            $preview = new File([
                'original_name' => $file->getClientOriginalName(),
                'extension' => $file->getClientOriginalExtension(),
                'mime_type' => $file->getMimeType(),
                'size' => $file->getSize()
            ]);
            $preview->save();

            $attributes['preview_id'] = $preview->id;

            $project->switchPreview($preview ,$request->preview);
        }

        $project->update($attributes);

        return redirect('/gallery/'.$project->id)->with('success', 'Проект успешно изменён');
    }

    /**
     * Controller method for project deletion.
     *
     * @param Project $project
     *
     * @return Redirector|Application|RedirectResponse
     */
    public function delete(Project $project): Redirector|Application|RedirectResponse
    {
        if ($project->isAuthor(auth()->user())){
            $project->delete();
            return redirect('/user')->with('success', 'Проект успешно удалён');
        }

        return redirect('/user');
    }

    public function publish(Project $project){

        $project->publish();

        return redirect('/gallery/'.$project->id);
    }

    /**
     * Detail page of a project.
     *
     * @param Project $project
     *
     * @return Factory|View|Application
     */
    public function details(Project $project): Factory|View|Application
    {
        if (!$project->isPublic() && $project->isAuthor(auth()->user())){
            redirect('/gallery');
        }

        return view('gallery.detail', [
            'project' => $project
        ]);
    }
}
