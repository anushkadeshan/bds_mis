<?php

namespace App\Http\Controllers;

use App\Models\ImproveLivilyhood;
use Illuminate\Http\Request;

class ImproveLivilyhoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('completion-reports.livelihood.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('completion-reports.livelihood.create');
        
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
     * @param  \App\Models\ImproveLivilyhood  $improveLivilyhood
     * @return \Illuminate\Http\Response
     */
    public function show(ImproveLivilyhood $improveLivilyhood)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ImproveLivilyhood  $improveLivilyhood
     * @return \Illuminate\Http\Response
     */
    public function edit(ImproveLivilyhood $improveLivilyhood)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ImproveLivilyhood  $improveLivilyhood
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImproveLivilyhood $improveLivilyhood)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImproveLivilyhood  $improveLivilyhood
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImproveLivilyhood $improveLivilyhood)
    {
        //
    }
}
