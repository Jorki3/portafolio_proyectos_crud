<?php

namespace App\Livewire\Project;

use Livewire\Component;

class ProjectCard extends Component
{
    public $project;

    public function render()
    {
        return view('livewire.project.project-card');
    }
}
