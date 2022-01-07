<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class AddEmployee extends Component
{
    use LivewireAlert;
    public $gender;
    public $epf;
    public $title;
    public $full_name;
    public $calling_name;
    public $date_of_birth;
    public $branch;
    public $mobile_number;
    public $company;

    protected $rules = [
        'gender' => 'required',
        'epf' => 'required',
        'title' => 'required',
        'full_name' => 'required',
        'calling_name' => 'required',
        'date_of_birth' => 'required',
        'branch' => 'required',
        'mobile_number' => 'required',
        'company' => 'required',
    ];

    public function save(){
        $this->validate();
        $data = Employee::create([
            'gender' => $this->gender,
            'epf' => $this->epf,
            'title' => $this->title,
            'full_name' => $this->full_name,
            'calling_name' => $this->calling_name,
            'date_of_birth' => $this->date_of_birth,
            'branch' => $this->branch,
            'mobile_number' => $this->mobile_number,
            'company' => $this->company,
        ]);

        $this->alert('success','Employee added successfully');
        $this->gender = '';
        $this->epf = '';
        $this->title = '';
        $this->full_name = '';
        $this->calling_name = '';
        $this->date_of_birth = '';
        $this->branch = '';
        $this->mobile_number = '';
        $this->company = '';
    }
    public function render()
    {
        return view('livewire.add-employee');
    }
}
