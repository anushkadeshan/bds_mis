<?php

namespace App\Http\Livewire\LogFrame;

use Livewire\Component;
use App\Models\DsOffice;
use App\Models\Logframe\Project;

class CreateProject extends Component
{
    public $name;
    public $started_at;
    public $end_at;
    public $districts;
    public $dsds;
    public $type;
    public $budget;
    public $goal;
    public $selectedDsd =NULL;
    public $editMode = false;

    public function mount(){
        $this->dsds = collect();
    }
    public function updatedDistricts($district)
    {
        if (!is_null($district)) {
            $this->dsds = DsOffice::where('district', $district)->get();
        }
    }

    protected $rules = [
        'selectedDsd' => 'required',
        'districts' => 'required',
        'end_at' => 'required',
        'started_at' => 'required',
        'name' => 'required',
        'type' => 'required',
        'budget' =>'required',
        'goal' => 'required'
    ];

    public function store(){
        $this->validate();
        $data = Project::create([
            'name' =>$this->name,
            'started_at' =>$this->started_at,
            'end_at' =>$this->end_at,
            'type' =>$this->type,
            'budget' => $this->budget,
            'goal' => $this->goal,
            'district' =>json_encode($this->districts),
            'dsds' => json_encode($this->selectedDsd),
        ]);
        $this->name = '';
        $this->started_at = '';
        $this->end_at = '';
        $this->type = '';
        $this->districts = '';
        $this->selectedDsd = '';
        $this->budget = '';
        $this->goal = '';

        $this->emit('refreshLivewireDatatable');

        session()->flash('message', 'Project added succssfully.');

    }


    public function render()
    {
        return view('livewire.log-frame.create-project');
    }
}
