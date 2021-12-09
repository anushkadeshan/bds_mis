<?php

namespace App\Http\Livewire\LogFrame;

use App\Models\Cso;
use Livewire\Component;
use App\Models\DsOffice;
use App\Models\GnOffice;
use Livewire\WithFileUploads;
use App\Models\Logframe\Output;
use App\Models\Program\Partner;
use App\Models\LivelihoodFamily;
use App\Models\Logframe\Outcome;
use App\Models\Logframe\Project;
use App\Models\LogFrame\Activity;
use App\Models\Program\CsoTraining;
use App\Models\Program\Participant;
use App\Models\Program\Construction;
use App\Models\Program\TrainingData;
use Illuminate\Support\Facades\Auth;
use App\Models\Logframe\PreCondition;
use App\Models\Program\Attachment;
use App\Models\Program\MaterialSupport;
use App\Models\Program\CompletionReport;
use App\Models\Program\Financial\Budget;
use App\Models\Program\FinancialSupport;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CreateCompletionReport extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $files = [];
    public function getListeners()
    {
        return [
            'confirmed',
            'denied'
        ];
    }
    public $selectedState;
    public $dsds;
    public $gnds;

    public $selectedDistrict = NULL;
    public $selectedDsd = NULL;
    public $selectedGnd = NULL;

    public $responsible_officer, $output_code, $log_activity_name, $activity_code, $financial_year, $specific_activity_name,
    $date_of_start,
    $date_of_end,
    $partner_contribution,
    $bds_contribution,
    $totol_planned_cost,
    $totdal_actual_cost,
    $units_completed,
    $lessions_learned,
    $type_of_contribution,
    $financial_contribution,
    $organization,
    $other,
    $other_amount,
    $beneficiary_name,
    $meterial,
    $quantity,
    $attendance,
    $views_of_rp,
    $name, $male, $female;

    //participants
    public $gender_male = 0;
    public $gender_female = 0;
    public $disability_male = 0;
    public $disability_female = 0;
    public $sinhala = 0;
    public $tamil = 0;
    public $muslim = 0;
    public $other_ethnicity = 0;

    public $family_id = '';
    public $activities = [];
    public $families = [];
    public $inputs = [];
    public $inputs2 = [];
    public $inputs3 = [];
    public $inputs4 = [];
    public $i = 1;
    public $k = 1;
    public $x = 1;
    public $j = 1;

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

    public $type_of_construction;
    public $target_group;
    public $select_target_group;
    public $query;
    public $current_status;
    public $remarks;

    //material support
    public $beneficiary_meterial;
    public $meterial_provided;
    public $meterial_quantity;

    //fiancnial support
    public $beneficiary_financial;
    public $financial_purpose;
    public $approved_amount;

    //traiinig/meetings/exersises
    public $introduction;
    public $training_target_group;
    public $methodology;
    public $resourses;
    public $results;

    //CSO Meertinds
    public $cso_name;
    public $cso_male;
    public $cso_female;

    public $yearArray = [];

    public $ages = ['15-18','19-24','25-29','30-35','36-60','61 & Over'];

    public $activity_type;

    public function getYears(){
        $currentYear=date('Y');
        $startyear=date('Y')-1;
        $this->financial_year = $currentYear;
        $endYear=$startyear+5;

        // set start and end year range i.e the start year
        $this->yearArray = range($startyear,$endYear);
    }

    public function create(){
        $this->validate([
            'project_id' => 'required',
            'pre_condition_id' => 'required',
            'outcome_id' => 'required',
            'output_id' => 'required',
            'activity_id' => 'required',
            'selectedDistrict' => 'required',
            'selectedDsd' => 'required',
            'selectedGnd' => 'required',
            'responsible_officer' => 'required',
            'financial_year' => 'required',
            'date_of_start' => 'required',
            'date_of_end' => 'required',
            'partner_contribution' => 'required',
            'bds_contribution' => 'required',
            'totol_planned_cost' => 'required',
            'totdal_actual_cost' => 'required',
            'units_completed' => 'required',
            'lessions_learned' => 'required',
        ]);

        $completion_report = CompletionReport::create([
            'project_id' => $this->project_id,
            'pre_condition_id' => $this->pre_condition_id,
            'outcome_id' => $this->outcome_id,
            'output_id' => $this->output_id,
            'activity_id' => $this->activity_id,
            'district' => $this->selectedDistrict,
            'dsd' => $this->selectedDsd,
            'gnds' => $this->selectedGnd,
            'responsible_officer' => $this->responsible_officer,
            'financial_year' => $this->financial_year,
            'date_of_start' => $this->date_of_start,
            'date_of_end' => $this->date_of_end,
            'partner_contribution' => $this->partner_contribution,
            'bds_contribution' => $this->bds_contribution,
            'totol_planned_cost' => $this->totol_planned_cost,
            'totdal_actual_cost' => $this->totdal_actual_cost,
            'units_completed' => $this->units_completed,
            'lessions_learned' => $this->lessions_learned,
            'added_by' => auth()->user()->id
        ]);

        $this->alert('success', 'General data is added!');

        if(!is_null($this->type_of_contribution || $this->organization || $this->financial_contribution)){
            foreach ($this->organization as $key => $value) {
                Partner::create([
                    'completion_report_id' => $completion_report->id,
                    'organization' => isset($this->organization[$key]) ? $this->organization[$key] : null,
                    'type_of_contribution' => isset($this->type_of_contribution[$key]) ? $this->type_of_contribution[$key] : null,
                    'financial_contribution' => isset($this->financial_contribution[$key]) ? $this->financial_contribution[$key] : null,
                    'other' => isset($this->other[$key]) ?$this->other[$key] : null,
                    'other_amount' => isset($this->other_amount[$key]) ? $this->other_amount[$key] : null,
                ]);
            }
        $this->alert('success', 'Partnership data is added!');

        }

        if(!is_null($this->ages)){
            foreach ($this->ages as $key => $value) {
                Participant::create([
                    'completion_report_id' => $completion_report->id,
                    'age' => $value,
                    'gender_male' => isset($this->gender_male[$key]) ? $this->gender_male[$key] : null,
                    'gender_female' => isset($this->gender_female[$key]) ? $this->gender_female[$key] : null,
                    'disability_male' => isset($this->disability_male[$key]) ? $this->disability_male[$key] : null,
                    'disability_female' => isset($this->disability_female[$key]) ? $this->disability_female[$key] : null,
                    'sinhala' => isset($this->sinhala[$key]) ? $this->sinhala[$key] : null,
                    'tamil' => isset($this->tamil[$key]) ? $this->tamil[$key] : null,
                    'muslim' => isset($this->muslim[$key]) ? $this->muslim[$key] : null,
                    'other_ethnicity' => isset($this->other_ethnicity[$key]) ? $this->other_ethnicity[$key] : null,
                ]);
            }
        $this->alert('success', 'Participants data is added!');

        }

        if(!is_null($this->cso_name)){
            foreach ($this->cso_name as $key => $value) {
                CsoTraining::create([
                    'completion_report_id' => $completion_report->id,
                    'cso_name' => isset($this->cso_name[$key]) ?  $this->cso_name[$key] : null,
                    'cso_male' => isset($this->cso_male[$key]) ?  $this->cso_male[$key] : null,
                    'cso_female' => isset($this->cso_female[$key]) ?  $this->cso_female[$key] : null,
                ]);
            }
            $this->alert('success', 'CSO data is added!');

        }
        if($this->activity_type == 'Construction'){
            Construction::create([
                'type_of_construction' => $this->type_of_construction,
                'target_group' => $this->target_group,
                'selected_target_group' => $this->select_target_group,
                'individual_id' => $this->family_id,
                'current_status' => $this->current_status,
                'remarks' => $this->remarks,
                'completion_report_id' => $completion_report->id,
            ]);
            $this->alert('success', 'Construction data is added!');
        }

        if($this->activity_type == 'Material support'){
            if(!is_null($this->beneficiary_meterial)){
                foreach ($this->beneficiary_meterial as $key => $value) {
                    MaterialSupport::create([
                        'beneficiary_meterial' => isset($this->beneficiary_meterial[$key]) ?  $this->beneficiary_meterial[$key] : null,
                        'meterial_provided' => isset($this->beneficiary_meterial[$key]) ?  $this->meterial_provided[$key] : null,
                        'meterial_quantity' => isset($this->beneficiary_meterial[$key]) ?  $this->meterial_quantity[$key] : null,
                        'completion_report_id' => $completion_report->id,
                    ]);
                }

            }
            $this->alert('success', 'Material support data is added!');

        }

        if($this->activity_type == 'Financial support'){
            if(!is_null($this->beneficiary_financial)){
                foreach ($this->beneficiary_financial as $key => $value) {
                    FinancialSupport::create([
                        'beneficiary_financial' => isset($this->beneficiary_financial[$key]) ? $this->beneficiary_financial[$key] : null,
                        'financial_purpose' => isset($this->financial_purpose[$key]) ? $this->financial_purpose[$key] : null,
                        'approved_amount' => isset($this->approved_amount[$key]) ? $this->approved_amount[$key] : null,
                        'completion_report_id' => $completion_report->id,
                    ]);
                }
            }

        }

        if($this->activity_type == 'Exercise' || $this->activity_type == 'Meeting' || $this->activity_type == 'Training'){
            TrainingData::create([
                'introduction' => $this->introduction,
                'training_target_group' => $this->training_target_group,
                'methodology' => $this->methodology,
                'resourses' => $this->resourses,
                'results' => $this->results,
                'completion_report_id' => $completion_report->id,
            ]);

           $this->alert('success', 'Training/Excersie/Meeting data is added!');

        }

        foreach($this->files as $file) {
            $file_name = $file->storePublicly('completion_reports_attachements','public');
            Attachment::create([
                'file_name' => $file_name,
                'completion_report_id' => $completion_report->id
            ]);
        }

        $this->alert('success', 'All Data successfully added', [
            'icon' => 'success',
            'position' => 'center',
            'timer' => null,
            'showDenyButton' => true,
            'denyButtonText' => 'Add another',
            'toast' => false,
            'onDenied' => 'denied',
        ]);

    }

    public function mount()
    {
        $this->dsds = collect();
        $this->gnds = collect();
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

        $this->validate([
            'financial_year' => 'required',
        ]);
        $activity = Activity::where('id',$id)->select('type')->first();
        $this->activity_type = $activity->type;
       // dd($this->activity_id,$this->financial_year);
        $budget = Budget::where('activity_id',$this->activity_id)->where('year',$this->financial_year)->first();
        if(is_null($budget)){
            $this->alert('question', 'System not found a Budget record to this activity', [
                'icon' => 'warning',
                'position' => 'center',
                'timer' => null,
                'showConfirmButton' => true,
                'confirmButtonText' => 'Add a Budget',
                'onConfirmed' => 'confirmed',
                'showCancelButton' => true,
                'cancelButtonText' => 'Change Activity',
                'toast' => false,
            ]);
        }
        else{
            $this->totol_planned_cost = $budget->cost_per_unit*$budget->no_of_units;
        }


    //  dd($this->activities);
    }

    public function confirmed()
    {
        redirect()->route('budget.index');
    }
    public function denied()
    {
        redirect()->route('completion-reports.create');
    }

    public function updatedQuery(){
        $gnds  = json_decode(Auth::user()->gnds);
        $this->families = LivelihoodFamily::whereIn('gn_id',$gnds)
            ->where('hh_name','like','%'.$this->query. '%')
            ->select('id','hh_name','serial_number','branch_id')
            ->get()->toArray();
    }
    public function updatedQuery2(){
        $gnds  = json_decode(Auth::user()->gnds);
        $this->csos = Cso::whereIn('gn_id',$gnds)
            ->where('name','like','%'.$this->query2. '%')
            ->select('id','name','category')
            ->get()->toArray();
    }

    public function clear(){
        $this->families = [];
    }

    public function clear2(){
        $this->csos = [];
    }

    public function selectFamily($id){
        $family  = LivelihoodFamily::find($id);
        $this->hh_name = $family->hh_name;
        $this->query = $family->hh_name;
        $this->family_id = $id;
        $this->families = [];
    }

    public function selectCSO($id){
        $family  = Cso::find($id);
        $this->cso_name = $family->name;
        $this->query2 = $family->name;
        $this->cso_id = $id;
        $this->csos = [];
    }

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
        //dd($this->inputs);
    }

    public function add2($k)
    {
        $k = $k + 1;
        $this->k = $k;
        array_push($this->inputs2 ,$k);
    }

    public function remove2($k)
    {
        unset($this->inputs2[$k]);
       //dd($this->inputs);
    }

    public function add3($x)
    {
        $x = $x + 1;
        $this->x = $x;
        array_push($this->inputs3 ,$x);
    }

    public function remove3($x)
    {
        unset($this->inputs3[$x]);
       //dd($this->inputs);
    }

    public function add4($j)
    {
        $j = $j + 1;
        $this->j = $j;
        array_push($this->inputs4 ,$j);
    }

    public function remove4($j)
    {
        unset($this->inputs4[$j]);
       //dd($this->inputs);
    }

    public function updatedFiles()
    {
        $this->alert('success', 'Attachement processed successfully');
    }

    public function render()
    {
        return view('livewire.log-frame.create-completion-report');
    }
}
