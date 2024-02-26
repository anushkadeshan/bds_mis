<?php

namespace App\Http\Livewire\Bss;

use App\Models\bss\Student;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadProfilePicture extends Component
{
    use WithFileUploads;

    public $photo;
    public $student_id;

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);
    }
    public function save()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);

        $name = $this->photo->storePublicly('bss','public');
        if($name){
            $student=Student::find($this->student_id);
            $student->profile_picture = $name;
            $student->save();
            session()->flash('message', 'Profile picture of ' .$student->name. ' updated Successfully.');
        }
    }

    public function mount($student){
        $this->student_id = $student->id;
    }

    public function render()
    {
        return view('livewire.bss.upload-profile-picture');
    }
}
