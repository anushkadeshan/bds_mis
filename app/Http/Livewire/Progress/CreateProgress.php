<?php

namespace App\Http\Livewire\Progress;

use Livewire\Component;
use App\Models\Program\Progress;
use App\Models\LogFrame\Activity;
use App\Models\Program\Financial\BudgetType;

class CreateProgress extends Component
{
    public $activities = [];
    public $budgetTypes = [];
    public $activity_code, $year, $no_of_units, $cost_per_unit, $completed_date, $budget_type;
    public $progress_id;
    public $updateMode = false;

    protected $listeners = ['editBudget' => 'edit'];

    public function mount(){
        $this->activities = Activity::get();
        $this->budgetTypes = BudgetType::get();
    }

    protected $rules = [
        'activity_code' => 'required',
        'year' => 'required',
        'no_of_units' => 'required',
        'cost_per_unit' => 'required',
        'completed_date' => 'required',
        'budget_type' => 'required'
    ];



    public function store(){
        $this->validate();

        $progress = Progress::create([
            'activity_code' => $this->activity_code,
            'year' => $this->year,
            'no_of_units' => $this->no_of_units,
            'cost_per_unit' => $this->cost_per_unit,
            'completed_date' => $this->completed_date,
            'budget_type' => $this->budget_type,
            'added_by' => auth()->user()->id,
            'approved' => false,
        ]);
        $this->emit('refreshLivewireDatatable');
        $this->clear();
        session()->flash('message', 'Progress Created Successfully.');
    }

    public function clear(){
        $this->activity_code = '';
        $this->year = '';
        $this->no_of_units = '';
        $this->cost_per_unit = '';
        $this->completed_date = '';
        $this->budget_type = '';
    }

    public function edit($id){

        $this->updateMode = true;
        $progress = Progress::find($id);
        $this->progress_id = $progress->id;
        $this->activity_code = $progress->activity_code;
        $this->year = $progress->year;
        $this->no_of_units = $progress->no_of_units;
        $this->cost_per_unit = $progress->cost_per_unit;
        $this->completed_date = $progress->completed_date;
        $this->budget_type = $progress->budget_type;
        $this->openModal();
    }

    public function update(){
        $progress = Progress::find($this->progress_id);
        $progress->activity_code = $this->activity_code;
        $progress->year = $this->year;
        $progress->no_of_units = $this->no_of_units;
        $progress->cost_per_unit = $this->cost_per_unit;
        $progress->completed_date = $this->completed_date;
        $progress->budget_type = $this->budget_type;
        $progress->save();
        $this->emit('refreshLivewireDatatable');
        $this->closeModal();
        $this->updateMode = false;
        $this->clear();
        session()->flash('message', 'Progress Updated Successfully.');
    }

    public function openModal(){
        $this->dispatchBrowserEvent('openModal');
    }
    public function closeModal(){
        $this->dispatchBrowserEvent('closeModal');
    }


    public function render()
    {
        return view('livewire.progress.create-progress');
    }
}
