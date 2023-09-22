<?php

namespace App\Livewire\Projects;

use Livewire\Component;

class Projects extends Component
{
    public function createForm()
    {
        $this->redirect('/create-project');
    }

    public function render()
    {
        return view('livewire.projects.projects');
    }
}
