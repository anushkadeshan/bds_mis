<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DsOffice;
use App\Models\GnOffice;
use App\Models\LivelihoodFamily;
use App\Models\LivelihoodFamilyMember;

use App\Events\CreateNewFamily;
use Auth;
class CreateLivelihoodfamily extends Component
{
    public $selectedState;
    public $dsds;
    public $gnds;

    public $selectedDistrict = NULL;
    public $selectedDsd = NULL;
    public $selectedGnd = NULL;

    public $relationship_to_hhh, $member_contact, $member_sp_contact, $age, $gender, $civil_status,  $education, $employment, $health, $school_grade, $serial_number;
    public $updateMode = false;
    public $inputs = [];
    public $i = 1;

    public $village, $date_of_interviewed, $interviewer, $respondent, $res_rela_to_HHH, $hh_address, $family_type = '';
    public $hh_name, $hh_nic, $hh_contact, $hh_sp_contact, $hh_ethnicity, $hh_religion, $hh_age, $hh_gender, $hh_civil_status, $hh_education, $hh_employment, $hh_health;

    public $spouse_nic, $spouse_contact, $spouse_sp_contact, $spouse_age, $spouse_gender, $spouse_education, $spouse_employment, $spouse_health;

    protected $rules = [
        'selectedDsd' => 'required',
        'selectedDistrict' => 'required',
        'selectedGnd' => 'required',
        'village' => 'required',
        'date_of_interviewed' => 'required',
        'interviewer' => 'required',
        'respondent' => 'required',
        'hh_address' => 'required',
        'family_type' => 'required',
    ];

    public function mount()
    {
        $this->dsds = collect();
        $this->gnds = collect();
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

    public function render()
    {
        return view('livewire.create-livelihoodfamily');
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

    public function saveData(){
        $this->validate();

        $data = LivelihoodFamily::create([
            'serial_number' => $this->serial_number,
            'district' => $this->selectedDistrict,
            'dsd_id'=> $this->selectedDsd,
            'gn_id'=> $this->selectedGnd,
            'village'=> $this->village,
            'date_of_interviewed'=> $this->date_of_interviewed,
            'interviewer'=> $this->interviewer,
            'respondent'=> $this->respondent,
            'res_rela_to_HHH'=> $this->res_rela_to_HHH,
            'hh_address'=> $this->hh_address,
            'family_type'=> json_encode($this->family_type),
            'hh_name'=> $this->hh_name,
            'hh_nic'=> $this->hh_nic,
            'spouse_nic'=> $this->spouse_nic,
            'hh_contact'=> $this->hh_contact,
            'spouse_contact'=> $this->spouse_contact,
            'hh_sp_contact'=> $this->hh_sp_contact,
            'spouse_sp_contact'=> $this->spouse_sp_contact,
            'hh_ethnicity'=> $this->hh_ethnicity,
            'hh_religion'=> $this->hh_religion,
            'hh_gender'=> $this->hh_gender,
            'spouse_gender'=> $this->spouse_gender,
            'hh_age'=> $this->hh_age,
            'spouse_age'=> $this->spouse_age,
            'hh_civil_status'=> $this->hh_civil_status,
            'hh_education'=> $this->hh_education,
            'spouse_education'=> $this->spouse_education,
            'hh_employment'=> $this->hh_employment,
            'spouse_employment'=> $this->spouse_employment,
            'hh_health'=> $this->hh_health,
            'spouse_health' => $this->spouse_health,
            'approved' =>false,
            'added_by' => Auth::user()->id,
        ]);

        $lastId = $data->id;
        if(!is_null($this->relationship_to_hhh || $this->age || $this->gender))
         foreach ($this->gender as $key => $value) {
            LivelihoodFamilyMember::create([
                'hh_id' => $lastId,
                'relationship_to_hhh' => $this->relationship_to_hhh[$key],
                'age' => $this->age[$key],
                'gender' => $this->gender[$key],
                'member_contact' => $this->member_contact[$key],
                'member_sp_contact' => $this->member_sp_contact[$key],
                'civil_status' => $this->civil_status[$key],
                'school_grade' => $this->school_grade[$key],
                'education' => $this->education[$key],
                'employment' => $this->employment[$key],
                'health' => $this->health[$key]
            ]);
        }

        $user = Auth::user();
        event(new CreateNewFamily($data,$user));

        $this->inputs = [];
        $this->clearForm();

        session()->flash('message', 'Livelyhood Family Created Successfully.');
    }

    public function clearForm(){
        $this->selectedDistrict = '';
        $this->selectedGnd ='';
        $this->selectedDsd='';
        $this->village ='';
        $this->date_of_interviewed = '';
        $this->interviewer = '';
        $this->respondent = '';
        $this->res_rela_to_HHH = '';
        $this->hh_address = '';
        $this->family_type = '';
        $this->hh_name = '';
        $this->hh_nic = '';
        $this->spouse_nic = '';
        $this->hh_contact = '';
        $this->spouse_contact = '';
        $this->hh_sp_contact = '';
        $this->spouse_sp_contact = '';
        $this->hh_ethnicity = '';
        $this->hh_religion = '';
        $this->hh_gender = '';
        $this->spouse_gender = '';
        $this->hh_age = '';
        $this->spouse_age = '';
        $this->hh_civil_status = '';
        $this->hh_education = '';
        $this->spouse_education = '';
        $this->hh_employment = '';
        $this->spouse_employment = '';
        $this->hh_health = '';
        $this->spouse_healt = '';

        $this->relationship_to_hhh = '';
        $this->age = '';
        $this->gender = '';
        $this->member_contact = '';
        $this->member_sp_contact = '';
        $this->civil_status = '';
        $this->school_grade = '';
        $this->education = '';
        $this->employment = '';
        $this->health = '';
    }


}
