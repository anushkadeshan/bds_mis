<?php

namespace App\Http\Controllers\MobileApp;

use App\Http\Controllers\Controller;
use App\Models\Api\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mapper;

class TripController extends Controller
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
            $count =  Trip::query()->leftJoin('users', 'users.id', 'trips.user_id')->where('user_id.',$user->id)
            ->groupBy('trip_id')->count();
        }

        elseif($user->hasRole(['Regional Manager', 'M&E Staff'])){
            $count = Trip::query()->leftJoin('users', 'users.id', 'trips.user_id')->whereIn('users.dsds',json_decode($user->dsds))->groupBy('trip_id')->count();
        }
        else{
            $count = Trip::query()->leftJoin('users', 'users.id', 'trips.user_id')->groupBy('trip_id')->count();
        }
        return view('MobileApp.trips-index',compact('count'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trip= Trip::find($id);

        $tripData = Trip::where('trip_id',$trip->trip_id)->get();
        foreach ($tripData as $key =>$t){
            $location[$key]['latitude'] = $t->latitude;
            $location[$key]['longitude'] = $t->longitude;
        }
        //dd($location);
        Mapper::map($trip->latitude, $trip->longitude,['zoom' => 15])->polyline($location);

        return view('MobileApp.trip-view',compact('trip'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
