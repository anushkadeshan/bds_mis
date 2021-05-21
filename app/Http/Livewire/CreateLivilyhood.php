<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DsOffice;
use App\Models\GnOffice;
use App\Models\ImproveLivilyhood;
use App\Models\LivilyhoodMeterials;
use App\Models\LivilyhoodPartners;
use App\Models\LivelihoodFamily;
use Auth;

use DB;
class CreateLivilyhood extends Component
{
    public $selectedState;
    public $dsds;
    public $gnds;

    public $selectedDistrict = NULL;
    public $selectedDsd = NULL;
    public $selectedGnd = NULL;

    public $updateMode = false;
    public $inputs = [];
    public $inputs2 = [];
    public $i = 1;
    public $x = 1;

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
        $quantity;

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
    ];

    public $family_id = '';
 
    public $families = [];

    public function mount()
    {
        $this->dsds = collect();
        $this->gnds = collect();
        $families = LivelihoodFamily::select('id','hh_name','village')->get()->toArray();
        $this->families = $families;
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

    public function add2($x)
    {
        $x = $x + 1;
        $this->x = $x;
        array_push($this->inputs2 ,$x);
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

    public function saveData(){
        $this->validate();

        $data = ImproveLivilyhood::create([
            'disctrict' => $this->selectedDistrict,
            'dsd_id'=> $this->selectedDsd,
            'gnd_id'=> $this->selectedGnd,
            'totdal_actual_cost'=> $this->totdal_actual_cost,
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
            'family_id' => $this->family_id,
            'added_by' => Auth::user()->id,
        ]);

        $lastId = $data->id;
        if(!is_null($this->beneficiary_name || $this->meterial || $this->quantity))
         foreach ($this->beneficiary_name as $key => $value) {
            LivilyhoodMeterials::create([                
                'livelihood_id' => $lastId,
                'beneficiary_name' => $this->beneficiary_name[$key],
                'meterial' => $this->meterial[$key],
                'quantity' => $this->quantity[$key],
            ]);
        }

        if(!is_null($this->type_of_contribution || $this->organization || $this->financial_contribution))
         foreach ($this->type_of_contribution as $key => $value) {
            LivilyhoodPartners::create([                
                'livelihood_id' => $lastId,
                'organization' => $this->organization[$key],
                'type_of_contribution' => $this->type_of_contribution[$key],
                'financial_contribution' => $this->financial_contribution[$key],
                'other' => $this->other[$key],
                'other_amount' => $this->other_amount[$key],
            ]);
        }

        $this->inputs = [];
        $this->inputs2 = [];
        $this->clearForm();
         
        session()->flash('message', 'Livelyhood Family Created Successfully.');

    }
    public function clearForm(){
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
        return view('livewire.create-livilyhood');
    }
}
