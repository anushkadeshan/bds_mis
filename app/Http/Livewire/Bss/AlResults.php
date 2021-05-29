<?php

namespace App\Http\Livewire\Bss;

use Auth;
use Livewire\Component;
use App\Models\bss\Student;
use App\Models\bss\ResultAL;

class AlResults extends Component
{
    public $stream;
    public $school;
    public $year;
    public $index_no;
    public $AL_A;
    public $AL_B;
    public $AL_C;
    public $AL_S;
    public $AL_W;
    public $pass_fail;
    public $attempt;
    public $z_score;
    public $district_rank;
    public $island_rank;
    public $student_id;
    public $students;
    public $al_results;
    public $al_results_available = false;
    public $student_name;

    protected $listeners = ['studentId'];

    protected $rules = [
        'stream' => 'required|string|max:50',
        'school' => 'required|string|max:150',
        'year' => 'required|integer',
        'index_no' => 'required|integer',
        'AL_A' => 'required|integer',
        'AL_B' => 'required|integer',
        'AL_C' => 'required|integer',
        'AL_S' => 'required|integer',
        'AL_W' => 'required|integer',
        'pass_fail' => 'nullable|integer',
        'student_id' => 'required',
        'attempt' => 'required|integer',
        'z_score' => 'required|string|max:10',
        'district_rank' => 'required|integer',
        'island_rank' => 'required|integer',
    ];
    public function saveData(){
        $this->validate();

        if($this->al_results_available){
            $al = ResultAL::where('student_id',$this->student_id)->first();
            $al->stream = $this->stream;
            $al->school = $this->school;
            $al->year = $this->year;
            $al->index_no = $this->index_no;
            $al->AL_A = $this->AL_A;
            $al->AL_B = $this->AL_B;
            $al->AL_C = $this->AL_C;
            $al->AL_S = $this->AL_S;
            $al->AL_W = $this->AL_W;
            $al->pass_fail = $this->pass_fail;
            $al->attempt = $this->attempt;
            $al->z_score = $this->z_score;
            $al->district_rank = $this->district_rank;
            $al->island_rank = $this->island_rank;
            $al->user_id = Auth::user()->id;
            $al->save();
            session()->flash('message', 'A/L reuslts updated Successfully.');
        }
        else{
            $data = ResultAL::create([
                'stream' => $this->stream,
                'school' => $this->school,
                'year' => $this->year,
                'index_no' => $this->index_no,
                'AL_A' => $this->AL_A,
                'AL_B' => $this->AL_B,
                'AL_C' => $this->AL_C,
                'AL_S' => $this->AL_S,
                'AL_W' => $this->AL_W,
                'pass_fail' => $this->pass_fail,
                'student_id' => $this->student_id,
                'attempt' => $this->attempt,
                'z_score' => $this->z_score,
                'district_rank' => $this->district_rank,
                'island_rank' => $this->island_rank,
                'user_id' => Auth::user()->id
            ]);
            session()->flash('message', 'A/L reuslts added Successfully.');
        }
    }

    public function clearForm(){
        $this->al_results_available = false;
        $this->stream = '';
        $this->stream = '';
        $this->school = '';
        $this->year = '';
        $this->index_no = '';
        $this->AL_A = '';
        $this->AL_B = '';
        $this->AL_C = '';
        $this->AL_S = '';
        $this->AL_W = '';
        $this->pass_fail = '';
        $this->attempt = '';
        $this->z_score = '';
        $this->district_rank = '';
        $this->island_rank = '';
    }
    public function mount(){
        $students = Student::select('id','name')->where('branch_id',Auth::user()->branch_id)->get();
        $this->students = $students;
        $this->student_id = session('student_id');
        $this->al_results = [];

        if(!is_null($this->student_id)){
            $this->getData();
        }
    }

    public function getData(){
        $this->clearForm();
        $al_results = ResultAL::where('student_id',$this->student_id)->first();
        $student = Student::select('name','id')->where('id',$this->student_id)->first();
        //dd($student,$this->student_id,session('student_id'));
        $this->student_name = $student->name;
        if($al_results){
            $this->al_results_available = true;
            $this->stream = $al_results->stream;
            $this->stream = $al_results->stream;
            $this->school = $al_results->school;
            $this->year = $al_results->year;
            $this->index_no = $al_results->index_no;
            $this->AL_A = $al_results->AL_A;
            $this->AL_B = $al_results->AL_B;
            $this->AL_C = $al_results->AL_C;
            $this->AL_S = $al_results->AL_S;
            $this->AL_W = $al_results->AL_W;
            $this->pass_fail = $al_results->pass_fail;
            $this->student_id = $al_results->student_id;
            $this->attempt = $al_results->attempt;
            $this->z_score = $al_results->z_score;
            $this->district_rank = $al_results->district_rank;
            $this->island_rank = $al_results->island_rank;
        }

    }

    public function studentId($id)
    {
        $this->student_id= $id;
        $this->getData();
    }

    public function render()
    {
        return view('livewire.bss.al-results');
    }
}
