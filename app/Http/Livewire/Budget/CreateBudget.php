<?php

namespace App\Http\Livewire\Budget;

use DateTime;
use DatePeriod;
use DateInterval;
use Livewire\Component;
use App\Models\LogFrame\Activity;
use App\Models\Program\Financial\Budget;
use App\Models\Program\Financial\BudgetType;
use App\Models\Program\Financial\MonthlyBudget;

class CreateBudget extends Component
{
    public $activities = [];
    public $budget_types = [];
    public $activity_code, $year, $no_of_units, $cost_per_unit, $budget_valid_from, $budget_valid_to , $budget_type;
    public $month, $physical_target, $cost_per_unit1;
    public $updateMode = false;
    public $months = [];

    protected $listeners = ['editBudget' => 'edit'];

    public function mount(){
        $this->activities = Activity::get();
        $this->budget_types = BudgetType::get();
    }

    protected $rules = [
        'activity_code' => 'required',
        'year' => 'required',
        'no_of_units' => 'required',
        'cost_per_unit' => 'required',
        'budget_valid_from' => 'required',
        'budget_valid_to' => 'required',
        'budget_type' => 'required'
    ];

    public function updatedBudgetValidTo(){
        $start =  new DateTime($this->budget_valid_from);
        $start->modify('first day of this month');

        $end = new DateTime($this->budget_valid_to);
        $end->modify('first day of next month');

        $interval = DateInterval::createFromDateString('1 month');
        $period   = new DatePeriod($start, $interval, $end);
        $ret = array();
        foreach ($period as $dt) {
            $ret[] = $dt->format("F");
        }
        $this->months= $ret;
    }

    public function store(){
        $this->validate();

        $budget = Budget::create([
            'activity_code' => $this->activity_code,
            'year' => $this->year,
            'no_of_units' => $this->no_of_units,
            'cost_per_unit' => $this->cost_per_unit,
            'budget_valid_from' => $this->budget_valid_from,
            'budget_valid_to' => $this->budget_valid_to,
            'budget_type' => $this->budget_type,
            'added_by' => auth()->user()->id,
            'approved' => false,
        ]);
        if (!is_null($this->month || $this->cost_per_unit1 || $this->physical_target)){
            foreach($this->months as $key => $value ){
                MonthlyBudget::create([
                    'month' => $value,
                    'physical_target'=> $this->physical_target[$key],
                    'cost_per_unit' => $this->cost_per_unit1[$key],
                    'budget_id' => $budget->id
                ]);
            }
        }

        $this->emit('refreshLivewireDatatable');
        $this->clear();
        session()->flash('message', 'Budget Created Successfully.');
    }

    public function monthlyBudget(){
        $this->validate();
    }

    public function clear(){
        $this->activity_code = '';
        $this->year = '';
        $this->no_of_units = '';
        $this->cost_per_unit = '';
        $this->budget_valid_from = '';
        $this->budget_valid_to = '';
        $this->budget_type;
    }

    public function edit($id){

        $this->updateMode = true;
        $budget = Budget::find($id);
        $this->budget_id = $budget->id;
        $this->activity_code = $budget->activity_code;
        $this->year = $budget->year;
        $this->no_of_units = $budget->no_of_units;
        $this->cost_per_unit = $budget->cost_per_unit;
        $this->budget_valid_from = $budget->budget_valid_from;
        $this->budget_valid_to = $budget->budget_valid_to;
        $this->budget_type = $budget->budget_type;
        $this->openModal();
    }

    public function update(){
        $budget = Budget::find($this->budget_id);
        $budget->activity_code = $this->activity_code;
        $budget->year = $this->year;
        $budget->no_of_units = $this->no_of_units;
        $budget->cost_per_unit = $this->cost_per_unit;
        $budget->budget_valid_from = $this->budget_valid_from;
        $budget->budget_valid_to = $this->budget_valid_to;
        $budget->budget_type = $this->budget_type;
        $budget->save();
        $this->emit('refreshLivewireDatatable');
        $this->closeModal();
        $this->updateMode = false;
        $this->clear();
        session()->flash('message', 'Budget Updated Successfully.');
    }

    public function openModal(){
        $this->dispatchBrowserEvent('openModal');
    }
    public function closeModal(){
        $this->dispatchBrowserEvent('closeModal');
    }

    public function render()
    {
        return view('livewire.budget.create-budget');
    }
}
