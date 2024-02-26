<?php

namespace App\Http\Livewire\Skill\Courses;

use DB;
use Livewire\Component;
use App\Models\skill\Course;

class EditCourses extends Component
{
    public $course;
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
    public $course_id;

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
        $course = Course::find($this->course_id);
        $course->name = $this->name;
        $course->duration = $this->duration;
        $course->course_fee = $this->course_fee;
        $course->course_type = $this->course_type;
        $course->course_catogery = $this->course_catogery;
        $course->standard = $this->standard;
        $course->course_time = $this->course_time;
        $course->medium = json_encode($this->medium);
        $course->min_qualification = $this->min_qualification;
        $course->embeded_softs_skills = $this->embeded_softs_skills;
        $course->approved = false;
        $course->save();


        session()->flash('message', 'Course updated Successfully.');
    }

    public function mount($course){
        $this->course = $course;
        $this->course_id = $course['id'];
        $this->name = $course['name'];
        $this->duration = $course['duration'];
        $this->course_fee = $course['course_fee'];
        $this->course_type = $course['course_type'];
        $this->course_catogery = $course['course_catogery'];
        $this->standard = $course['standard'];
        $this->course_time = $course['course_time'];
        $this->min_qualification = $course['min_qualification'];
        $this->embeded_softs_skills = $course['embeded_softs_skills'];
        $this->medium = json_decode($course['medium']);

    }

    public function render()
    {
        $this->course_categories = DB::table('course_categories')->get()->toArray();
        return view('livewire.skill.courses.edit-courses');
    }
}
