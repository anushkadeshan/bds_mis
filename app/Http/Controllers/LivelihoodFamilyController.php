<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EconomicCrisis;
use App\Models\LivelihoodFamily;
use Illuminate\Support\Facades\Auth;

class LivelihoodFamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->hasRole(['Community Development coordinator', 'Youth Development coordinator'])){
            $gnds = Auth::user()->gnds;
            $count = LivelihoodFamily::whereIn('gn_id',json_decode($gnds))->count();
        }
        elseif($user->hasRole(['Regional Manager', 'M&E Staff', 'District Represetnative'])){
            $gnds = Auth::user()->gnds;
            $count = LivelihoodFamily::whereIn('gn_id',json_decode($gnds))->count();
        }
        else{
            $count = LivelihoodFamily::count();
        }

        return view('LiveliHoodFamily.index',compact('count'));
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
    public function money_orders()
    {
        $count = LivelihoodFamily::whereNotNull('money_order_giving_photo')->count();
        return view('LiveliHoodFamily.money-orders',compact('count'));
    }

    public function economic_crisis()
    {
        $count = EconomicCrisis::whereNotNull('money_order_scanned_copy')->count();
        return view('LiveliHoodFamily.economic-crisis-table',compact('count'));
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
