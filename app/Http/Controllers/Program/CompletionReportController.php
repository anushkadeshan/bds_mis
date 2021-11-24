<?php

namespace App\Http\Controllers\Program;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Program\CompletionReport;

class CompletionReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Program.completion-report');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Program.create-completion-report');
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
     * @param  \App\Models\Program\CompletionReport  $completionReport
     * @return \Illuminate\Http\Response
     */
    public function show(CompletionReport $completionReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program\CompletionReport  $completionReport
     * @return \Illuminate\Http\Response
     */
    public function edit(CompletionReport $completionReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program\CompletionReport  $completionReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompletionReport $completionReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program\CompletionReport  $completionReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompletionReport $completionReport)
    {
        //
    }
}