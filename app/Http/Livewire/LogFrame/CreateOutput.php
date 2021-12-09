<?php

namespace App\Http\Livewire\LogFrame;

use App\Models\Logframe\Outcome;
use App\Models\Logframe\Output;
use Livewire\Component;

class CreateOutput extends Component
{

    public $code;
    public $output;
    public $outcome_id;
    public $outcomes = [];

    protected $rules = [
        'code' => 'required|unique:outputs|numeric',
        'output' => 'required',
        'outcome_id' => 'required',
    ];

    public function store(){
        $this->validate();
        $data = Output::create([
            'code' => $this->code,
            'output' => $this->output,
            'outcome_id' => $this->outcome_id
        ]);

        $this->emit('refreshLivewireDatatable');
        $this->code = '';
        $this->output = '';
        $this->outcome_id = '';
        session()->flash('message', 'Output added succssfully.');
    }

    public function mount(){
        $this->outcomes = Outcome::all();
    }
    public function render()
    {
        return view('livewire.log-frame.create-output');
    }
}
