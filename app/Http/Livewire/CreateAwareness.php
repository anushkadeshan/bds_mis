<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DsOffice;
use App\Models\GnOffice;
use App\Models\AwarnessCSOS;
use App\Models\AwarnessSGBV;
use Livewire\WithFileUploads;
use App\Models\AwarnessPhotos;
use App\Models\ResoursePerson;
use App\Models\LivelihoodFamily;
use Illuminate\Support\Facades\Auth;

class CreateAwareness extends Component
{

    use WithFileUploads;

    public $selectedState;
    public $dsds;
    public $gnds;

    public $selectedDistrict = NULL;
    public $selectedDsd = NULL;
    public $selectedGnd = NULL;

    public $updateMode = false;
    public $inputs = [];
    public $i = 1;

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

    protected $rules = [
        'selectedDsd' => 'required',
        'selectedDistrict' => 'required',
        'selectedGnd' => 'required',
        'financial_year' => 'required|numeric',
        'specific_activity_name' => 'required',
        'date_of_start' => 'required',
        'date_of_end' => 'required',
        'totol_planned_cost' => 'required',
        'family_id' => 'required',
        'photos.*' => 'image|max:1024', // 1MB Max
    ];

    public $family_id = '';
    public $resourse_person_id = '';

    public $families = [];
    public $resourses = [];
    public $photos = [];
    public function mount()
    {
        $this->dsds = collect();
        $this->gnds = collect();
        $families = LivelihoodFamily::select('id', 'hh_name', 'village')->get()->toArray();
        $resourses = ResoursePerson::select('id', 'name', 'institute')->get()->toArray();
        $this->resourses = $resourses;
        $this->families = $families;
    }


    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
        //dd($this->inputs);
    }

    public function add2($x)
    {
        $x = $x + 1;
        $this->x = $x;
        array_push($this->inputs2, $x);
    }

    public function remove2($x)
    {
        unset($this->inputs2[$x]);
        //dd($this->inputs);
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

    public function updatedAttendance()
    {
        $this->validate([
            'attendance' => 'mimes:pdf,docx|max:1024|required', // 1MB Max
        ]);
    }

    public function updatedPhotos()
    {
        $this->validate([
            'photos.*' => 'mimes:jpg,jpeg|max:1024|required', // 1MB Max
        ]);
    }



    public function saveData()
    {
        $this->validate();
        $attendance_name  = $this->attendance->store('awarness_attendance');
        //dd($attendance_name);
        $data = AwarnessSGBV::create([
            'disctrict' => $this->selectedDistrict,
            'dsd_id' => $this->selectedDsd,
            'gnd_id' => $this->selectedGnd,
            'totdal_actual_cost' => $this->totdal_actual_cost,
            'responsible_officer' => $this->responsible_officer,
            'log_activity_name' => $this->log_activity_name,
            'output_code' => $this->output_code,
            'activity_code' => $this->activity_code,
            'financial_year' => $this->financial_year,
            'specific_activity_name' => $this->specific_activity_name,
            'date_of_start' => $this->date_of_start,
            'date_of_end' => $this->date_of_end,
            'partner_contribution' => $this->partner_contribution,
            'bds_contribution' => $this->bds_contribution,
            'totol_planned_cost' => $this->totol_planned_cost,
            'units_completed' => $this->units_completed,
            'lessions_learned' => $this->lessions_learned,
            'family_id' => json_encode($this->family_id),
            'views_of_rp' => $this->views_of_rp,
            'attendance' => $attendance_name,
            'resourse_person_id' => $this->resourse_person_id,
            'added_by' => Auth::user()->id,
        ]);

        //dd($data);
        $lastId = $data->id;
        if (!is_null($this->name || $this->male || $this->female))
            foreach ($this->name as $key => $value) {
                AwarnessCSOS::create([
                    'awarness_id' => $lastId,
                    'name' => $this->name[$key],
                    'male' => $this->male[$key],
                    'female' => $this->female[$key],
                ]);
            }

        foreach ($this->photos as $photo) {
            $photo_name = $photo->store('awarness_photos');
            AwarnessPhotos::create([
                'name' => $photo_name,
                'awarness_id' => $lastId
            ]);
        }



        $this->inputs = [];
        $this->inputs2 = [];
        //$this->clearForm();

        session()->flash('message', 'Idea Generation Program Created Successfully.');
    }
    public function clearForm()
    {
        $this->disctrict = '';
        $this->dsd_id = '';
        $this->gnd_id = '';
        $this->totdal_actual_cost = '';
        $this->responsible_officer = '';
        $this->log_activity_name = '';
        $this->output_code = '';
        $this->activity_code = '';
        $this->financial_year = '';
        $this->specific_activity_name = '';
        $this->date_of_start = '';
        $this->date_of_end = '';
        $this->partner_contribution = '';
        $this->bds_contribution = '';
        $this->totol_planned_cost = '';
        $this->units_completed = '';
        $this->lessions_learned = '';
    }
    public function render()
    {
        return view('livewire.create-awareness');
    }
}
