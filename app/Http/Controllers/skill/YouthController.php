<?php

namespace App\Http\Controllers\skill;

use App\Models\skill\Youth;
use Illuminate\Http\Request;
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
     * @param  \App\Models\skill\Youth  $youth
     * @return \Illuminate\Http\Response
     */
    public function show(Youth $youth)
    {
        //
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
}
