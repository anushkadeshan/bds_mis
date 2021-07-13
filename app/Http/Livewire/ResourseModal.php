<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\ResoursePerson;
class ResourseModal extends Component
{
    use WithFileUploads;
    public $name,$institute, $proffesion, $cv;

    public function updatedPhoto()
    {
        $this->validate([
            'cv' => 'mimes:pdf,docx|max:1024|required', // 1MB Max
        ]);
    }

    public function store(){
        $validatedData = $this->validate([
            'name' => 'required',
            'institute' => 'required',
            'proffesion' => 'required',
            'cv' => 'required'
        ]);

        $filename  = $this->cv->store('cvs');
        ResoursePerson::create(
            [
                'name' =>  $this->name,
                'institute' =>  $this->institute,
                'proffesion' =>  $this->proffesion,
                'cv' => $filename,
                'approved' =>false,
            ]
        );
        $this->resetInput();
        $this->emit('refreshLivewireDatatable');
        session()->flash('message', 'Resourse Person successfully Created.');

    }

    public function resetInput()
    {
        $this->name = '';
        $this->institute= '';
        $this->proffesion= '';
        $this->cv= '';
    }

    public function render()
    {
        return view('livewire.resourse-modal');
    }
}
