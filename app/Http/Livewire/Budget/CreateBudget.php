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
use App\Models\Logframe\PreCondition;
use App\Models\Program\Financial\Budget;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Program\Financial\MonthlyBudget;
use App\Models\Program\Financial\BudgetTracking;

class CreateBudget extends Component
{
    use LivewireAlert;

    public $activities = [];
    public $budget_types = [];
    public $activity_code, $financial_year, $no_of_units, $cost_per_unit, $budget_valid_from, $budget_valid_to , $type_of_unit, $boarder_activity;
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
    public $activitys = [];

    public $dsds =[];
    public $gnds =[];

    public $selectedDistrict = NULL;
    public $selectedDsd = NULL;
    public $selectedGnd = NULL;
    public $yearArray = [];
    public $months_long = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];


    protected $listeners = ['editBudget' => 'edit'];

    public function getYears(){
        $currentYear=date('Y');
        $startyear=date('Y')-1;
        $this->financial_year = $currentYear;
        $endYear=$startyear+5;

        // set start and end year range i.e the start year
        $this->yearArray = range($startyear,$endYear);
    }

    public function mount(){
        $this->projects = Project::get();
        $this->getYears();
    }

    protected $rules = [
        'project_id' => 'required',
        'pre_condition_id' => 'required',
        'outcome_id' => 'required',
        'output_id' => 'required',
        'financial_year' => 'required',
        'no_of_units' => 'required',
        'cost_per_unit' => 'required',
        'budget_valid_from' => 'required',
        'budget_valid_to' => 'required',
        'type_of_unit' => 'required',
        'boarder_activity' => 'required',
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

    public function store(){
        //dd("ds");
        $this->validate();
       // dd("d");
       $sum = array_sum($this->physical_target);
       if($sum != $this->no_of_units){
            $this->alert('question', 'Total of monthly targets not equalled to no of units you already entered', [
                'icon' => 'warning',
                'position' => 'center',
                'timer' => null,
                'showCancelButton' => true,
                'cancelButtonText' => 'I will Correct',
                'toast' => false,
            ]);
       }
       else{
        $check_record = Budget::where('activity_id',$this->activity_id)->where('year',$this->financial_year)->first();
        //dd($check_record);
        if(is_null($check_record)){
        $budget = Budget::create([
            'activity_code' => $this->pre_condition_id.'.'. $this->outcome_id.'.'.$this->output_id.'.'.$this->activity_code,
            'year' => $this->financial_year,
            'boarder_activity' => $this->type_of_unit,
            'type_of_unit' => $this->boarder_activity,
            'no_of_units' => $this->no_of_units,
            'cost_per_unit' => $this->cost_per_unit,
            'budget_valid_from' => $this->budget_valid_from,
            'budget_valid_to' => $this->budget_valid_to,
            'project_id' => $this->project_id,
            'pre_condition_id' => $this->pre_condition_id,
            'outcome_id' => $this->outcome_id,
            'output_id' => $this->output_id,
            'activity_id' => $this->activity_id,
            'district' => $this->selectedDistrict,
            'dsd_id' => $this->selectedDsd,
            'gn_id' => $this->selectedGnd,
            'added_by' => auth()->user()->id,
            'approved' => false,
        ]);

        foreach($this->months_long as $key => $value ){
            MonthlyBudget::create([
                'month' => $value,
                'physical_target'=>  in_array($value, $this->months) ?$this->physical_target[key($this->months)]
                : null,
                'cost_per_unit' => in_array($value, $this->months) ? $this->cost_per_unit : null,
                'budget_id' => $budget->id
            ]);
        }

        foreach($this->months as $key => $month){
            MonthlyBudget::where('budget_id',$budget->id)
                ->where('month',$month)
                ->update([
                    'physical_target' => $this->physical_target[$key]
                ]);
        }

        BudgetTracking::create([
            'action' => 'Created',
            'action_by' => auth()->user()->id,
            'action_date' => now(),
            'budget_id' => $budget->id
        ]);

        $this->emit('refreshLivewireDatatable');
        //$this->clear();
        $this->alert('success','Budget Created Successfully');
        session()->flash('message', 'Budget Created Successfully.');
        }
        else{
            $this->alert('question', 'System found this activity already budgeted for '.$this->financial_year. ' year.', [
                'icon' => 'warning',
                'position' => 'center',
                'timer' => null,
                'showCancelButton' => true,
                'cancelButtonText' => 'Change Activity',
                'toast' => false,
            ]);
        }

       }

    }

    public function monthlyBudget(){
        $this->validate();
    }

    public function clear(){
        $this->boarder_activity = '';
        $this->no_of_units = '';
        $this->cost_per_unit = '';
        $this->budget_valid_from = '';
        $this->budget_valid_to = '';
        $this->project_id = '';
        $this->pre_condition_id = '';
        $this->outcome_id = '';
        $this->output_id = '';
        $this->activity_id = '';
        $this->selectedDistrict = '';
        $this->selectedDsd = '';
        $this->selectedGnd = '';
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
        $this->selectedGnd = $budget->gn_id;
        $this->selectedDsd = $budget->dsd_id;
        $this->selectedDsd = $budget->district;
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
