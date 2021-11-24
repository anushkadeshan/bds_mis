<?php

namespace App\Http\Controllers\Program;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Program\Financial\BudgetType;

class BudgetTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('Program.Budget.budget-types');
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
     * @param  \App\Models\Program\Financial\BudgetType  $budgetType
     * @return \Illuminate\Http\Response
     */
    public function show(BudgetType $budgetType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program\Financial\BudgetType  $budgetType
     * @return \Illuminate\Http\Response
     */
    public function edit(BudgetType $budgetType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program\Financial\BudgetType  $budgetType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BudgetType $budgetType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program\Financial\BudgetType  $budgetType
     * @return \Illuminate\Http\Response
     */
    public function destroy(BudgetType $budgetType)
    {
        //
    }
}
