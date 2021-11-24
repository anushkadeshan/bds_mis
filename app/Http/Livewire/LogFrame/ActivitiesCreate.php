<?php

namespace App\Http\Livewire\LogFrame;

use Livewire\Component;
use App\Models\LogFrame\Activity;

class ActivitiesCreate extends Component
{
    public $code;
    public $name;
    public $type;

    protected $rules = [
        'name' => 'required',
        'code' => 'required',
        'type' => 'required',
    ];

    public function store(){
        $this->validate();

        Activity::create([
            'name' => $this->name,
            'code' => $this->code,
            'type' => $this->type,
        ]);
        $this->code = '';
        $this->name = '';
        $this->type = '';
        $this->emit('refreshLivewireDatatable');
        session()->flash('message', 'Activity Created Successfully');
    }
    public function render()
    {
        return view('livewire.log-frame.activities-create');
    }
}
