<?php

namespace App\Livewire\Project;

use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormProject extends Component
{
    use WithFileUploads;

    public $isEditing = false;

    public $project;

    public $title = "";
    public $description = "";
    public $isPublic = 1;
    public $image;

    public function updateProject()
    {
        $imageName = null;
        $projectId = $this->project->id;

        if ($this->image != null) {
            $imageName = $this->generateUniqueFileName();
            $this->image->storeAs('images', $imageName, 'public');
        }

        if ($imageName == null) {
            $imageName = $this->project->image;
        }

        Project::firstWhere('id', $projectId)->update([
            'title' => $this->title,
            'description' => $this->description,
            'isPublic' => $this->isPublic,
            'image' => $imageName,
        ]);

        return $this->redirect('/dashboard');
    }

    public function createProject()
    {
        if ($this->image != null) {
            $imageName = $this->generateUniqueFileName();
            $this->image->storeAs('images', $imageName, 'public');
        }

        Project::create([
            'title' => $this->title,
            'description' => $this->description,
            'image' => $imageName,
            'isPublic' => $this->isPublic,
        ]);

        $this->redirect('/dashboard');
    }

    public function generateUniqueFileName()
    {
        $originalName = $this->image->getClientOriginalName();
        $extension = $this->image->extension();
        $uniqueName = md5($originalName . time()) . '.' . $extension;
        return $uniqueName;
    }

    public function read($id)
    {
        $project = Project::firstWhere('id', $id);
        $this->project = $project;

        $this->title = $project->title;
        $this->description = $project->description;
        $this->isPublic = $project->isPublic;
        $this->image = Storage::get('images/' . $project->image);
    }

    public function mount($id = null)
    {
        if ($id != null) {
            $this->isEditing = true;
            $this->read($id);
        }
    }

    public function render()
    {
        return view('livewire.project.form-project');
    }
}
