<?php

namespace App\Http\Controllers\Api;

use Throwable;
use Carbon\Carbon;
use App\Models\Api\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $trips = Trip::where('user_id',auth()->user()->id)
                ->select('trips.*', DB::raw('DATE(`date`) as date'))
                ->groupBy('trip_id')
                ->latest()
                ->get();

                return response($trips,201);
        }
        catch(\Exception  $e){
            return response([
                'success' => false,
                'message' => $e,
            ],402);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        $request->request->add(['user_id' => auth()->user()->id]); //add request

        try{
            $data = Trip::create($request->all());
            if($data){
                return response([
                    'success' => true,
                    'message' => 'Field Trip Data Added Successfully',
                ],200);
            }
            else{
                return response([
                    'success' => false,
                    'message' => 'Something Error',
                ],402);

            }
        }
        catch(\Exception  $e){
            return response([
                'success' => false,
                'message' => $e,
            ],402);
        }


    }

    public function TripData(){
        try{
            $tripsThisWeek =Trip::where('date', '>', Carbon::now()->startOfWeek())
                ->where('date', '<', Carbon::now()->endOfWeek())
                ->where('user_id',auth()->user()->id)
                //->select(DB::raw('SUM(distance) as distance'))
                ->groupBy('trip_id')
                ->get();

            $sumTripsThisWeek = 0;
            foreach($tripsThisWeek as $t){
                $sumTripsThisWeek += $t->distance;
            }

            $tripsThisMonth =  Trip:: where('user_id',auth()->user()->id)
                ->whereMonth('date', Carbon::now()->month)
                ->groupBy('trip_id')->get();

            $sumtripsThisMonth = 0;
            foreach($tripsThisMonth as $t){
                $sumtripsThisMonth += $t->distance;
            }
            $tripsThisYear =  Trip::where('user_id',auth()->user()->id)->whereYear('date', Carbon::now()->year)
                ->groupBy('trip_id')
                ->get();

            $sumtripsThisYear = 0;

            foreach($tripsThisYear as $t){
                $sumtripsThisYear += $t->distance;
            }

            $tripTotal =  Trip::where('user_id',auth()->user()->id)->distinct('trip_id')->count();


            return response([
                'success' => true,
                'message' => 'Data recieved',
                'tripsThisWeek' => round($sumTripsThisWeek,2),
                'tripsThisMonth' => round($sumtripsThisMonth,2),
                'tripsThisYear' => round($sumtripsThisYear,2),
                'tripTotal' => $tripTotal,
            ],201);
        }

        catch(\Exception  $e){
            return response([
                'success' => false,
                'message' => $e,
            ],402);
        }

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
     * @param  \App\Models\Api\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        try{
            $trips = Trip::where('user_id',auth()->user()->id)
                ->select('trips.*', DB::raw('DATE(`date`) as date'))
                ->where('trip_id',$request->trip_id)
                ->get();

                return response($trips,201);
        }
        catch(\Exception  $e){
            return response([
                'success' => false,
                'message' => $e,
            ],402);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Api\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function edit(Trip $trip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Api\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trip $trip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Api\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trip $trip)
    {
        //
    }
}
