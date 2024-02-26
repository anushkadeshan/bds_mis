<?php

namespace App\Http\Livewire\LogFrame;

use App\Models\Cso;
use Livewire\Component;
use App\Models\LivelihoodFamily;
use Illuminate\Support\Facades\Auth;

class SearchIds extends Component
{
    public $query;
    public $query2;
    public $families = [];
    public $csos = [];
    public $family_id;
    public $cso_id;

    public function updatedQuery(){
        $gnds  = json_decode(Auth::user()->gnds);
        $this->families = LivelihoodFamily::whereIn('gn_id',$gnds)
            ->where('hh_name','like','%'.$this->query. '%')
            ->select('id','hh_name','serial_number','branch_id')
            ->get()->toArray();
    }
    public function updatedQuery2(){
        $gnds  = json_decode(Auth::user()->gnds);

        $this->csos = Cso::whereIn('gn_id',$gnds)
            ->where('name','like','%'.$this->query2. '%')
            ->orWhere('reg_no','like','%'.$this->query2. '%')
            ->select('id','name','reg_no')
            ->get()->toArray();

    }

    public function clear(){
        $this->families = [];
    }

    public function clear2(){
        $this->csos = [];
    }

    public function selectFamily($id){
        $family  = LivelihoodFamily::find($id);
        $this->hh_name = $family->hh_name;
        $this->query = $family->hh_name;
        $this->family_id = $id;
        $this->families = [];
    }

    public function selectCSO($id){
        $family  = Cso::find($id);
        $this->cso_name = $family->name;
        $this->query2 = $family->name;
        $this->cso_id = $id;
        $this->csos = [];
    }

    public function render()
    {
        return view('livewire.log-frame.search-ids');
    }
}
