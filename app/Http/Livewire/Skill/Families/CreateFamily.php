<?php

namespace App\Http\Livewire\Skill\Families;

use Livewire\Component;
use App\Models\DsOffice;
use App\Models\GnOffice;
use App\Models\skill\Family;
use App\Models\LivelihoodFamily;
use Illuminate\Support\Facades\DB;

class CreateFamily extends Component
{
    public $dsds;
    public $gnds;

    public $selectedDistrict = NULL;
    public $selectedDsd = NULL;
    public $selectedGnd = NULL;
    public $head_of_household;
    public $nic_head_of_household;
    public $address;
    public $family_type;
    public $total_income;
    public $total_members;
    public $is_livelihood;
    public $families;
    public $livelihood_family_id = '';

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

    protected $rules = [
        'selectedDistrict' => 'required',
        'selectedDsd' => 'required',
        'selectedGnd' => 'required',
        'head_of_household' => 'required|unique:families',
        'address' => 'required',
        'family_type' => 'required',
    ];

    public function save(){
        $this->validate();

        $data = Family::create([
            'district' => $this->selectedDistrict,
            'ds_division' => $this->selectedDsd,
            'gn_division' => $this->selectedGnd,
            'head_of_household' => $this->head_of_household,
            'nic_head_of_household' => $this->nic_head_of_household,
            'address' => $this->address,
            'family_type' => $this->family_type,
            'total_income' => $this->total_income,
            'total_members' => $this->total_members,
            'livelihood_family_id' => $this->livelihood_family_id,
            'is_livelihood' => $this->is_livelihood,
            'approved' => false,

        ]);
        session()->flash('message', 'New Family added Successfully.');
        $this->emit('refreshLivewireDatatable');
        $this->clear();
    }

    public function clear(){
         $this->selectedDistrict = '';
         $this->selectedDsd = '';
         $this->selectedGnd = '';
         $this->head_of_household = '';
         $this->nic_head_of_household = '';
         $this->address = '';
         $this->family_type = '';
         $this->total_income = '';
         $this->total_members = '';
         $this->livelihood_family_id = '';
         $this->is_livelihood = '';
    }
    public function mount()
    {
        $this->dsds = collect();
        $this->gnds = collect();
        $families = LivelihoodFamily::select('id','hh_name','village')->get()->toArray();
        $this->families = $families;
    }

    public function render()
    {
        $districts = DB::table('districts')->get();
        return view('livewire.skill.families.create-family',compact('districts'));

    }
}
