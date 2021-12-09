<?php

namespace App\Http\Livewire\Budget;

use DateTime;
use DatePeriod;
use DateInterval;
use Livewire\Component;
use App\Models\Logframe\Output;
use App\Models\Logframe\Outcome;
use App\Models\Logframe\Project;
use App\Models\LogFrame\Activity;
use Illuminate\Support\Facades\DB;
use App\Models\Logframe\PreCondition;
use App\Models\Program\Financial\MonthlyBudget;
use App\Models\Program\Financial\BudgetTracking;

class EditBudget extends Component
{
    public $activity_code, $year, $no_of_units, $cost_per_unit, $budget_valid_from, $budget_valid_to , $budget_type;
    public $month, $physical_target, $cost_per_unit1;
    public $updateMode = false;
    public $months = [];
    public $project_id;
    public $pre_condition_id;
    public $outcome_id;
    public $output_id;
    public $activity_id;

    public $projects = [];
    public $pre_conditions = [];
    public $outcomes = [];
    public $outputs = [];
    public $activities = [];
    public $budget;
    public $trackings = [];
    public $monthly_targets = [];

    public $approved = false;

    public function mount($budget){
        $this->budget = $budget;
        $this->projects = Project::get();
        $this->project_id = $budget->project_id;
        $this->pre_conditions = PreCondition::where('project_id',$budget->project_id)->get();
        $this->pre_condition_id = $budget->pre_condition_id;
        $this->outcomes = Outcome::where('pre_condition_id',$budget->pre_condition_id)->get();
        $this->outcome_id = $budget->outcome_id;
        $this->outputs = Output::where('outcome_id',$budget->outcome_id)->get();
        $this->output_id = $budget->output_id;
        $this->activities = Activity::where('output_id',$budget->output_id)->get();
        $this->activity_id = $budget->activity_id;
        $this->budget_valid_from = $budget->budget_valid_from;
        $this->budget_valid_to = $budget->budget_valid_to;
        $this->year = $budget->year;
        $this->no_of_units = $budget->no_of_units;
        $this->cost_per_unit = $budget->cost_per_unit;
        $this->approved = $budget->approved;
        $this->monthly_targets = MonthlyBudget::where('budget_id',$budget->id)->get();
        $this->updatedBudgetValidTo();

        $this->trackings  = DB::table('budget_trackings')->join('users','users.id','=','budget_trackings.action_by')
            ->where('budget_id',$budget->id)->get();
    }

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

    public function updatedProjectId($id){
    $this->pre_conditions = PreCondition::where('project_id',$id)->get();
    }

    public function updatedPreConditionId($id){
        $this->outcomes = Outcome::where('pre_condition_id',$id)->get();
    }

    public function updatedOutcomeId($id){
        $this->outputs = Output::where('outcome_id',$id)->get();
    }

    public function updatedOutputId($id){
        $this->activities = Activity::where('output_id',$id)->get();
    //  dd($this->activities);
    }
    protected $rules = [
        'activity_id' => 'required',
        'year' => 'required',
        'no_of_units' => 'required',
        'cost_per_unit' => 'required',
        'budget_valid_from' => 'required',
        'budget_valid_to' => 'required',
    ];

    public function update(){

        $this->validate();
        $budget = $this->budget;
        $budget->activity_code = $this->pre_condition_id.'.'. $this->outcome_id.'.'.$this->output_id.'.'.$this->activity_id;
        $budget->year = $this->year;
        $budget->no_of_units = $this->no_of_units;
        $budget->cost_per_unit = $this->cost_per_unit;
        $budget->budget_valid_from = $this->budget_valid_from;
        $budget->budget_valid_to = $this->budget_valid_to;
        $budget->project_id = $this->project_id;
        $budget->pre_condition_id = $this->pre_condition_id;
        $budget->outcome_id = $this->outcome_id;
        $budget->output_id = $this->output_id;
        $budget->activity_id = $this->activity_id;
        $budget->save();

        if (!is_null($this->month || $this->cost_per_unit1 || $this->physical_target)){
            $delete = MonthlyBudget::where('budget_id',$budget->id)->delete();
            foreach($this->months as $key => $value){
                MonthlyBudget::create([
                    'month' => $value,
                    'physical_target'=> $this->physical_target[$key],
                    'cost_per_unit' => $this->cost_per_unit1[$key],
                    'budget_id' => $budget->id
                ]);
            }
        }
        //dd($this->trackings);
        BudgetTracking::create([
            'action' => 'Updated',
            'action_by' => auth()->user()->id,
            'action_date' => now(),
            'budget_id' => $budget->id
        ]);

        $this->mount($budget);
        session()->flash('message', 'Budget Updated Successfully.');
    }

    public function approve(){
        $budget = $this->budget;
        $budget->approved = true;
        $budget->approved_by = auth()->user()->id;
        $budget->approved_on = now();
        $budget->save();

        BudgetTracking::create([
            'action' => 'Approved',
            'action_by' => auth()->user()->id,
            'action_date' => now(),
            'budget_id' => $budget->id
        ]);

        session()->flash('message', 'Budget Approved Successfully.');
    }


    public function render()
    {
        $trackings  = DB::table('budget_trackings')->join('users','users.id','=','budget_trackings.action_by')
            ->where('budget_id',$this->budget->id)->get();

        $this->trackings = $trackings;
        $this->mount($this->budget);
        return view('livewire.budget.edit-budget',['trackings' => $trackings]);
    }
}
