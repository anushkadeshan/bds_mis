<?php

namespace App\Http\Livewire\Skill\Institutes;

use App\Models\skill\Institute;
use Livewire\Component;

class AddInstitutes extends Component
{
    public $name;
    public $location;
    public $address;
    public $contact_person;
    public $phone;
    public $email;
    public $is_registerd;
    public $reg_no;
    public $type;
    public $added_by;

    protected $rules = [
        'name' => 'required|unique:institutes',
        'address' => 'required',
        'phone' => 'required|numeric',
        'location' => 'required',
        'is_registerd' => 'required',
        'type' => 'required',
    ];

    public function save(){
        $this->validate();
        Institute::create([
            'location'=> $this->location,
            'address'=> $this->address,
            'contact_person'=> $this->contact_person,
            'phone'=> $this->phone,
            'email'=> $this->email,
            'is_registerd'=> $this->is_registerd,
            'reg_no'=> $this->reg_no,
            'type'=> $this->type,
            'added_by'=> auth()->user()->id
        ]);

        session()->flash('message', 'New Institute added Successfully.');
        $this->emit('refreshLivewireDatatable');
        $this->clear();
    }

    public function clear(){
        $this->location = '';
        $this->address = '';
        $this->contact_person = '';
        $this->phone = '';
        $this->email = '';
        $this->is_registerd = '';
        $this->reg_no = '';
        $this->type = '';
    }


    public function render()
    {
        return view('livewire.skill.institutes.add-institutes');
    }
}
