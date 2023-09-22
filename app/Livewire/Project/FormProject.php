<?php

namespace App\Livewire\Project;

use App\Mail\EmailProject;
use App\Mail\Projects\CreateProject;
use App\Mail\Projects\DeleteProject;
use App\Mail\Projects\EditProject;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Mail;

class FormProject extends Component
{
    use WithFileUploads;

    public $isEditing = false;

    public $project;

    public $title = "";
    public $description = "";
    public $isPublic = 1;
    public $image;

    public function deleteProject()
    {
        $project = Project::firstWhere('id', $this->project->id);

        Mail::to(Auth::user()->email)->send(new DeleteProject($project));

        $project->delete();
        return $this->redirect('/dashboard');
    }

    public function updateProject()
    {
        $imageName = null;
        $oldProject = $this->project;

        if ($this->image != null) {
            $imageName = $this->generateUniqueFileName();
            $this->image->storeAs('images', $imageName, 'public');
        }

        if ($imageName == null) {
            $imageName = $oldProject->image;
        }

        $project = Project::find($oldProject->id);
        $project->title = $this->title;
        $project->description = $this->description;
        $project->isPublic = $this->isPublic;
        $project->image = $imageName;
        $project->save();

        Mail::to(Auth::user()->email)->send(new EditProject($project));

        return $this->redirect('/dashboard');
    }

    public function createProject()
    {
        if ($this->image != null) {
            $imageName = $this->generateUniqueFileName();
            $this->image->storeAs('images', $imageName, 'public');
        }

        $project = Project::create([
            'title' => $this->title,
            'description' => $this->description,
            'image' => $imageName,
            'isPublic' => $this->isPublic,
        ]);

        Mail::to(Auth::user()->email)->send(new CreateProject($project));
        Mail::to(Auth::user()->email)->later(now()->addMinutes(2), new CreateProject($project));

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
