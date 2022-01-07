<?php

namespace App\Http\Livewire\Reports\Logframe;

use App\Models\Logframe\PreCondition;
use App\Models\Logframe\Project;
use Livewire\Component;

class Table extends Component
{
    public $projects = [];
    public $project_id;
    public $project;
    public $preconditions;

    public function mount()
    {
        if((session('project_id') =='')){
            $this->projects = Project::all();
           // $this->openModal();
        }
        else{
          //  $this->openModal();
            $this->project_id = session('project_id');
            $this->project = Project::find($this->project_id);
            $this->projects = Project::all();
            $this->preconditions = PreCondition::where('project_id',$this->project_id)->get();
        }
    }

    public function updatedProjectId($value){
        //$this->openModal();
        $this->project_id = $value;
        session(['project_id' => $this->project_id]);
        $this->project = Project::find($this->project_id);
        $this->preconditions = PreCondition::where('project_id',$this->project_id)->get();
        return redirect(request()->header('Referer'));

    }

    public function openModal(){
        $this->dispatchBrowserEvent('openModal');
    }
    public function closeModal(){
        $this->dispatchBrowserEvent('closeModal');

    }

    public function render()
    {
       // $this->mount();
        return view('livewire.reports.logframe.table');
    }
}
