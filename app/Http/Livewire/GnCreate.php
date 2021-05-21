<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\GnOffice;
use App\Events\createGn;
use Auth;

class GnCreate extends Component
{
    public $dss;
    public $dsDivision;
    public $name;

    protected $rules = [
        'name' => 'required',
        'dsDivision' => 'required',
    ];
    
    //protected $listeners = ['echo:bds_mis,createGn' => 'showalert'];


    public function store(){
        $this->validate();
        $gn = GnOffice::create([
            'name' => $this->name,
            'dsd_id' => $this->dsDivision,
        ]);
        
        $user = Auth::user();
        event(new createGn($gn,$user));
        $this->emit('refreshLivewireDatatable');
        $this->name = '';
        $this->dsDivision = '';
        session()->flash('message', 'GN Division added successfully');
        
       
    }
    public function mount($dss)
    {
        return view('livewire.gn-create')->with(['dss'=>$dss]);
    }

    public function showalert(){
        $this->emit('alert',['type'=>'success','message'=>'successfully added']);
    }
}
