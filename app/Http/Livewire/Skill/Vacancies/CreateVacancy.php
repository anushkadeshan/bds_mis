<?php

namespace App\Http\Livewire\Skill\Vacancies;

use App\Models\skill\Employer;
use App\Models\skill\Vacancy;
use Livewire\Component;

class CreateVacancy extends Component
{
    public $employers;
    public $title;
    public $description;
    public $job_type;
    public $industry;
    public $business_function;
    public $location;
    public $district;
    public $salary;
    public $total_vacancies;
    public $dedline;
    public $min_qualification;
    public $specializaion;
    public $skills;
    public $gender;
    public $user_id;
    public $employer_id;

    public function mount(){
        $this->employers = Employer::select('name','id')->get();
    }

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'job_type' => 'required',
        'business_function' => 'required',
        'location' => 'required',
        'dedline' => 'required',
        'min_qualification' => 'required',
        'specializaion' => 'required',
        'gender' => 'required',
    ];

    public function save(){
        $this->validate();
        Vacancy::create([
            'title' => $this->title,
            'description' => $this->description,
            'job_type' => $this->job_type,
            'industry' => $this->industry,
            'business_function' => $this->business_function,
            'location' => $this->location,
            'district' => $this->district,
            'salary' => $this->salary,
            'total_vacancies' => $this->total_vacancies,
            'dedline' => $this->dedline,
            'min_qualification' => $this->min_qualification,
            'specializaion' => $this->specializaion,
            'skills' => $this->skills,
            'gender' => $this->gender,
            'approved' => false,
            'user_id' => auth()->user()->id,
            'employer_id' => $this->employer_id
        ]);
        session()->flash('message', 'New Vacancy added Successfully.');
        $this->emit('refreshLivewireDatatable');
        //$this->clear();

    }

    public function clear(){
        $this->employers = '';
        $this->title = '';
        $this->description = '';
        $this->job_type = '';
        $this->industry = '';
        $this->business_function = '';
        $this->location = '';
        $this->district = '';
        $this->salary = '';
        $this->total_vacancies = '';
        $this->dedline = '';
        $this->min_qualification = '';
        $this->specializaion = '';
        $this->skills = '';
        $this->gender = '';
        $this->user_id = '';
        $this->employer_id = '';
    }

    public function render()
    {
        return view('livewire.skill.vacancies.create-vacancy');
    }
}
