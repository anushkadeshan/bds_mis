<?php

namespace App\Http\Livewire\Skill\Youths;

use Livewire\Component;
use App\Models\bss\Student;
use App\Models\skill\BusinessYouth;
use App\Models\skill\CommonYouth;
use App\Models\skill\CourseYouth;
use App\Models\skill\EductionYouth;
use App\Models\skill\Family;
use App\Models\skill\JobsIntresting;
use App\Models\skill\JobsYouth;
use App\Models\skill\LanguageYouth;
use App\Models\skill\Youth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreateYouth extends Component
{
    public $step1 = false;
    public $step2 = false;
    public $step3 = false;
    public $step4 = false;
    public $step5 = false;
    public $families;
    public $students;
    public $course_categories;
    public $courses;
    public $youth_id;

    //students
    public $name;
    public $cg;
    public $vt;
    public $prof;
    public $soft_skills;
    public $job;
    public $full_name;
    public $gender;
    public $nic;
    public $phone;
    public $email;
    public $birth_date;
    public $driving_licence;
    public $maritial_status;
    public $nationality;
    public $disability;
    public $reason;
    public $highest_qualification;
    public $family_id;
    public $added_by;
    public $bss;
    public $bss_id;
    public $branch_id;
    public $is_application_completed;

    //education
    public $ol_year;
    public $ol_attempt;
    public $ol_pass_or_fail;
    public $al_year;
    public $al_attempt;
    public $al_pass_or_fail;
    public $stream;
    public $degree;
    public $pass_out_year;
    public $medium;
    public $grade;
    public $university;
    public $other_professional_qualifications;

    //language
    public $reading_tamil = false;
    public $reading_sinhala = false;
    public $reading_english = false;
    public $writing_tamil = false;
    public $writing_sinhala = false;
    public $writing_english = false;
    public $speaking_tamil = false;
    public $speaking_sinhala = false;
    public $speaking_english = false;

    //followed courses
    public $course_id;
    public $status;
    public $provided_by_bec;
    public $completed_at;

    //current status
    public $current_status;

    //permanat job
    public $title;
    public $employer_name;
    public $provided_by;
    public $nature_job;
    public $career_plan;
    public $step_forward;
    public $description;

    //intresting job
    public $industry = [""];
    public $location = [""];
    public $profession_adequate;
    public $plan_to_meet_qualifications;
    public $details;
    public $experience;
    public $min_salary;
    public $intresting_courses = [""];

    //intresting business
    public $intresting_business;
    public $need_help;
    public $type_of_help;

    //common details
    public $bank_account;
    public $smart_phone;
    public $training;
    public $when;

    //following courses
    public $following_course_id;
    public $following_provided_by_bec;
    public $following_completed_at;

    //self employed
    public $business_title;

    public function savePersonal(){
        $this->validate([
            'name' => 'required',
            'bss' => 'required',
            'full_name' => 'required|unique:youths',
            'gender' => 'required',
            'phone' => 'required',
            'nic' => 'required|unique:youths',
            'birth_date' => 'required',
            'maritial_status' => 'required',
            'nationality' => 'required',
            'family_id' => 'required',
            'highest_qualification' => 'required',
        ]);

        $youth = Youth::create([
           'name' => $this->name,
           'full_name' => $this->full_name,
           'gender' => $this->gender,
           'nic' => $this->nic,
           'phone' => $this->phone,
           'email' => $this->email,
           'birth_date' => $this->birth_date,
           'driving_licence' => $this->driving_licence,
           'maritial_status' => $this->maritial_status,
           'nationality' => $this->nationality,
           'disability' => $this->disability,
           'reason' => $this->reason,
           'highest_qualification' => $this->highest_qualification,
           'family_id' => $this->family_id,
           'added_by' => auth()->user()->id,
           'bss' => $this->bss,
           'bss_id' => $this->bss_id,
           'branch_id' => auth()->user()->branch_id,
           'is_application_complete' => false,
           'approved' => false,
        ]);

        $this->youth_id = $youth->id;
        session(['youth_id'=>$youth->id]);
        $this->step1 = true;
        session()->flash('message', 'Busienss Development Program Created Successfully.');
    }

    public function saveEducation(){

        $education = EductionYouth::updateOrCreate(
            ['youth_id',session('youth_id')],
            [
                'ol_year' => $this->ol_year,
                'ol_attempt' => $this->ol_attempt,
                'ol_pass_or_fail' => $this->ol_pass_or_fail,
                'al_year' => $this->al_year,
                'al_attempt' => $this->al_attempt,
                'al_pass_or_fail' => $this->al_pass_or_fail,
                'stream' => $this->stream,
                'degree' => $this->degree,
                'pass_out_year' => $this->pass_out_year,
                'medium' => $this->medium,
                'grade' => $this->grade,
                'university' => $this->university,
                'other_professional_qualifications' => $this->other_professional_qualifications,
                'youth_id' => session('youth_id'),
                'added_by' => auth()->user()->id
            ]

        );

        session()->flash('message', 'Youth Education Details Created Successfully.');
        $this->step2 = true;

    }

    public function saveLanguage(){

        $language  = LanguageYouth::updateOrCreate(
            ['youth_id' => session('youth_id')],
            [
                'reading_tamil' => $this->reading_tamil,
                'reading_sinhala' => $this->reading_sinhala,
                'reading_english' => $this->reading_english,
                'writing_tamil' => $this->writing_tamil,
                'writing_sinhala' => $this->writing_sinhala,
                'writing_english' => $this->writing_english,
                'speaking_tamil' => $this->speaking_tamil,
                'speaking_sinhala' => $this->speaking_sinhala,
                'speaking_english' => $this->speaking_english,
                'youth_id' => session('youth_id'),
            ]

        );

        session()->flash('message', 'Youth Language Proficiency Deatails Created Successfully.');
        $this->step3 = true;

    }

    public function saveCourse(){
        $course = CourseYouth::updateOrCreate(
            [
                'youth_id'=> session('youth_id'),
                'course_id' =>$this->course_id
            ],
            [
                'course_id' =>$this->course_id,
                'status' =>'Followed',
                'provided_by_bec' =>$this->provided_by_bec,
                'completed_at' =>$this->completed_at,
                'youth_id' => session('youth_id')
            ]

        );

        session()->flash('message', 'Youth Followed Courses Deatails Created Successfully.');
        $this->step4 = true;

    }

    public function saveFinalJob(){

        $permenet_job = JobsYouth::updateOrCreate(
            [
                'youth_id' => session('youth_id')
            ],
            [
                'title' => $this->title,
                'employer_name' => $this->employer_name,
                'provided_by' => $this->provided_by,
                'nature_job' => 'Permanat Job',
                'career_plan' => $this->career_plan,
                'step_forward' => $this->step_forward,
                'description' => $this->description,
                'youth_id' => session('youth_id')
            ]
        );

        $youth = Youth::find(session('youth_id'));
        $youth->current_status = $this->current_status;
        $youth->is_application_completed = 1;
        $youth->save();

        session()->flash('message', 'Base Line Application successfully created.');
        $this->step5 = true;
    }

    public function saveTemporyJob(){
        JobsIntresting::updateOrCreate(
            [
                'youth_id' => session('youth_id')
            ],
            [
                'industry' => $this->industry,
                'location' => $this->location,
                'experience' => $this->experience,
                'min_salary' => $this->min_salary,
                'intresting_courses' => $this->intresting_courses,
                'youth_id' => session('youth_id')
            ]
        );

        BusinessYouth::updateOrCreate(
            [
                'youth_id' => session('youth_id'),
            ],
            [
                'intresting_business' =>$this->intresting_business,
                'need_help' =>$this->need_help,
                'type_of_help' =>$this->type_of_help,
                'youth_id' => session('youth_id')
            ]
        );

        CommonYouth::updateOrCreate(
            [
                'youth_id' => session('youth_id')
            ],
            [
                'bank_account' => $this->bank_account,
                'smart_phone' => $this->smart_phone,
                'training' => $this->training,
                'when' => $this->when,
                'youth_id' => session('youth_id')
            ]
        );

        $youth = Youth::find(session('youth_id'));
        $youth->current_status = $this->current_status;
        $youth->is_application_completed = 1;
        $youth->save();

        session()->flash('message', 'Base Line Application successfully created.');
        $this->step5 = true;
    }

    public function saveCourseFollowing(){
        JobsIntresting::updateOrCreate(
            [
                'youth_id' => session('youth_id')
            ],
            [
                'industry' => $this->industry,
                'location' => $this->location,
                'experience' => $this->experience,
                'min_salary' => $this->min_salary,
                'profession_adequate' => $this->profession_adequate,
                'plan_to_meet_qualifications' => $this->plan_to_meet_qualifications,
                'details' => $this->details,
                'intresting_courses' => $this->intresting_courses,
                'youth_id' => session('youth_id')
            ]
        );

        BusinessYouth::updateOrCreate(
            [
                'youth_id' => session('youth_id'),
            ],
            [
                'intresting_business' =>$this->intresting_business,
                'need_help' =>$this->need_help,
                'type_of_help' =>$this->type_of_help,
                'youth_id' => session('youth_id')
            ]
        );

        CommonYouth::updateOrCreate(
            [
                'youth_id' => session('youth_id')
            ],
            [
                'bank_account' => $this->bank_account,
                'smart_phone' => $this->smart_phone,
                'training' => $this->training,
                'when' => $this->when,
                'youth_id' => session('youth_id')
            ]
        );

        $course = CourseYouth::updateOrCreate(
            [
                'youth_id'=> session('youth_id'),
                'course_id' =>$this->following_course_id
            ],
            [
                'course_id' =>$this->following_course_id,
                'status' =>'Following',
                'provided_by_bec' =>$this->following_provided_by_bec,
                'completed_at' =>$this->following_completed_at,
                'youth_id' => session('youth_id')
            ]

        );
        $youth = Youth::find(session('youth_id'));
        $youth->current_status = $this->current_status;
        $youth->is_application_completed = 1;
        $youth->save();

        session()->flash('message', 'Base Line Application successfully created.');
        $this->step5 = true;
    }

    public function saveSelfJob(){
        $self = JobsYouth::updateOrCreate(
            [
                'youth_id' => session('youth_id')
            ],
            [
                'title' => $this->business_title,
                'nature_job' => 'Self Employed',
                'youth_id' => session('youth_id'),
            ]
        );

        CommonYouth::updateOrCreate(
            [
                'youth_id' => session('youth_id')
            ],
            [
                'bank_account' => $this->bank_account,
                'smart_phone' => $this->smart_phone,
                'training' => $this->training,
                'when' => $this->when,
                'youth_id' => session('youth_id')
            ]
        );

        $youth = Youth::find(session('youth_id'));
        $youth->current_status = $this->current_status;
        $youth->is_application_completed = 1;
        $youth->save();

        session()->flash('message', 'Base Line Application successfully created.');
        $this->step5 = true;
    }

    public function mount(){
        $this->course_categories = DB::table('course_categories')->get()->toArray();
        $this->courses = DB::table('courses')->select('id','name')->get()->toArray();
    }

    public function render()
    {
        return view('livewire.skill.youths.create-youth');
    }
}
