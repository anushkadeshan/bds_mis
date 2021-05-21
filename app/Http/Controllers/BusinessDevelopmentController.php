<?php

namespace App\Http\Controllers;

use App\Models\BusinessDevelopment;
use Illuminate\Http\Request;

class BusinessDevelopmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('completion-reports.business-development.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('completion-reports.business-development.create');
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
     * @param  \App\Models\BusinessDevelopment  $businessDevelopment
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessDevelopment $businessDevelopment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BusinessDevelopment  $businessDevelopment
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessDevelopment $businessDevelopment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BusinessDevelopment  $businessDevelopment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessDevelopment $businessDevelopment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BusinessDevelopment  $businessDevelopment
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessDevelopment $businessDevelopment)
    {
        //
    }
}
