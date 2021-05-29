<?php

namespace App\Http\Controllers;

use App\Models\IdeaGeneration;
use Illuminate\Http\Request;

class IdeaGenerationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('completion-reports.idea-generation.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('completion-reports.idea-generation.create');
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
     * @param  \App\Models\IdeaGeneration  $ideaGeneration
     * @return \Illuminate\Http\Response
     */
    public function show(IdeaGeneration $ideaGeneration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IdeaGeneration  $ideaGeneration
     * @return \Illuminate\Http\Response
     */
    public function edit(IdeaGeneration $ideaGeneration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IdeaGeneration  $ideaGeneration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IdeaGeneration $ideaGeneration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IdeaGeneration  $ideaGeneration
     * @return \Illuminate\Http\Response
     */
    public function destroy(IdeaGeneration $ideaGeneration)
    {
        //
    }
}
