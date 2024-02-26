<?php

namespace App\Http\Livewire\LogFrame;

use Livewire\Component;
use App\Models\DsOffice;
use App\Models\GnOffice;
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
use App\Models\Program\MaterialSupport;
use App\Models\Program\CompletionReport;
use App\Models\Program\FinancialSupport;
use App\Models\Program\ProgressTracking;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class EditCompletionReport extends Component
{
    use LivewireAlert;
    public $project_id;
    public $pre_condition_id;
    public $outcome_id;
    public $output_id;
    public $activity_id;
    public $activity_type;
    public $completionReportId;
    public $deletePartnerId;
    public $deleteCsoId;
    public $deleteMaterialId;
    public $deleteFiancialId;

    public $projects = [];
    public $pre_conditions = [];
    public $outcomes = [];
    public $outputs = [];
    public $activities = [];
    public $partners = [];
    public $participants = [];
    public $csoTrainings = [];
    public $families = [];
    public $materialsupports = [];
    public $financialsupports = [];
    public $trainingData = [];
    public $ages = ['15-18','19-24','25-29','30-35','36-60','61 & Over'];

    //participants
    public $gender_male = 0;
    public $gender_female = 0;
    public $disability_male = 0;
    public $disability_female = 0;
    public $sinhala = 0;
    public $tamil = 0;
    public $muslim = 0;
    public $other_ethnicity = 0;

    public $completionReport = [];

    public $responsible_officer, $financial_year, $date_of_start,$date_of_end,$partner_contribution,$bds_contribution,$unit_cost,$totdal_actual_cost,$units_completed,$lessions_learned;
    public $type_of_contribution, $financial_contribution, $organization, $other, $other_amount;
    public $dsds =[];
    public $gnds =[];

    public $selectedDistrict = NULL;
    public $selectedDsd = NULL;
    public $selectedGnd = NULL;
    public $yearArray = [];

    //CSO Meertinds
    public $cso_name;
    public $cso_reg_no;
    public $cso_male;
    public $cso_female;

    //construction
    public $type_of_construction;
    public $target_group;
    public $select_target_group;
    public $query;
    public $current_status;
    public $remarks;
    public $individual_id;

    //material support
    public $beneficiary_meterial;
    public $nic_or_reg_no;
    public $meterial_provided;
    public $meterial_quantity;

    //fiancnial support
    public $beneficiary_financial;
    public $beneficiary_financial_nic;
    public $financial_purpose;
    public $approved_amount;

    //traiinig/meetings/exersises
    public $introduction;
    public $training_target_group;
    public $methodology;
    public $resourses;
    public $results;
    public $training_id;

    public $beneficiary_type = 'Beneficiary';
    public $cso_id;
    public $beneficiary_id;
    public $selected_cso_id;
    public $isDraft;
    public $isReviewed;
    public $isApproved = false;
    public $family_id;
    public $attachments = [];
    public $trackings= [];
    public function getYears(){
        $currentYear=date('Y');
        $startyear=date('Y')-1;
        $this->financial_year = $currentYear;
        $endYear=$startyear+5;

        // set start and end year range i.e the start year
        $this->yearArray = range($startyear,$endYear);
    }

    public function mount($completionReport){
        $this->completionReport = $completionReport;
        $this->completionReportId = $completionReport->id;
        $this->isDraft = $completionReport->is_draft;
        $this->isReviewed = $completionReport->isReviewed;
        $this->isApproved = $completionReport->isApproved;
        $this->projects = Project::get();
        $this->getYears();
        $this->project_id = $completionReport->project_id;
        $this->pre_conditions = PreCondition::where('project_id',$completionReport->project_id)->get();
        $this->pre_condition_id = $completionReport->pre_condition_id;
        $this->outcomes = Outcome::where('pre_condition_id',$completionReport->pre_condition_id)->get();
        $this->outcome_id = $completionReport->outcome_id;
        $this->outputs = Output::where('outcome_id',$completionReport->outcome_id)->get();
        $this->output_id = $completionReport->output_id;
        $this->activities = Activity::where('output_id',$completionReport->output_id)->get();
        $this->activity_id = $completionReport->activity_id;
        $this->selectedDistrict = $completionReport->district;
        $this->dsds = DsOffice::where('district',$completionReport->district)->get();
        $this->selectedDsd = $completionReport->dsd;
        $this->gnds = GnOffice::where('dsd_id',$completionReport->dsd)->get();
        $this->selectedGnd = $completionReport->gnds;
        $this->date_of_start = $completionReport->date_of_start;
        $this->date_of_end = $completionReport->date_of_end;
        $this->partner_contribution = $completionReport->partner_contribution;
        $this->bds_contribution = $completionReport->bds_contribution;
        $this->unit_cost = $completionReport->unit_cost;
        $this->responsible_officer = $completionReport->responsible_officer;
        $this->units_completed = $completionReport->units_completed;
        $this->lessions_learned = $completionReport->lessions_learned;

        $activity = Activity::find($this->activity_id);
        $this->activity_type = $activity->type;

        $this->partners = $completionReport->partners;
        $this->participants = $completionReport->participants;
        $this->csoTrainings = $completionReport->csoTrainings;
        //dd($completionReport->constructions[0]);
        if(count($completionReport->constructions)>0){
            $this->type_of_construction = $completionReport->constructions[0]->type_of_construction;
            $this->target_group = $completionReport->constructions[0]->target_group;
            $this->select_target_group = $completionReport->constructions[0]->selected_target_group;
            $this->individual_id = $completionReport->constructions[0]->individual_id;
            //dd( $this->individual_id);
            if($this->individual_id != ""){
            $family = LivelihoodFamily::find($this->individual_id);
            $this->query = $family->hh_name;
            }
            $this->current_status = $completionReport->constructions[0]->current_status;
            $this->remarks = $completionReport->constructions[0]->remarks;
        }

        if(count($completionReport->materialsupports)>0){
            $this->materialsupports = $completionReport->materialsupports;
        }

        if(count($completionReport->financialsupports)>0){
            $this->financialsupports = $completionReport->financialsupports;

        }
        //dd($completionReport->trainingData[0]);
        if(count($completionReport->trainingData)>0){
            $this->introduction = $completionReport->trainingData[0]->introduction;
            $this->training_target_group = $completionReport->trainingData[0]->training_target_group;
            $this->methodology = $completionReport->trainingData[0]->methodology;
            $this->resourses = $completionReport->trainingData[0]->resourses;
            $this->results = $completionReport->trainingData[0]->results;
            $this->training_id = $completionReport->trainingData[0]->id;
        }

        if(count($completionReport->attachments)>0){
            $this->attachments = $completionReport->attachments;
        }
        if(count($completionReport->tracking)>0){
            $this->trackings = $completionReport->tracking;
        }

    }

    public function sendtoReview(){
        $this->validate([
            'date_of_start' => 'required',
            'date_of_end' => 'required',
            'partner_contribution' => 'required',
            'bds_contribution' => 'required',
            'units_completed' => 'required',
            'unit_cost' => 'required',
            'lessions_learned' => 'required',
        ]);

            $completionReport = CompletionReport::find($this->completionReportId);
            $completionReport->date_of_start = $this->date_of_start;
            $completionReport->date_of_end = $this->date_of_end;
            $completionReport->partner_contribution = $this->partner_contribution;
            $completionReport->bds_contribution = $this->bds_contribution;
            $completionReport->totdal_actual_cost = ($this->units_completed*$this->unit_cost);
            $completionReport->units_completed = $this->units_completed;
            $completionReport->unit_cost = $this->unit_cost;
            $completionReport->lessions_learned = $this->lessions_learned;
            $completionReport->is_draft = false;
            $completionReport->save();

            if(count($completionReport->getChanges())>0){
                ProgressTracking::create([
                    'action' => 'Updated',
                    'action_by' => auth()->user()->id,
                    'action_date' => now(),
                    'progress_id' => $this->completionReportId
                ]);
            }
            ProgressTracking::create([
                'action' => 'Sent to Review',
                'action_by' => auth()->user()->id,
                'action_date' => now(),
                'progress_id' => $this->completionReportId
            ]);

            $this->alert('success','Completion report sent to review');
    }

    public function doRereview(){
        $completionReport = CompletionReport::find($this->completionReportId);
        $completionReport->is_draft = true;
        $completionReport->isReviewed = false;
        $completionReport->save();

        ProgressTracking::create([
            'action' => 'Review Failed',
            'action_by' => auth()->user()->id,
            'action_date' => now(),
            'progress_id' => $this->completionReportId
        ]);

        $this->alert('success','Completion report is Reverted');
    }

    public function sendtoApproval(){
        $this->validate([
            'date_of_start' => 'required',
            'date_of_end' => 'required',
            'partner_contribution' => 'required',
            'bds_contribution' => 'required',
            'units_completed' => 'required',
            'unit_cost' => 'required',
            'lessions_learned' => 'required',
        ]);

        $completionReport = CompletionReport::find($this->completionReportId);
        $completionReport->date_of_start = $this->date_of_start;
        $completionReport->date_of_end = $this->date_of_end;
        $completionReport->partner_contribution = $this->partner_contribution;
        $completionReport->bds_contribution = $this->bds_contribution;
        $completionReport->totdal_actual_cost = ($this->units_completed*$this->unit_cost);
        $completionReport->units_completed = $this->units_completed;
        $completionReport->unit_cost = $this->unit_cost;
        $completionReport->lessions_learned = $this->lessions_learned;
        $completionReport->isReviewed = true;
        $completionReport->reviewedBy = auth()->user()->id;
        $completionReport->reviewed_at = now();
        $completionReport->save();

        ProgressTracking::create([
            'action' => 'Sent to Approval',
            'action_by' => auth()->user()->id,
            'action_date' => now(),
            'progress_id' => $this->completionReportId
        ]);

        $this->alert('success','Completion report sent to approval');
    }

    public function Approved(){

        $completionReport = CompletionReport::find($this->completionReportId);
        $completionReport->isApproved = true;
        $completionReport->approved_by = auth()->user()->id;
        $completionReport->approved_at = now();
        $completionReport->save();

        ProgressTracking::create([
            'action' => 'Approved',
            'action_by' => auth()->user()->id,
            'action_date' => now(),
            'progress_id' => $this->completionReportId
        ]);

        $this->alert('success','Completion report approved');
    }

    public function disApprove(){

        $completionReport = CompletionReport::find($this->completionReportId);
        $completionReport->isReviewed = false;
        $completionReport->save();

        ProgressTracking::create([
            'action' => 'Disapproved',
            'action_by' => auth()->user()->id,
            'action_date' => now(),
            'progress_id' => $this->completionReportId
        ]);

        $this->alert('success','Completion report disapproved');
    }

    public function addPartner(){
        $partner = Partner::create([
            'completion_report_id' => $this->completionReportId,
            'organization' => $this->organization,
            'type_of_contribution' => $this->type_of_contribution,
            'financial_contribution' => $this->financial_contribution,
            'other' => $this->other,
            'other_amount' => $this->other_amount,
        ]);
        $cr = CompletionReport::with('partners')->find($this->completionReportId);
        $this->partners = $cr->partners;
        $this->alert('success','Partner information added successfully');
    }

    public function deletePartnerId($id){
        //dd($id);
        $this->deletePartnerId = $id;
        $this->openModal();
    }

    public function openModal(){
        $this->dispatchBrowserEvent('openModal');
    }
    public function closeModal(){
        $this->dispatchBrowserEvent('closeModal');

    }
    public function deletePartner(){
        Partner::find($this->deletePartnerId)->delete();
        $cr = CompletionReport::with('partners')->find($this->completionReportId);
        $this->partners = $cr->partners;
        $this->closeModal();
        $this->alert('success','Partner information deleted successfully');
    }


    public function updateParticipants(){
        $delete = Participant::where('completion_report_id',$this->completionReportId)->delete();
        if($delete){
            if(!is_null($this->ages)){
                foreach ($this->ages as $key => $value) {
                    Participant::create([
                        'completion_report_id' => $this->completionReportId,
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
                $cr = CompletionReport::with('participants')->find($this->completionReportId);
                $this->participants = $cr->participants;
                $this->alert('success', 'Participants data is updaetd!');
            }
        }
    }


    public function deleteCsoId($id){
        //dd($id);
        $this->deleteCsoId = $id;

        $this->openModal();
    }

    public function deleteCSO(){
        CsoTraining::find($this->deleteCsoId)->delete();
        $cr = CompletionReport::with('csoTrainings')->find($this->completionReportId);
        $this->csoTrainings = $cr->csoTrainings;
        $this->closeModal();
        $this->alert('success','CSO information deleted successfully');
    }

    public function addCso(){
        CsoTraining::create([
            'completion_report_id' => $this->completionReportId,
            'cso_id' => $this->selected_cso_id,
            'cso_male' => $this->cso_male,
            'cso_female' => $this->cso_female,
        ]);

        $cr = CompletionReport::with('csoTrainings')->find($this->completionReportId);
        $this->csoTrainings = $cr->csoTrainings;

        $this->alert('success','CSO information added successfully');
    }

    public function updatedQuery(){
        $gnds  = json_decode(Auth::user()->gnds);
        $this->families = LivelihoodFamily::whereIn('gn_id',$gnds)
            ->where('hh_name','like','%'.$this->query. '%')
            ->select('id','hh_name','serial_number','branch_id')
            ->get()->toArray();
    }

    public function selectFamily($id){
        $family  = LivelihoodFamily::find($id);
        $this->hh_name = $family->hh_name;
        $this->query = $family->hh_name;
        $this->family_id = $id;
        $this->families = [];
    }

    public function clear(){
        $this->families = [];
    }

    public function updateConstruction(){
        $construction = Construction::where('completion_report_id',$this->completionReportId)->first();
        $construction->type_of_construction = $this->type_of_construction;
        $construction->target_group = $this->target_group;
        $construction->selected_target_group = $this->select_target_group;
        $construction->individual_id = $this->family_id;
        $construction->current_status = $this->current_status;
        $construction->remarks = $this->remarks;
        $construction->save();

        $this->alert('success','Construction details added successfully');
    }

    public function deleteMaterialId($id){
        //dd($id);
        $this->deleteMaterialId = $id;

        $this->openModal();
    }

    public function deletematerialsupports(){
        MaterialSupport::find($this->deleteMaterialId)->delete();
        $cr = CompletionReport::with('materialsupports')->find($this->completionReportId);
        $this->materialsupports = $cr->materialsupports;
        $this->closeModal();
        $this->alert('success','Material supports information deleted successfully');
    }

    public function addmaterialsupports(){
        MaterialSupport::create([
            'completion_report_id' => $this->completionReportId,
            'beneficiary_id' => $this->beneficiary_id,
            'cso_id' => $this->cso_id,
            'meterial_provided' => $this->meterial_provided ,
            'meterial_quantity' => $this->meterial_quantity
        ]);

        $cr = CompletionReport::with('materialsupports')->find($this->completionReportId);
        $this->materialsupports = $cr->materialsupports;

        $this->alert('success','Material supports information added successfully');
    }

    public function deleteFiancialId($id){
        //dd($id);
        $this->deleteFiancialId = $id;

        $this->openModal();
    }

    public function deleteFinancialsupports(){
        FinancialSupport::find($this->deleteFiancialId)->delete();
        $cr = CompletionReport::with('financialsupports')->find($this->completionReportId);
        $this->financialsupports = $cr->financialsupports;
        $this->closeModal();
        $this->alert('success','Financial supports information deleted successfully');
    }

    public function addFinancialsupports(){
        FinancialSupport::create([
            'completion_report_id' => $this->completionReportId,
            'beneficiary_id' => $this->beneficiary_id,
            'financial_purpose' => $this->financial_purpose,
            'approved_amount' => $this->approved_amount
        ]);

        $cr = CompletionReport::with('financialsupports')->find($this->completionReportId);
        $this->financialsupports = $cr->financialsupports;

        $this->alert('success','Financial supports information added successfully');
    }

    public function updateTraningData(){
        $training = TrainingData::find($this->training_id);
        $training->introduction = $this->introduction;
        $training->training_target_group = $this->training_target_group;
        $training->methodology = $this->methodology;
        $training->resourses = $this->resourses;
        $training->results = $this->results;
        $training->save();

        $completionReport = CompletionReport::with('trainingData')->find($this->completionReportId);
        $this->introduction = $completionReport->trainingData[0]->introduction;
        $this->training_target_group = $completionReport->trainingData[0]->training_target_group;
        $this->methodology = $completionReport->trainingData[0]->methodology;
        $this->resourses = $completionReport->trainingData[0]->resourses;
        $this->results = $completionReport->trainingData[0]->results;
        $this->alert('success','Traning information added successfully');
    }

    public function render()
    {
        return view('livewire.log-frame.edit-completion-report');
    }
}
