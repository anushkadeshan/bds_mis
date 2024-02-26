<?php

namespace App\Http\Livewire\Skill\Youths;

use Livewire\Component;
use App\Models\skill\Family;

class FamilySearch extends Component
{
    public $families;
    public $query;
    public $students;
    public $bss_student_id;

    public function updatedQuery(){
        $this->families = Family::select('id','head_of_household','nic_head_of_household')
        ->where('head_of_household','like','%'.$this->query. '%')
        ->orWhere('nic_head_of_household','like','%'.$this->query. '%')
        ->get()->toArray();
    }

    public function selectStudent($id)
    {
        $this->students = [];
        $this->query = '';
        $this->bss_student_id = $id;
    }
    public function save(){
        $this->step1 = true;
    }

    public function mount(){
        $this->query = '';
        $this->students = [];
    }

    public function render()
    {
        return view('livewire.skill.youths.family-search');
    }
}
