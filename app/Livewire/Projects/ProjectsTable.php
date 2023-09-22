<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;

class ProjectsTable extends Component
{
    public function editForm($id)
    {
        $this->redirect('/edit-project/' . $id);
    }

    public function read()
    {
        return Project::all();
    }

    public function render()
    {
        return view('livewire.projects.projects-table', [
            'projects' => $this->read()
        ]);
    }
}
