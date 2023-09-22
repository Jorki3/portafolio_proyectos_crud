<?php

namespace App\Livewire\Project;

use Livewire\Component;
use Livewire\WithFileUploads;

class FormProject extends Component
{
    use WithFileUploads;

    public $title = "";
    public $description = "";

    public $image;
    public $imagePreview;

    public function createProject()
    {
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:2048', // Max size 2MB
        ]);

        $this->imagePreview = $this->image->temporaryUrl();
    }

    public function nameImage()
    {
        $imageName = time() . '.' . $this->image->extension();
        $this->image->storeAs('images', $imageName, 'public');
    }

    public function render()
    {
        return view('livewire.project.form-project');
    }
}
