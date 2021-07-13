<?php

namespace App\Http\Livewire\Bss;
use Auth;
use Livewire\Component;
use App\Models\bss\Student;
use App\Models\bss\ResultOL;

class OlResults extends Component
{

    public $OL_A;
    public $OL_B;
    public $OL_C;
    public $OL_S;
    public $OL_W;
    public $english_result;
    public $science_result;
    public $Maths_Result;
    public $Exam_Year;
    public $Medium;
    public $student_id;
    public $students;
    public $ol_results;
    public $ol_results_available = false;
    public $student_name;

    protected $listeners = ['studentId'];

    protected $rules = [
        'OL_A' => 'required|integer|max:10',
        'OL_B' => 'required|integer|max:10',
        'OL_C' => 'required|integer|max:10',
        'OL_S' => 'required|integer|max:10',
        'OL_W' => 'required|integer|max:10',
        'Maths_Result' => 'required|string|max:1',
        'english_result' => 'required|string|max:1',
        'science_result' => 'required|string|max:1',
        'Exam_Year' => 'required|string|max:11',
        'Medium' => 'required|string|max:40'
    ];

    public function saveData(){
        $this->validate();

        if($this->ol_results_available){
            $ol_results = ResultOL::where('student_id',$this->student_id)->first();
            $ol_results->OL_A = $this->OL_A;
            $ol_results->OL_B = $this->OL_B;
            $ol_results->OL_C = $this->OL_C;
            $ol_results->OL_S = $this->OL_S;
            $ol_results->OL_W = $this->OL_W;
            $ol_results->Maths_Result = $this->Maths_Result;
            $ol_results->english_result = $this->english_result;
            $ol_results->science_result = $this->science_result;
            $ol_results->Exam_Year = $this->Exam_Year;
            $ol_results->Medium = $this->Medium;
            $ol_results->user_id = Auth::user()->id;
            $ol_results->approved = false;
            $ol_results->save();
            session()->flash('message', 'O/L reuslts updated Successfully.');
        }
        else{
            $ol_results = new ResultOL();
            $ol_results->OL_A = $this->OL_A;
            $ol_results->OL_B = $this->OL_B;
            $ol_results->OL_C = $this->OL_C;
            $ol_results->OL_S = $this->OL_S;
            $ol_results->OL_W = $this->OL_W;
            $ol_results->Maths_Result = $this->Maths_Result;
            $ol_results->english_result = $this->english_result;
            $ol_results->science_result = $this->science_result;
            $ol_results->Exam_Year = $this->Exam_Year;
            $ol_results->Medium = $this->Medium;
            $ol_results->student_id = $this->student_id;
            $ol_results->user_id = Auth::user()->id;
            $ol_results->approved = false;
            $ol_results->save();
            session()->flash('message', 'O/L reuslts added Successfully.');

        }
    }

    public function clearForm(){
        $this->ol_results_available = false;
        $this->OL_A = '';
        $this->OL_B = '';
        $this->OL_C = '';
        $this->OL_S = '';
        $this->OL_W = '';
        $this->Maths_Result = '';
        $this->science_result = '';
        $this->english_result = '';
        $this->Exam_Year = '';
        $this->Medium = '';
    }

    public function mount(){
        $students = Student::select('id','name')->where('branch_id',Auth::user()->branch_id)->get();
        $this->students = $students;
        $this->student_id = session('student_id');
        $this->ol_results = [];

        if(!is_null($this->student_id)){
            $this->getData();
        }
    }

    public function getData(){
        $this->clearForm();
        $ol_results = ResultOL::where('student_id',$this->student_id)->first();
        $student = Student::select('name','id')->where('id',$this->student_id)->first();
        //dd($ol_results);
        $this->student_name = $student->name;
        if($ol_results){
            $this->ol_results_available = true;
            $this->OL_A = $ol_results->OL_A;
            $this->OL_B = $ol_results->OL_B;
            $this->OL_C = $ol_results->OL_C;
            $this->OL_S = $ol_results->OL_S;
            $this->OL_W = $ol_results->OL_W;
            $this->Maths_Result = $ol_results->Maths_Result;
            $this->science_result = $ol_results->science_result;
            $this->english_result = $ol_results->english_result;
            $this->Exam_Year = $ol_results->Exam_Year;
            $this->Medium = $ol_results->Medium;
        }

    }

    public function studentId($id)
    {
        $this->student_id= $id;
        $this->getData();
    }

    public function render()
    {
        return view('livewire.bss.ol-results');
    }
}
