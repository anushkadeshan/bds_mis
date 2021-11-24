<?php

namespace App\Http\Livewire\LogFrame;

use Livewire\Component;
use App\Models\DsOffice;
use App\Models\GnOffice;
use App\Models\LivelihoodFamily;
use App\Models\LogFrame\Activity;

class CreateCompletionReport extends Component
{
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


    public $family_id = '';
    public $activities = [];
    public $families = [];
    public $inputs = [];
    public $inputs2 = [];
    public $i = 1;
    public $x = 1;

    public $ages = ['15-18','19-24','25-29','30-35','36-60','61 & Over'];

    public function mount()
    {
        $this->dsds = collect();
        $this->gnds = collect();
        $families = LivelihoodFamily::select('id','hh_name','village')->get()->toArray();
        $this->families = $families;
        $this->activities = Activity::get();
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
        return view('livewire.log-frame.create-completion-report');
    }
}
