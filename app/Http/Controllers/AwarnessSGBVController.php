<?php

namespace App\Http\Controllers;

use App\Models\AwarnessSGBV;
use Illuminate\Http\Request;

class AwarnessSGBVController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('completion-reports.sgbv.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('completion-reports.sgbv.create');
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
     * @param  \App\Models\AwarnessSGBV  $awarnessSGBV
     * @return \Illuminate\Http\Response
     */
    public function show(AwarnessSGBV $awarnessSGBV)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AwarnessSGBV  $awarnessSGBV
     * @return \Illuminate\Http\Response
     */
    public function edit(AwarnessSGBV $awarnessSGBV)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AwarnessSGBV  $awarnessSGBV
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AwarnessSGBV $awarnessSGBV)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AwarnessSGBV  $awarnessSGBV
     * @return \Illuminate\Http\Response
     */
    public function destroy(AwarnessSGBV $awarnessSGBV)
    {
        //
    }
}
