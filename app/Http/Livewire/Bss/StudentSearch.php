<?php

namespace App\Http\Livewire\Bss;

use App\Models\bss\Student;
use Livewire\Component;
use Auth;

class StudentSearch extends Component
{
    public $query;
    public $students;

    public function updatedQuery(){
        $this->students = Student::select('id','name')->where('branch_id',Auth::user()->branch_id)
        ->where('name','like','%'.$this->query. '%')
        ->get()->toArray();
    }

    public function mount(){
        $this->query = '';
        $this->students = [];
    }

    public function selectStudent($id)
    {

        $this->students = [];
        $this->query = '';
        $this->emit('studentId', $id);
    }

    public function render()
    {
        return view('livewire.bss.student-search');
    }
}
