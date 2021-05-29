<?php

namespace App\Http\Controllers;

use App\Models\DsOffice;
use Illuminate\Http\Request;

class DsOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('locations.dsd');
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
     * @param  \App\Models\DsOffice  $dsOffice
     * @return \Illuminate\Http\Response
     */
    public function show(DsOffice $dsOffice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DsOffice  $dsOffice
     * @return \Illuminate\Http\Response
     */
    public function edit(DsOffice $dsOffice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DsOffice  $dsOffice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DsOffice $dsOffice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DsOffice  $dsOffice
     * @return \Illuminate\Http\Response
     */
    public function destroy(DsOffice $dsOffice)
    {
        //
    }
}
