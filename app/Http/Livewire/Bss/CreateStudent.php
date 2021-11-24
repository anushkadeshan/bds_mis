<?php

namespace App\Http\Livewire\Bss;

use Auth;
use Livewire\Component;
use App\Models\DsOffice;
use App\Models\GnOffice;
use App\Models\bss\Status;
use App\Models\bss\Pyament;
use App\Models\bss\Student;
use Livewire\WithFileUploads;

class CreateStudent extends Component
{
    use WithFileUploads;

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
    public $photo;

    public $saved = false;


    public function mount(){

        $this->gnds = collect();
        $dsds = DsOffice::select('id','name')->get()->toArray();
        $status = Status::select('id','status')->get()->toArray();
        $this->dsds = $dsds;
        $this->status = $status;
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);
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
        'schol_type' => 'required|string|max:45',

        //payment
        'scholar_amount' => 'required|numeric',
        'payment_start_year' => 'required|numeric|digits:4',
        'payment_start_month' => 'required|string|max:50',
        'renewal_document' => 'required|boolean',
        'reason_for_dropouts' => 'nullable|string|max:500',
        'p_status' => 'required|numeric',
        'finished_year' => 'required|numeric',

        //bank details
        'payment_end_month' => 'required',
        'bank_name' => 'required',
        'bank_account_holder' => 'required',
        'bank_account_number' => 'required'
    ];


    public function saveData(){
        //dd(date('Y-m-d', strtotime($this->schol_given_on)));

        $v = $this->validate();
        if($this->photo){
            $name = $this->photo->storePublicly('bss','public');
        }
        else{
            $name = null;
        }


        //dd("lll",$v);
        $data = Student::create([
            'schol_given_on' => $this->schol_given_on,
            'ref_no' => $this->ref_no,
            'name' => $this->name,
            'gender' => $this->gender,
            'stream' => $this->stream,
            'nic' => $this->nic,
            'ethnicity' => $this->ethnicity,
            'date_of_birth' => $this->date_of_birth,
            'address' => $this->address,
            'contact' => $this->contact,
            'guardian_name' => $this->guardian_name,
            'relationship' => $this->relationship,
            'al_year' => $this->al_year,
            'stream' => $this->stream,
            'school' => $this->school,
            'grade_05_year' => $this->grade_05_year,
            'ol_year' => $this->ol_year,
            'uni_year' => $this->uni_year,
            'direct_by_bmic' => $this->direct_by_bmic,
            'dsd_id' => $this->selectedDsd,
            'gn_id' => $this->gn_id,
            'sector' => $this->sector,
            'branch_id' => Auth::user()->branch_id,
            'samurdi' => $this->samurdi,
            'low_income' => $this->low_income,
            'bmic_pci' => $this->bmic_pci,
            'non_bmic_pci' => $this->non_bmic_pci,
            'status_id' => $this->status_id,
            'client_code' => $this->client_code,
            'added_by' => Auth::user()->id,
            'schol_type' => $this->schol_type,
            'client_name' => $this->client_name,
            'bmic_branch' => $this->bmic_branch,
            'bmic_region' => $this->bmic_region,
            'profile_picture' => $name,
            'approved' =>false
        ]);

        Pyament::create([
            'scholar_amount' => $this->scholar_amount,
            'payment_start_year' => $this->payment_start_year,
            'payment_start_month' => $this->payment_start_month,
            'renewal_document' => $this->renewal_document,
            'reason_for_dropouts' => $this->reason_for_dropouts,
            'p_status' => $this->p_status,
            'finished_year' => $this->finished_year,
            'payment_end_month' => $this->payment_end_month,
            'bank_name' => $this->bank_name,
            'bank_account_holder' => $this->bank_account_holder,
            'bank_account_number' => $this->bank_account_number,
            'branch_name' => $this->branch_name,
            'branch_code' => $this->branch_code,
            'student_id' =>$data->id,
            'user_id'=> Auth::user()->id
        ]);

        $this->saved = true;

        session(['student_id'=>$data->id]);
        $this->emit('Created');

        session()->flash('message', 'BSS student ' .$this->name. ' Created Successfully.');
        $this->clreaForm();
    }

    public function updatedSelectedDsd($dsd_id)
    {
        if (!is_null($dsd_id)) {
            $this->gnds = GnOffice::where('dsd_id', $dsd_id)->get();
        }
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
        $this->branch_name = '';
        $this->branch_code = '';
        $this->client_name = '';
        $this->bmic_branch = '';
        $this->bmic_region = '';
    }

    public function render()
    {
        return view('livewire.bss.create-student');
    }
}
