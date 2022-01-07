<?php

namespace App\Http\Livewire\Budget;

use DateTime;
use DatePeriod;
use DateInterval;
use Livewire\Component;
use App\Models\DsOffice;
use App\Models\GnOffice;
use App\Models\Logframe\Output;
use App\Models\Logframe\Outcome;
use App\Models\Logframe\Project;
use App\Models\LogFrame\Activity;
use Illuminate\Support\Facades\DB;
use App\Models\Logframe\PreCondition;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Program\Financial\MonthlyBudget;
use App\Models\Program\Financial\BudgetTracking;

class EditBudget extends Component
{
    use LivewireAlert;
    public $activity_code, $financial_year, $no_of_units, $cost_per_unit, $budget_valid_from, $budget_valid_to , $budget_type, $budget_valid_from1, $budget_valid_to1;
    public $month, $cost_per_unit1;
    public $updateMode = false;
    public $months = [];
    public $physical_target = [];
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

    public $dsds =[];
    public $gnds =[];

    public $selectedDistrict = NULL;
    public $selectedDsd = NULL;
    public $selectedGnd = NULL;

    public $approved = false;
    public $yearArray = [];
    public $targetSum =0;

    public $months_long = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    public function getYears(){
        $currentYear=date('Y');
        $startyear=date('Y')-1;
        //$this->financial_year = $currentYear;
        $endYear=$startyear+5;

        // set start and end year range i.e the start year
        $this->yearArray = range($startyear,$endYear);
    }
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
        $this->budget_valid_from1 = $budget->budget_valid_from;
        $this->budget_valid_to1 = $budget->budget_valid_to;
        $this->financial_year = $budget->year;
        $this->no_of_units = $budget->no_of_units;
        $this->cost_per_unit = $budget->cost_per_unit;
        $this->approved = $budget->approved;
        $this->monthly_targets = MonthlyBudget::where('budget_id',$budget->id)->get();
        $this->selectedDistrict = $budget->district;
        $this->dsds = DsOffice::where('district',$budget->district)->get();
        $this->selectedDsd = $budget->dsd_id;
        $this->gnds = GnOffice::where('dsd_id',$budget->dsd_id)->get();
        $this->selectedGnd = $budget->gn_id;
       // $this->budgetMonths();
        $this->getYears();

        $this->trackings  = DB::table('budget_trackings')->join('users','users.id','=','budget_trackings.action_by')
            ->where('budget_id',$budget->id)->get();
    }

    public function budgetMonths(){
        $start =  new DateTime($this->budget_valid_from1);
        $start->modify('first day of this month');

        $end = new DateTime($this->budget_valid_to1);
        $end->modify('first day of next month');

        $interval = DateInterval::createFromDateString('1 month');
        $period   = new DatePeriod($start, $interval, $end);
        $ret = array();
        foreach ($period as $dt) {
            $ret[] = $dt->format("F");
        }
        $this->months= $ret;
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
      //  dd($ret);
    }

    public function updatedSelectedDistrict($selectedDistrict)
    {
        if (!is_null($selectedDistrict)) {
            $this->dsds = DsOffice::where('district', $selectedDistrict)->get();
        }
    }

    public function updatedSelectedDsd($selectedDsd)
    {
        if (!is_null($selectedDsd)) {
            $this->gnds = GnOffice::where('dsd_id', $selectedDsd)->get();
        }
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
        'financial_year' => 'required',
        'no_of_units' => 'required',
        'cost_per_unit' => 'required',
        'project_id' => 'required',
        'pre_condition_id' => 'required',
        'outcome_id' => 'required',
        'output_id' => 'required',
        'activity_id' => 'required',
        'selectedDistrict' => 'required',
        'selectedDsd' => 'required',
        'selectedGnd' => 'required',
    ];

    public function update(){

        $this->validate();
        $budget = $this->budget;
        $budget->activity_code = $this->pre_condition_id.'.'. $this->outcome_id.'.'.$this->output_id.'.'.$this->activity_id;
        $budget->year = $this->financial_year;
        $budget->no_of_units = $this->no_of_units;
        $budget->cost_per_unit = $this->cost_per_unit;
        $budget->budget_valid_from = is_null($this->budget_valid_from) ? $this->budget_valid_from1 : $this->budget_valid_from;
        $budget->budget_valid_to = is_null($this->budget_valid_to) ? $this->budget_valid_to1 : $this->budget_valid_to ;
        $budget->project_id = $this->project_id;
        $budget->pre_condition_id = $this->pre_condition_id;
        $budget->outcome_id = $this->outcome_id;
        $budget->output_id = $this->output_id;
        $budget->activity_id = $this->activity_id;
        $budget->save();

        if (!is_null($this->month || $this->physical_target)){
            $delete = MonthlyBudget::where('budget_id',$budget->id)->delete();
            foreach($this->months_long as $key => $value ){
                MonthlyBudget::create([
                    'month' => $value,
                    'physical_target'=>  in_array($value, $this->months) ?$this->physical_target[key($this->months)]
                    : null,
                    'cost_per_unit' => in_array($value, $this->months) ? $this->cost_per_unit : null,
                    'budget_id' => $budget->id
                ]);
            }
        }

        foreach($this->months as $key => $month){
            MonthlyBudget::where('budget_id',$budget->id)
                ->where('month',$month)
                ->update([
                    'physical_target' => $this->physical_target[$key]
                ]);
        }
        //dd($this->trackings);
        BudgetTracking::create([
            'action' => 'Updated',
            'action_by' => auth()->user()->id,
            'action_date' => now(),
            'budget_id' => $budget->id
        ]);

        $this->mount($budget);
        $this->alert('success', 'Budget Updated Successfully.');
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
