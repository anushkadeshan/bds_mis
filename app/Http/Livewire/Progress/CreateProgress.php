<?php

namespace App\Http\Livewire\Progress;

use Livewire\Component;
use App\Models\DsOffice;
use App\Models\GnOffice;
use App\Models\Logframe\Output;
use App\Models\Logframe\Outcome;
use App\Models\Logframe\Project;
use App\Models\Program\Progress;
use App\Models\LogFrame\Activity;
use App\Models\Logframe\PreCondition;
use App\Models\Program\CompletionReport;
use App\Models\Program\ProgressTracking;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CreateProgress extends Component
{
    use LivewireAlert;
    public $yearArray = [];
    public $activities = [];
    public $activity_code, $financial_year, $no_of_units, $total_cost, $completed_date, $title;
    public $progress_id;
    public $updateMode = false;
    public $completion_report_id;

    public $project_id;
    public $pre_condition_id;
    public $outcome_id;
    public $output_id;
    public $activity_id;

    public $projects = [];
    public $pre_conditions = [];
    public $outcomes = [];
    public $outputs = [];

    public $dsds = [];
    public $gnds = [];

    public $selectedDistrict = NULL;
    public $selectedDsd = NULL;
    public $selectedGnd = NULL;

    public $completion_reports = [];
    public $query = '';
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

    public function updatedActivityId($id){
        $completion_reports = CompletionReport::where('activity_id',$id)->get();
        if(count($completion_reports)==0){
            $this->alert('question', 'System did not found a completion report regarding this activity.', [
                'icon' => 'warning',
                'position' => 'center',
                'timer' => null,
                'showCancelButton' => true,
                'cancelButtonText' => 'Change Activity',
                'toast' => false,
            ]);
        }
        else{
            //dd($completion_report);
            $this->completion_reports =  $completion_reports;
        }
    }

    protected $rules = [
        'title' => 'required',
        'project_id' => 'required',
        'outcome_id' => 'required',
        'output_id' => 'required',
        'activity_id' => 'required',
        'financial_year' => 'required',
        'no_of_units' => 'required',
        'total_cost' => 'required',
        'completed_date' => 'required',
        'selectedDistrict' => 'required',
        'selectedDsd' => 'required',
        'selectedGnd' => 'required',
        'completion_report_id' => 'required|unique:progress'
    ];

    public function store(){
        $this->validate();
        $progress = Progress::create([
            'activity_code' => $this->pre_condition_id.'.'. $this->outcome_id.'.'.$this->output_id.'.'.$this->activity_code,
            'project_id' => $this->project_id,
            'pre_condition_id' => $this->pre_condition_id,
            'outcome_id' => $this->outcome_id,
            'output_id' => $this->output_id,
            'activity_id' => $this->activity_id,
            'completion_report_id' => $this->completion_report_id,
            'financial_year' => $this->financial_year,
            'no_of_units' => $this->no_of_units,
            'total_cost' => $this->total_cost,
            'completed_date' => $this->completed_date,
            'district' => $this->selectedDistrict,
            'dsd_id' => $this->selectedDsd,
            'gn_id' => $this->selectedGnd,
            'title' => $this->title,
            'added_by' => auth()->user()->id,
            'approved' => false,
        ]);

        ProgressTracking::create([
            'action' => 'Created',
            'action_by' => auth()->user()->id,
            'action_date' => now(),
            'progress_id' => $progress->id
        ]);

        $this->emit('refreshLivewireDatatable');
        $this->clear();
        $this->closeModal();
        $this->alert('success','Progress Created Successfully.');
    }

    public function clear(){
        $this->activity_id = '';
        $this->progress_id = '';
        $this->activity_code = '';
        $this->year = '';
        $this->no_of_units = '';
        $this->total_cost = '';
        $this->completed_date = '';
        $this->budget_type = '';
        $this->selectedDistrict = '';
        $this->selectedDsd = '';
        $this->selectedGnd = '';
        $this->title = '';
    }

    public function edit($id){

        $this->updateMode = true;
        $progress = Progress::find($id);
        $this->progress_id = $progress->id;
        $this->activity_code = $progress->activity_code;
        $this->year = $progress->year;
        $this->no_of_units = $progress->no_of_units;
        $this->total_cost = $progress->total_cost;
        $this->completed_date = $progress->completed_date;
        $this->budget_type = $progress->budget_type;
        $this->selectedDistrict = $progress->district;
        $this->selectedDsd = $progress->dsd_id;
        $this->selectedGnd = $progress->gn_id;
        $this->title = $progress->title;
        $this->openModal();
    }

    public function update(){
        $progress = Progress::find($this->progress_id);
        $progress->activity_code = $this->activity_code;
        $progress->year = $this->year;
        $progress->no_of_units = $this->no_of_units;
        $progress->total_cost = $this->total_cost;
        $progress->completed_date = $this->completed_date;
        $progress->budget_type = $this->budget_type;
        $progress->district = $this->selectedDistrict;
        $progress->dsd_id = $this->selectedDsd;
        $progress->gn_id = $this->selectedGnd;
        $progress->title = $this->title;
        $progress->completion_report_id = $this->completion_report_id;
        $progress->save();
        $this->emit('refreshLivewireDatatable');
        $this->closeModal();
        $this->updateMode = false;
        $this->clear();
        $this->alert('success','Progress updated Successfully.');
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
