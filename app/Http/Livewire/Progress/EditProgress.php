<?php

namespace App\Http\Livewire\Progress;

use Livewire\Component;
use App\Models\DsOffice;
use App\Models\GnOffice;
use App\Models\Logframe\Output;
use App\Models\Logframe\Outcome;
use App\Models\Logframe\Project;
use App\Models\LogFrame\Activity;
use Illuminate\Support\Facades\DB;
use App\Models\Logframe\PreCondition;
use App\Models\Program\CompletionReport;
use App\Models\Program\ProgressTracking;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Program\Financial\MonthlyBudget;

class EditProgress extends Component
{
    use LivewireAlert;
    public $progress;
    public $activity_code, $financial_year, $no_of_units, $cost_per_unit, $completed_date, $title;
    public $progress_id;
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
    public $completion_reports  = [];

    public $dsds =[];
    public $gnds =[];

    public $selectedDistrict = NULL;
    public $selectedDsd = NULL;
    public $selectedGnd = NULL;

    public $approved = false;
    public $yearArray = [];
    public $completion_report_id;
    public function getYears(){
        $currentYear=date('Y');
        $startyear=date('Y')-1;
        //$this->financial_year = $currentYear;
        $endYear=$startyear+5;

        // set start and end year range i.e the start year
        $this->yearArray = range($startyear,$endYear);
    }

    public function mount($progress){
        $this->progress = $progress;
        $this->projects = Project::get();
        $this->project_id = $progress->project_id;
        $this->pre_conditions = PreCondition::where('project_id',$progress->project_id)->get();
        $this->pre_condition_id = $progress->pre_condition_id;
        $this->outcomes = Outcome::where('pre_condition_id',$progress->pre_condition_id)->get();
        $this->outcome_id = $progress->outcome_id;
        $this->outputs = Output::where('outcome_id',$progress->outcome_id)->get();
        $this->output_id = $progress->output_id;
        $this->activities = Activity::where('output_id',$progress->output_id)->get();
        $this->activity_id = $progress->activity_id;
        $this->progress_id = $progress->id;
        $this->financial_year = $progress->financial_year;
        $this->no_of_units = $progress->no_of_units;
        $this->cost_per_unit = $progress->cost_per_unit;
        $this->completed_date = $progress->completed_date;
        $this->selectedDistrict = $progress->district;
        $this->selectedDsd = $progress->dsd_id;
        $this->selectedGnd = $progress->gn_id;
        $this->title = $progress->title;
        $this->approved = $progress->approved;
        $this->monthly_targets = MonthlyBudget::where('budget_id',$progress->id)->get();
        $this->selectedDistrict = $progress->district;
        $this->dsds = DsOffice::where('district',$progress->district)->get();
        $this->selectedDsd = $progress->dsd_id;
        $this->gnds = GnOffice::where('dsd_id',$progress->dsd_id)->get();
        $this->selectedGnd = $progress->gn_id;
        $this->completion_reports = CompletionReport::where('activity_id',$progress->activity_id)->get();
        $this->completion_report_id = $progress->completion_report_id;
        $this->getYears();

        $this->trackings  = DB::table('progress_trackings')->join('users','users.id','=','progress_trackings.action_by')
            ->where('progress_id',$progress->id)->get();
    }

    protected $rules = [
        'title' => 'required',
        'project_id' => 'required',
        'outcome_id' => 'required',
        'output_id' => 'required',
        'activity_id' => 'required',
        'financial_year' => 'required',
        'no_of_units' => 'required',
        'cost_per_unit' => 'required',
        'completed_date' => 'required',
        'selectedDistrict' => 'required',
        'selectedDsd' => 'required',
        'selectedGnd' => 'required',
        'completion_report_id' => 'required'
    ];

    public function update(){
        $this->validate();
        $progress = $this->progress;
        $progress->activity_code = $this->pre_condition_id.'.'. $this->outcome_id.'.'.$this->output_id.'.'.$this->activity_code;
        $progress->project_id = $this->project_id;
        $progress->pre_condition_id = $this->pre_condition_id;
        $progress->outcome_id = $this->outcome_id;
        $progress->output_id = $this->output_id;
        $progress->activity_id = $this->activity_id;
        $progress->completion_report_id = $this->completion_report_id;
        $progress->financial_year = $this->financial_year;
        $progress->no_of_units = $this->no_of_units;
        $progress->cost_per_unit = $this->cost_per_unit;
        $progress->completed_date = $this->completed_date;
        $progress->district = $this->selectedDistrict;
        $progress->dsd_id = $this->selectedDsd;
        $progress->gn_id = $this->selectedGnd;
        $progress->title = $this->title;
        $progress->save();

        ProgressTracking::create([
            'action' => 'Updated',
            'action_by' => auth()->user()->id,
            'action_date' => now(),
            'progress_id' => $progress->id
        ]);

        $this->emit('refreshLivewireDatatable');
        $this->alert('success','Progress Updated Successfully.');
    }

    public function approve(){
        $progress = $this->progress;
        $progress->approved = true;
        $progress->approved_by = auth()->user()->id;
        $progress->approved_on = now();
        $progress->save();

        ProgressTracking::create([
            'action' => 'Approved',
            'action_by' => auth()->user()->id,
            'action_date' => now(),
            'progress_id' => $progress->id
        ]);

        $this->alert('success', 'Budget Approved Successfully.');
    }

    public function render()
    {
        $trackings  = DB::table('progress_trackings')->join('users','users.id','=','progress_trackings.action_by')
            ->where('progress_id',$this->progress_id)->get();

        $this->trackings = $trackings;
        $this->mount($this->progress);
        return view('livewire.progress.edit-progress');
    }
}
