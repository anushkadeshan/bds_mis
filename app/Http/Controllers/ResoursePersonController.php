<?php

namespace App\Http\Controllers;

use App\Models\ResoursePerson;
use Illuminate\Http\Request;

class ResoursePersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('resourse-poeple.index');
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
     * @param  \App\Models\ResoursePerson  $resoursePerson
     * @return \Illuminate\Http\Response
     */
    public function show(ResoursePerson $resoursePerson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResoursePerson  $resoursePerson
     * @return \Illuminate\Http\Response
     */
    public function edit(ResoursePerson $resoursePerson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResoursePerson  $resoursePerson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResoursePerson $resoursePerson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResoursePerson  $resoursePerson
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResoursePerson $resoursePerson)
    {
        //
    }
}
