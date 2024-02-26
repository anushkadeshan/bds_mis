<?php

namespace App\Http\Controllers\LogFrame;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Logframe\PreCondition;

class PreConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('log-frame.pre-conditions-table');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Logframe\PreCondition  $preCondition
     * @return \Illuminate\Http\Response
     */
    public function show(PreCondition $preCondition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Logframe\PreCondition  $preCondition
     * @return \Illuminate\Http\Response
     */
    public function edit(PreCondition $preCondition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Logframe\PreCondition  $preCondition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PreCondition $preCondition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Logframe\PreCondition  $preCondition
     * @return \Illuminate\Http\Response
     */
    public function destroy(PreCondition $preCondition)
    {
        //
    }
}
