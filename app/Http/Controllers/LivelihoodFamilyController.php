<?php

namespace App\Http\Controllers;

use App\Models\LivelihoodFamily;
use Illuminate\Http\Request;

class LivelihoodFamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('LiveliHoodFamily.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('LiveliHoodFamily.create');
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
     * @param  \App\Models\LivelihoodFamily  $livelihoodFamily
     * @return \Illuminate\Http\Response
     */
    public function show(LivelihoodFamily $livelihoodFamily)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LivelihoodFamily  $livelihoodFamily
     * @return \Illuminate\Http\Response
     */
    public function edit(LivelihoodFamily $livelihoodFamily)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LivelihoodFamily  $livelihoodFamily
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LivelihoodFamily $livelihoodFamily)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LivelihoodFamily  $livelihoodFamily
     * @return \Illuminate\Http\Response
     */
    public function destroy(LivelihoodFamily $livelihoodFamily)
    {
        //
    }
}
