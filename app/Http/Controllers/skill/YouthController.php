<?php

namespace App\Http\Controllers\skill;

use App\Models\skill\Youth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class YouthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('skill-development.youths.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('skill-development.youths.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\skill\Youth  $youth
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $youth = Youth::with('family','education','branch','courses','intrstingjobs','languages','business')->where('id',$id)->first();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\skill\Youth  $youth
     * @return \Illuminate\Http\Response
     */
    public function edit(Youth $youth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\skill\Youth  $youth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Youth $youth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\skill\Youth  $youth
     * @return \Illuminate\Http\Response
     */
    public function destroy(Youth $youth)
    {
        //
    }

    public function familyList(Request $request)
    {
        $branch_id = auth()->user()->branch;

        if ($request->get('query')) {
            $query = $request->get('query');
            $data = DB::table('families')
                ->select('head_of_household','id','nic_head_of_household')
                ->where('head_of_household', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="bg-white border border-gray-100 w-full mt-2" id="family">';
            foreach ($data as $row) {
                $output .= '
         <li class="pl-8 pr-2 py-1 border-b-2 border-gray-100 relative cursor-pointer hover:bg-yellow-50 hover:text-gray-900" id="' . $row->id . '"><a href="#" >' . $row->head_of_household . ' (' . $row->nic_head_of_household . ')</a></li>
         ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    public function bssList(Request $request)
    {
        $branch_id = auth()->user()->branch;

        if ($request->get('query')) {
            $query = $request->get('query');
            $data = DB::table('students')
                ->select('name','id','nic')
                ->where('name', 'LIKE', "%{$query}%")
                ->where('branch_id', $branch_id)
                ->get();
            $output = '<ul class="bg-white border border-gray-100 w-full mt-2" id="student">';
            foreach ($data as $row) {
                $output .= '
         <li class="pl-8 pr-2 py-1 border-b-2 border-gray-100 relative cursor-pointer hover:bg-yellow-50 hover:text-gray-900" id="' . $row->id . '"><a href="#" >' . $row->name . ' (' . $row->nic . ')</a></li>
         ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    public function courseList(Request $request)
    {
        $branch_id = auth()->user()->branch;

        if ($request->get('query')) {
            $query = $request->get('query');
            $data = DB::table('courses')
                ->select('name','id')
                ->where('name', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="bg-white border border-gray-100 w-full mt-2" id="followed">';
            foreach ($data as $row) {
                $output .= '
         <li class="pl-8 pr-2 py-1 border-b-2 border-gray-100 relative cursor-pointer hover:bg-yellow-50 hover:text-gray-900" id="' . $row->id . '"><a href="#" >' . $row->name . ' </a></li>
         ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    public function courseList1(Request $request)
    {
        $branch_id = auth()->user()->branch;

        if ($request->get('query')) {
            $query = $request->get('query');
            $data = DB::table('courses')
                ->select('name','id')
                ->where('name', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="bg-white border border-gray-100 w-full mt-2" id="following">';
            foreach ($data as $row) {
                $output .= '
         <li class="pl-8 pr-2 py-1 border-b-2 border-gray-100 relative cursor-pointer hover:bg-yellow-50 hover:text-gray-900" id="' . $row->id . '"><a href="#" >' . $row->name . ' </a></li>
         ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
}
