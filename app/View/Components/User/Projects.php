<?php

namespace App\View\Components\User;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Projects extends Component
{

    public Collection $projects;
    public bool $create;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Collection $projects, bool $create = false)
    {
        $this->projects = $projects;
        $this->create = $create && !auth()->user()->isTeacher();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('components.user.projects');
    }
}
