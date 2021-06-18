<?php

namespace App\Http\Livewire\Bss;

use Livewire\Component;
use App\Models\bss\Student;

class StreamConfirmed extends Component
{

    public $confirmed_al_stream;
    public $student_id;

    public function mount($id){
        $student = Student::select('confirmed_al_stream')->find($id);
        $this->student_id = $id;
        $this->confirmed_al_stream = $student->confirmed_al_stream;

    }

    public function changeStatus(){

        $student =Student::find($this->student_id);
        $student->confirmed_al_stream = $this->confirmed_al_stream;
        $student->save();

        session()->flash('message', 'A/L stream confirmed status of' .$student->name. ' updated Successfully.');
    }
    public function render()
    {
        return view('livewire.bss.stream-confirmed');
    }
}
