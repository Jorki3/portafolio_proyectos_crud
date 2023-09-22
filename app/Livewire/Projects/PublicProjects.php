<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class PublicProjects extends Component
{
    use WithPagination;

    public function read()
    {
        return Project::where('isPublic', 1)->paginate(4);
    }

    public function render()
    {
        return view('livewire.projects.public-projects', [
            'projects' => $this->read()
        ]);
    }
}
