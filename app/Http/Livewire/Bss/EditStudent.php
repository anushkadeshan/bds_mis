<?php

namespace App\Http\Livewire\Bss;
use App\Models\bss\Pyament;
use Livewire\Component;
use App\Models\DsOffice;
use App\Models\GnOffice;
use App\Models\bss\Status;
use App\Models\bss\Student;
use Auth;

class EditStudent extends Component
{

    public $schol_given_on;
    public $ref_no;
    public $grade_05_year;
    public $ol_year;
    public $uni_year;
    public $name;
    public $gender;
    public $nic;
    public $ethnicity;
    public $date_of_birth;
    public $address;
    public $contact;
    public $guardian_name;
    public $relationship;
    public $al_year;
    public $stream;
    public $school;
    public $direct_by_bmic;
    public $dsd_id;
    public $gn_id;
    public $sector;
    public $branch_id;
    public $samurdi;
    public $low_income;
    public $bmic_pci;
    public $non_bmic_pci;
    public $status_id;
    public $client_code;
    public $added_by;
    public $schol_type;
    public $client_name;
    public $bmic_branch;
    public $bmic_region;

    public $selectedDsd = NULL;

    public $dsds = [];
    public $gnds = [];
    public $status = [];

    public $scholar_amount;
    public $payment_start_year;
    public $payment_start_month;
    public $renewal_document;
    public $reason_for_dropouts;
    public $p_status;
    public $finished_year;

    public $payment_end_month;
    public $bank_name;
    public $bank_account_holder;
    public $bank_account_number;
    public $branch_name;
    public $branch_code;

    public $saved = false;

    protected $listeners = ['studentId'];
    public $student_id;
    public $student_name;

    public function getData(){
        $this->clreaForm();
        $student = Student::where('id',$this->student_id)->first();
        $payment = Pyament::where('student_id',$this->student_id)->first();

        $this->student_name = $student->name;
        if($student){
            $this->schol_given_on = $student->schol_given_on;
            $this->ref_no =$student->ref_no;
            $this->name =$student->name;
            $this->gender =$student->gender;
            $this->stream =$student->stream;
            $this->nic =$student->nic;
            $this->ethnicity =$student->ethnicity;
            $this->date_of_birth =$student->date_of_birth;
            $this->address =$student->address;
            $this->contact =$student->contact;
            $this->guardian_name =$student->guardian_name;
            $this->relationship =$student->relationship;
            $this->al_year =$student->al_year;
            $this->stream =$student->stream;
            $this->school =$student->school;
            $this->grade_05_year =$student->grade_05_year;
            $this->ol_year =$student->ol_year;
            $this->uni_year =$student->uni_year;
            $this->direct_by_bmic =$student->direct_by_bmic;
            $this->selectedDsd =$student->dsd_id;
            $this->gn_id =$student->gn_id;
            $this->sector =$student->sector;
            $this->samurdi =$student->samurdi;
            $this->low_income =$student->low_income;
            $this->bmic_pci =$student->bmic_pci;
            $this->non_bmic_pci =$student->non_bmic_pci;
            $this->status_id =$student->status_id;
            $this->client_code =$student->client_code;
            $this->schol_type =$student->schol_type;
            $this->client_name = $student->client_name;
            $this->bmic_branch = $student->bmic_branch;
            $this->bmic_region = $student->bmic_region;
            if($payment){
            $this->scholar_amount = $payment->scholar_amount;
            $this->payment_start_year = $payment->payment_start_year;
            $this->payment_start_month = $payment->payment_start_month;
            $this->renewal_document = $payment->renewal_document;
            $this->reason_for_dropouts = $payment->reason_for_dropouts;
            $this->p_status = $payment->p_status;
            $this->finished_year = $payment->finished_year;
            $this->payment_end_month = $payment->payment_end_month;
            $this->bank_name = $payment->bank_name;
            $this->bank_account_holder = $payment->bank_account_holder;
            $this->bank_account_number = $payment->bank_account_number;
            $this->branch_name = $payment->branch_name;
            $this->branch_code = $payment->branch_code;
            }
        }

    }

    public function mount($id){

        if(!is_null($id)){
            $this->student_id= $id;
            $this->getData();
        }

        $this->gnds = collect();
        $dsds = DsOffice::select('id','name')->get()->toArray();
        $status = Status::select('id','status')->get()->toArray();
        $this->dsds = $dsds;
        $this->status = $status;
    }

    protected $rules = [
        'schol_given_on' => 'required',
        'ref_no' => 'required|string|max:150',
        'name' => 'required|string|max:155',
        'gender' => 'required|string|max:45',
        'nic' => 'nullable|string|max:45',
        'ethnicity' => 'required|string|max:45',
        'date_of_birth' => 'required',
        'address' => 'required|string|max:255',
        'contact' => 'required|string|max:45',
        'guardian_name' => 'required|string|max:105',
        'relationship' => 'required|string|max:45',
        'al_year' => 'nullable|numeric',
        'stream' => 'string|max:45|nullable',
        'school' => 'required|string|max:155',
        'grade_05_year' => 'nullable|numeric',
        'ol_year' => 'nullable|numeric',
        'uni_year' => 'nullable|numeric',
        'direct_by_bmic' => 'required|boolean',
        'selectedDsd' => 'required|integer',
        'gn_id' => 'required',
        'sector' => 'required|string|max:45',
        'samurdi' => 'required|boolean',
        'low_income' => 'required|boolean',
        'bmic_pci' => 'nullable|numeric',
        'non_bmic_pci' => 'nullable|numeric',
        'status_id' => 'required|integer',
        'client_code' => 'nullable|string|max:45',
        'schol_type' => 'string|max:45',

        //payment
        'scholar_amount' => 'required',
        'payment_start_year' => 'required|integer',
        'payment_start_month' => 'required|string|max:50',
        'renewal_document' => 'required|boolean',
        'reason_for_dropouts' => 'nullable|string|max:500',
        'p_status' => 'required|integer',
        'finished_year' => 'required|integer',

        //bank details
        'payment_end_month' => 'required',
        'bank_name' => 'required',
        'bank_account_holder' => 'required',
        'bank_account_number' => 'required'
    ];


    public function saveData(){

        $this->validate();
        $student = Student::find($this->student_id);
        $student->schol_given_on = $this->schol_given_on;
        $student->ref_no = $this->ref_no;
        $student->name = $this->name;
        $student->gender = $this->gender;
        $student->stream = $this->stream;
        $student->nic = $this->nic;
        $student->ethnicity = $this->ethnicity;
        $student->date_of_birth = $this->date_of_birth;
        $student->address = $this->address;
        $student->contact = $this->contact;
        $student->guardian_name = $this->guardian_name;
        $student->relationship = $this->relationship;
        $student->al_year = $this->al_year;
        $student->stream = $this->stream;
        $student->school = $this->school;
        $student->grade_05_year = $this->grade_05_year;
        $student->ol_year = $this->ol_year;
        $student->uni_year = $this->uni_year;
        $student->direct_by_bmic = $this->direct_by_bmic;
        $student->dsd_id = $this->selectedDsd;
        $student->gn_id = $this->gn_id;
        $student->sector = $this->sector;
        $student->branch_id = Auth::user()->branch_id;
        $student->samurdi = $this->samurdi;
        $student->low_income = $this->low_income;
        $student->bmic_pci = $this->bmic_pci;
        $student->non_bmic_pci = $this->non_bmic_pci;
        $student->status_id = $this->status_id;
        $student->client_code = $this->client_code;
        $student->added_by = Auth::user()->id;
        $student->schol_type = $this->schol_type;
        $student->client_name = $this->client_name;
        $student->bmic_branch = $this->bmic_branch;
        $student->bmic_region = $this->bmic_region;
        $student->approved = false;
        $student->save();

        $payment = Pyament::where('student_id',$this->student_id)->first();
        if(is_null($payment)){
            $payment_insert = new Pyament;
            $payment_insert->scholar_amount = $this->scholar_amount;
            $payment_insert->payment_start_year = $this->payment_start_year;
            $payment_insert->payment_start_month = $this->payment_start_month;
            $payment_insert->renewal_document = $this->renewal_document;
            $payment_insert->reason_for_dropouts = $this->reason_for_dropouts;
            $payment_insert->p_status = $this->p_status;
            $payment_insert->finished_year = $this->finished_year;
            $payment_insert->payment_end_month = $this->payment_end_month;
            $payment_insert->bank_name = $this->bank_name;
            $payment_insert->bank_account_holder = $this->bank_account_holder;
            $payment_insert->bank_account_number = $this->bank_account_number;
            $payment_insert->branch_name = $this->branch_name;
            $payment_insert->branch_code = $this->branch_code;
            $payment_insert->student_id = $this->student_id;
            $payment_insert->user_id = Auth::user()->id;
            $payment_insert->save();
        }
        else{
            $payment->scholar_amount = $this->scholar_amount;
            $payment->payment_start_year = $this->payment_start_year;
            $payment->payment_start_month = $this->payment_start_month;
            $payment->renewal_document = $this->renewal_document;
            $payment->reason_for_dropouts = $this->reason_for_dropouts;
            $payment->p_status = $this->p_status;
            $payment->finished_year = $this->finished_year;
            $payment->payment_end_month = $this->payment_end_month;
            $payment->bank_name = $this->bank_name;
            $payment->bank_account_holder = $this->bank_account_holder;
            $payment->bank_account_number = $this->bank_account_number;
            $payment->branch_name = $this->branch_name;
            $payment->branch_code = $this->branch_code;
            $payment->user_id = Auth::user()->id;
            $payment->save();
        }



        $this->saved = true;


        session()->flash('message', 'BSS student ' .$this->student_name. ' Updated Successfully.');
        $this->clreaForm();
    }

    public function updatedSelectedDsd($dsd_id)
    {
        if (!is_null($dsd_id)) {
            $this->gnds = GnOffice::where('dsd_id', $dsd_id)->get();
        }
    }

    public function studentId($id)
    {
        $this->student_id= $id;
        $this->getData();
    }

    public function clreaForm(){
        $this->schol_given_on = '';
        $this->ref_no = '';
        $this->name = '';
        $this->gender = '';
        $this->stream = '';
        $this->nic = '';
        $this->ethnicity = '';
        $this->date_of_birth = '';
        $this->address = '';
        $this->contact = '';
        $this->guardian_name = '';
        $this->relationship = '';
        $this->al_year = '';
        $this->stream = '';
        $this->school = '';
        $this->grade_05_year = '';
        $this->ol_year = '';
        $this->uni_year = '';
        $this->direct_by_bmic = '';
        $this->selectedDsd = '';
        $this->gn_id = '';
        $this->sector = '';
        $this->samurdi = '';
        $this->low_income = '';
        $this->bmic_pci = '';
        $this->non_bmic_pci = '';
        $this->status_id = '';
        $this->client_code = '';
        $this->schol_type = '';
        $this->scholar_amount = '';
        $this->payment_start_year = '';
        $this->payment_start_month = '';
        $this->renewal_document = '';
        $this->reason_for_dropouts = '';
        $this->p_status = '';
        $this->finished_year = '';
        $this->payment_end_month = '';
        $this->bank_name = '';
        $this->bank_account_holder = '';
        $this->bank_account_number = '';
    }

    public function render()
    {
        return view('livewire.bss.edit-student');
    }
}
