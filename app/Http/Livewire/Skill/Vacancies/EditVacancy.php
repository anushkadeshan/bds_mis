<?php

namespace App\Http\Livewire\Skill\Vacancies;

use Livewire\Component;
use App\Models\skill\Employer;
use App\Models\skill\Vacancy;

class EditVacancy extends Component
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
    public $vacancy_id;

    public function mount($vacancy){
        $this->employers = Employer::select('name','id')->get();
        $this->vacancy_id = $vacancy['id'];
        $this->title = $vacancy['title'];
        $this->description = $vacancy['description'];
        $this->job_type = $vacancy['job_type'];
        $this->industry = $vacancy['industry'];
        $this->business_function = $vacancy['business_function'];
        $this->location = $vacancy['location'];
        $this->district = $vacancy['district'];
        $this->salary = $vacancy['salary'];
        $this->total_vacancies = $vacancy['total_vacancies'];
        $this->dedline = $vacancy['dedline'];
        $this->min_qualification = $vacancy['min_qualification'];
        $this->specializaion = $vacancy['specializaion'];
        $this->skills = $vacancy['skills'];
        $this->gender = $vacancy['gender'];
        $this->employer_id = $vacancy['employer_id'];

    }

    public function save(){
        $vacancy = Vacancy::find($this->vacancy_id);
        $vacancy->title = $this->title;
        $vacancy->description = $this->description;
        $vacancy->job_type = $this->job_type;
        $vacancy->industry = $this->industry;
        $vacancy->business_function = $this->business_function;
        $vacancy->location = $this->location;
        $vacancy->district = $this->district;
        $vacancy->salary = $this->salary;
        $vacancy->total_vacancies = $this->total_vacancies;
        $vacancy->dedline = $this->dedline;
        $vacancy->min_qualification = $this->min_qualification;
        $vacancy->specializaion = $this->specializaion;
        $vacancy->skills = $this->skills;
        $vacancy->gender = $this->gender;
        $vacancy->approved = false;
        $vacancy->user_id = auth()->user()->id;
        $vacancy->employer_id = $this->employer_id;
        $vacancy->save();

        session()->flash('message', 'Vacancy updated Successfully.');
        $this->emit('refreshLivewireDatatable');
    }

    public function render()
    {
        return view('livewire.skill.vacancies.edit-vacancy');
    }
}
