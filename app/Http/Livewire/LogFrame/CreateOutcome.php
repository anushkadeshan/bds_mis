<?php

namespace App\Http\Livewire\LogFrame;

use App\Models\Logframe\Outcome;
use App\Models\Logframe\PreCondition;
use Livewire\Component;

class CreateOutcome extends Component
{
    public $code;
    public $outcome;
    public $pre_condition;
    public $pre_conditions = [];


    protected $rules = [
        'code' => 'required|unique:outcomes|numeric',
        'outcome' => 'required',
        'pre_condition' => 'required',
    ];

    public function store(){
        $this->validate();
        $data = Outcome::create([
            'code' => $this->code,
            'outcome' => $this->outcome,
            'pre_condition_id' => $this->pre_condition
        ]);

        $this->emit('refreshLivewireDatatable');
        $this->code = '';
        $this->pre_condition = '';
        $this->outcome = '';
        session()->flash('message', 'Outcome added succssfully.');
    }

    public function mount(){
        $this->pre_conditions = PreCondition::all();
    }

    public function render()
    {
        return view('livewire.log-frame.create-outcome');
    }
}
