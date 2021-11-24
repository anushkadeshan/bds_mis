<?php

namespace App\Http\Controllers\bss;

use Auth;
use App\Models\User;
use App\Models\bss\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->hasRole(['Community Development coordinator', 'Youth Development coordinator'])){
            $count = Student::join('payment_details', 'payment_details.student_id', 'students.id')->where('branch_id',Auth::user()->branch_id)->where('payment_details.p_status',1)->count();
        }
        elseif($user->hasRole(['Regional Manager', 'M&E Staff'])){
            $count = Student::join('payment_details', 'payment_details.student_id', 'students.id')->whereIn('branch_id',json_decode(Auth::user()->branches))->where('payment_details.p_status',1)->count();
        }
        else{
            $count = Student::join('payment_details', 'payment_details.student_id', 'students.id')->where('payment_details.p_status',1)->count();
        }
        return view('bss.application.index',compact('count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bss.application.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ol()
    {
        return view('bss.application.ol');
    }

    public function al()
    {
        return view('bss.application.al');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bss\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::with(['branch','dsd','gn','payment','OlResult','AlResult'])->where('id',$id)->first();

        return view('bss.application.profile',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bss\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function editStudent()
    {
        return view('bss.application.edit');
    }

    public function edit($id)
    {

        return view('bss.application.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bss\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bss\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
