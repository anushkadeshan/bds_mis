<?php

namespace App\Http\Controllers;

use App\Models\MarketingLinkage;
use Illuminate\Http\Request;

class MarketingLinkageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('completion-reports.marketing-linkages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('completion-reports.marketing-linkages.create');
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
     * @param  \App\Models\MarketingLinkage  $marketingLinkage
     * @return \Illuminate\Http\Response
     */
    public function show(MarketingLinkage $marketingLinkage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MarketingLinkage  $marketingLinkage
     * @return \Illuminate\Http\Response
     */
    public function edit(MarketingLinkage $marketingLinkage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MarketingLinkage  $marketingLinkage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MarketingLinkage $marketingLinkage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MarketingLinkage  $marketingLinkage
     * @return \Illuminate\Http\Response
     */
    public function destroy(MarketingLinkage $marketingLinkage)
    {
        //
    }
}
