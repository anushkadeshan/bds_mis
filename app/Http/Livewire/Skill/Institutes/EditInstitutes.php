<?php

namespace App\Http\Livewire\Skill\Institutes;

use Livewire\Component;
use App\Models\skill\Institute;

class EditInstitutes extends Component
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
    public $institute_id;

    protected $rules = [
        'name' => 'required',
        'address' => 'required',
        'phone' => 'required|numeric',
        'location' => 'required',
        'is_registerd' => 'required',
        'type' => 'required',
    ];

    public function save(){
        $this->validate();
        $institute = Institute::find($this->institute_id);
        $institute->location = $this->location;
        $institute->address = $this->address;
        $institute->contact_person = $this->contact_person;
        $institute->phone = $this->phone;
        $institute->email = $this->email;
        $institute->is_registerd = $this->is_registerd;
        $institute->reg_no = $this->reg_no;
        $institute->type = $this->type;
        $institute->save();
        session()->flash('message', 'Institute updated Successfully.');
    }

    public function mount($institute){
        $this->name = $institute['name'];
        $this->location = $institute['location'];
        $this->address = $institute['address'];
        $this->contact_person = $institute['contact_person'];
        $this->phone = $institute['phone'];
        $this->email = $institute['email'];
        $this->is_registerd = $institute['is_registerd'];
        $this->reg_no = $institute['reg_no'];
        $this->type = $institute['type'];
        $this->added_by = $institute['added_by'];
        $this->institute_id = $institute['id'];

    }

    public function render()
    {
        return view('livewire.skill.institutes.edit-institutes');
    }
}
