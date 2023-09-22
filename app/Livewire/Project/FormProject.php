<?php

namespace App\Livewire\Project;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormProject extends Component
{
    use WithFileUploads;

    public $title = "";
    public $description = "";
    public $isPublic = 1;
    public $image;
    public $imagePreview;

    public function createProject()
    {
        $imageName = $this->nameImage();

        Project::create([
            'title' => $this->title,
            'description' => $this->description,
            'image' => $imageName,
            'isPublic' => $this->isPublic,
        ]);

        $this->redirect('/dashboard');
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:2048',
        ]);

        $this->imagePreview = $this->image->temporaryUrl();
    }

    public function nameImage()
    {
        $imageName = time() . '.' . $this->image->extension();
        $this->image->storeAs('images', $imageName, 'public');

        return $imageName;
    }

    public function render()
    {
        return view('livewire.project.form-project');
    }
}
