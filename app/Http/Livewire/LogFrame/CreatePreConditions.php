<?php

namespace App\Http\Livewire\LogFrame;

use App\Models\Logframe\PreCondition;
use App\Models\Logframe\Project;
use Livewire\Component;

class CreatePreConditions extends Component
{
    public $code;
    public $pre_condition;
    public $project;
    public $projects = [];


    protected $rules = [
        'code' =>'required|numeric|unique:pre_conditions',
        'pre_condition' =>'required',
        'project' =>'required',
    ];

    public function store(){
        $this->validate();

        $data  = PreCondition::create([
            'code' => $this->code,
            'pre_condition' => $this->pre_condition,
            'project_id' => $this->project,
        ]);

        $this->emit('refreshLivewireDatatable');
        $this->code = '';
        $this->pre_condition = '';
        $this->project = '';
        session()->flash('message', 'Pre Condition added succssfully.');

    }
    public function mount(){
        $this->projects = Project::select('id','name')->get();
    }

    public function render()
    {
        return view('livewire.log-frame.create-pre-conditions');
    }
}
