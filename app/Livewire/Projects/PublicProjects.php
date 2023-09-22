<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;

class PublicProjects extends Component
{
    public function read()
    {
        return Project::where('isPublic', 1)->get();
    }

    public function render()
    {
        return view('livewire.projects.public-projects', [
            'projects' => $this->read()
        ]);
    }
}
