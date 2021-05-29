<?php

namespace App\Http\Livewire\Skill\Employers;

use Livewire\Component;
use App\Models\skill\Employer;

class EditEmployer extends Component
{
    public $name;
    public $address;
    public $company_type;
    public $industry;
    public $user_id;
    public $phone;
    public $email;
    public $added_by;
    public $employer_id;

    protected $rules = [
        'name' => 'required',
        'phone' => 'required|numeric|digits:10',
        'address' => 'required',
        'company_type' => 'required',
        'industry' => 'required'
    ];

    public function save()
    {
        $this->validate();
        $employer = Employer::find($this->employer_id);
        $employer->name = $this->name;
        $employer->address = $this->address;
        $employer->company_type = $this->company_type;
        $employer->industry = $this->industry;
        $employer->phone = $this->phone;
        $employer->email = $this->email;
        $employer->user_id = auth()->user()->id;
        $employer->save();

        session()->flash('message', 'Employer updated Successfully.');
        $this->emit('refreshLivewireDatatable');
    }

    public function mount($employer){
        $this->employer_id = $employer['id'];
        $this->name = $employer['name'];
        $this->address = $employer['address'];
        $this->company_type = $employer['company_type'];
        $this->industry = $employer['industry'];
        $this->phone = $employer['phone'];
        $this->email = $employer['email'];
    }
    public function render()
    {
        return view('livewire.skill.employers.edit-employer');
    }
}
