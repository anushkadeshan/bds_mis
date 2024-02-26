<?php

namespace App\Http\Livewire\LogFrame;

use Livewire\Component;
use App\Models\LogFrame\Activity;
use App\Models\Logframe\Output;

class ActivitiesCreate extends Component
{
    public $code;
    public $name;
    public $type;
    public $outputs;
    public $indicators,
    $need_for_baseline,
    $means_of_verification,
    $assumptions_risks,
    $output_id,
    $running;


    protected $rules = [
        'name' => 'required',
        'code' => 'required|unique:activities|numeric',
        'type' => 'required',
        'indicators' => 'required',
        'need_for_baseline' => 'required',
        'means_of_verification' => 'required',
        'assumptions_risks' => 'required',
        'output_id' => 'required',
        'running' => 'required',
    ];

    public function store(){
        $this->validate();

        Activity::create([
            'name' => $this->name,
            'code' => $this->code,
            'type' => $this->type,
            'indicators' => $this->code,
            'need_for_baseline' => $this->need_for_baseline,
            'means_of_verification' => $this->means_of_verification,
            'assumptions_risks' => $this->assumptions_risks,
            'output_id' => $this->output_id,
            'running' => $this->running,
        ]);
        $this->code = '';
        $this->name = '';
        $this->type = '';
        $this->code = '';
        $this->need_for_baseline = '';
        $this->means_of_verification = '';
        $this->assumptions_risks = '';
        $this->output_id = '';
        $this->running = '';
        $this->emit('refreshLivewireDatatable');
        session()->flash('message', 'Activity Created Successfully');
    }

    public function mount(){
        $this->outputs = Output::all();
    }

    public function render()
    {
        return view('livewire.log-frame.activities-create');
    }
}
