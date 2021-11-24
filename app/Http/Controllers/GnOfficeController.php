<?php

namespace App\Http\Controllers;

use App\Models\GnOffice;
use App\Models\DsOffice;
use Illuminate\Http\Request;

class GnOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dss = DsOffice::all();
        $count = GnOffice::count();
        // dd($ds_divisions);
        return view('locations.gn',compact('dss','count'));
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
     * @param  \App\Models\GnOffice  $gnOffice
     * @return \Illuminate\Http\Response
     */
    public function show(GnOffice $gnOffice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GnOffice  $gnOffice
     * @return \Illuminate\Http\Response
     */
    public function edit(GnOffice $gnOffice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GnOffice  $gnOffice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GnOffice $gnOffice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GnOffice  $gnOffice
     * @return \Illuminate\Http\Response
     */
    public function destroy(GnOffice $gnOffice)
    {
        //
    }
}
