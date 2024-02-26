<?php

namespace App\Http\Livewire\Skill\Employers;

use App\Models\skill\Employer;
use Livewire\Component;

class AddEmployers extends Component
{
    public $name;
    public $address;
    public $company_type;
    public $industry;
    public $user_id;
    public $phone;
    public $email;
    public $added_by;

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
        Employer::create([
            'name' => $this->name,
            'address' => $this->address,
            'company_type' => $this->company_type,
            'industry' => $this->industry,
            'phone' => $this->phone,
            'email' => $this->email,
            'added_by' => auth()->user()->id,
            'approved' => false,
            'user_id' => auth()->user()->id,
        ]);

        session()->flash('message', 'New Employer added Successfully.');
        $this->emit('refreshLivewireDatatable');
        $this->clear();
    }

    public function clear(){
        $this->name = '';
        $this->address = '';
        $this->company_type = '';
        $this->industry = '';
        $this->phone = '';
        $this->email = '';
    }

    public function render()
    {
        return view('livewire.skill.employers.add-employers');
    }
}
