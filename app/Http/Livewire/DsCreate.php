<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DsOffice;
use App\Events\CreateDSD;
use Auth;
class DsCreate extends Component
{

    public $district;
    public $name;
    public $province;

    protected $rules = [
        'name' => 'required',
        'province' => 'required',
        'district' => 'required',
    ];

    public function store(){
        $this->validate();

        $dsd = DsOffice::create([
            'name' => $this->name,
            'province' => $this->province,
            'district' => $this->district,
            'approved' =>false,
        ]);
        $user = Auth::user();
        event(new CreateDSD($dsd,$user));
        $this->name = '';
        $this->province = '';
        $this->district = '';
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Student Persoanl details added Successfully.!"
        ]);
        $this->emit('refreshLivewireDatatable');
        session()->flash('message', 'DS Division added successfully');

    }

    public function mount()
    {
        return view('livewire.ds-create');
    }
}
