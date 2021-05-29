<?php

namespace App\Http\Livewire;
use Auth;
use App\Models\Pyament;
use App\Models\Student;
use Livewire\Component;
use App\Models\DsOffice;
use App\Models\GnOffice;

use App\Models\bss\Status;
use Illuminate\Support\Facades\DB;

class BssCreate extends Component
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


    public function mount(){
        $this->gnds = collect();
        $dsds = DsOffice::select('id','name')->get()->toArray();
        $status = Status::select('id','status')->get()->toArray();
        $this->dsds = $dsds;
        $this->status = $status;
    }

    protected $rules = [
        'schol_given_on' => 'nullable',
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
        'schol_type' => 'nullable|string|max:45',

        //payment
        'scholar_amount' => 'required|numeric',
        'payment_start_year' => 'required|integer',
        'payment_start_month' => 'required|string|max:50',
        'renewal_document' => 'required|boolean',
        'reason_for_dropouts' => 'nullable|string|max:500',
        'p_status' => 'required|integer',
        'finished_year' => 'required|integer',
    ];


    public function saveData(){

        $data = DB::table('students')->insert([
            'schol_given_on' => 1,
            'ref_no' => 1,
            'name' => 1,
            'gender' => 1,
            'stream' => 1,
            'nic' => 1,
            'ethnicity' => 1,
            'date_of_birth' => 1,
            'address' => 1,
            'contact' => 1,
            'guardian_name' => 1,
            'relationship' => 1,
            'al_year' => 1,
            'stream' => 1,
            'school' => 1,
            'grade_05_year' => 1,
            'ol_year' => 1,
            'uni_year' => 1,
            'direct_by_bmic' => 1,
            'dsd_id' => 1,
            'gn_id' => 1,
            'sector' => 1,
            'branch_id' => 1,
            'samurdi' => 1,
            'low_income' => 1,
            'bmic_pci' => 1,
            'non_bmic_pci' => 1,
            'status_id' => 1,
            'client_code' => 1,
            'added_by' => 1,
            'schol_type' => 1
        ]);

        Pyament::create([
            'scholar_amount' => $this->scholar_amount,
            'payment_start_year' => $this->payment_start_year,
            'payment_start_month' => $this->payment_start_month,
            'renewal_document' => $this->renewal_document,
            'reason_for_dropouts' => $this->reason_for_dropouts,
            'p_status' => $this->p_status,
            'finished_year' => $this->finished_year,
            'student_id' =>$data->id,
            'user_id'=> Auth::user()->id
        ]);

        session()->flash('message', 'Marketing Linkages activity Created Successfully.');
    }

    public function updatedSelectedDsd($dsd_id)
    {
        if (!is_null($dsd_id)) {
            $this->gnds = GnOffice::where('dsd_id', $dsd_id)->get();
        }
    }

    public function render()
    {
        return view('livewire.bss-create');
    }
}
