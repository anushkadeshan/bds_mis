<?php

namespace App\Http\Livewire\Csos;

use App\Models\Cso;
use App\Models\CsoMember;
use Livewire\Component;
use App\Models\DsOffice;
use App\Models\GnOffice;

class CsosCreate extends Component
{
    public $name;
    public $gn_id;
    public $category;
    public $reg_no;

    public $selectedDistrict = NULL;
    public $selectedDsd = NULL;

    public $dsds;
    public $gnds;

    public $inputs = [];
    public $i = 1;

    public $member_name = null;
    public $nic = 0;
    public $hh_id = 0;

    public function mount()
    {
        $this->dsds = collect();
        $this->gnds = collect();
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

    protected $rules = [
        'name' => 'required',
        'selectedDistrict' => 'required',
        'selectedDsd' => 'required',
        'gn_id' => 'required',
        'category' => 'required',
        'member_name' => 'required',
    ];

    public function saveData(){

        $this->validate();

        $cso = Cso::create([
            'name' => $this->name,
            'district' => $this->selectedDistrict,
            'dsd_id' => $this->selectedDsd,
            'gn_id' => $this->gn_id,
            'category' => $this->category,
            'reg_no' => $this->reg_no,
            'added_by' => 1
        ]);

        if(!is_null($this->member_name))
         foreach ($this->member_name as $key => $value) {
            CsoMember::create([
                'cso_id' => $cso->id,
                'name' => $this->member_name[$key],
                'nic' => $this->nic[$key] ?? null,
                'hh_id' => $this->hh_id[$key] ?? null,
            ]);
        }
        $this->clear();
        session()->flash('message', 'CSO Profile Created Successfully.');
    }

    public function clear(){
        $this->name = '';
        $this->selectedDistrict = '';
        $this->selectedDsd = '';
        $this->gn_id = '';
        $this->category = '';
        $this->reg_no = '';
        $this->inputs = '';
    }

    public function render()
    {
        return view('livewire.csos.csos-create');
    }
}
