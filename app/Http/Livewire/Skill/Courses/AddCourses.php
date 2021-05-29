<?php

namespace App\Http\Livewire\Skill\Courses;

use DB;
use Livewire\Component;
use App\Models\skill\Course;

class AddCourses extends Component
{

    public $course_categories = [];
    public $name;
    public $duration;
    public $course_fee;
    public $course_type;
    public $course_catogery;
    public $standard;
    public $course_time;
    public $medium;
    public $min_qualification;
    public $embeded_softs_skills;

    protected $rules = [
        'name' => 'required',
        'duration' => 'required|numeric',
        'course_fee' => 'required|numeric',
        'course_type' => 'required',
        'course_time' => 'required',
        'medium' => 'required',
        'min_qualification' => 'required',
        'course_catogery' => 'required'
    ];

    public function save()
    {
        $this->validate();
        Course::create([
            'name' => $this->name,
            'duration' => $this->duration,
            'course_fee' => $this->course_fee ,
            'course_type' => $this->course_type ,
            'course_catogery' => $this->course_catogery,
            'standard' => $this->standard,
            'course_time' => $this->course_time,
            'min_qualification' => $this->min_qualification,
            'embeded_softs_skills' => $this->embeded_softs_skills,
            'medium' => json_encode($this->medium),
            'added_by' => auth()->user()->id
        ]);

        session()->flash('message', 'New Course added Successfully.');
        $this->emit('refreshLivewireDatatable');
        $this->clear();
    }

    public function clear(){
        $this->name = '';
        $this->duration = '';
        $this->course_fee = '';
        $this->course_type = '';
        $this->course_catogery = '';
        $this->standard = '';
        $this->course_time = '';
        $this->min_qualification = '';
        $this->embeded_softs_skills = '';
        $this->medium = '';
    }
    public function mount(){
        $this->course_categories = DB::table('course_categories')->get()->toArray();
    }

    public function render()
    {
        $this->course_categories = DB::table('course_categories')->get()->toArray();
        return view('livewire.skill.courses.add-courses');
    }
}
