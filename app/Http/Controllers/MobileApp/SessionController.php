<?php

namespace App\Http\Controllers\MobileApp;

use GoogleMaps\GoogleMaps;
use App\Models\Api\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Mapper;

class SessionController extends Controller
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
            $count =  Session::query()->leftJoin('users', 'users.id', 'field_sessions.user_id')->where('user_id.',$user->id)->count();
        }

        elseif($user->hasRole(['Regional Manager', 'M&E Staff'])){
            $count = Session::query()->leftJoin('users', 'users.id', 'field_sessions.user_id')->whereIn('users.dsds',json_decode($user->dsds))->count();
        }
        else{
            $count = Session::query()->leftJoin('users', 'users.id', 'field_sessions.user_id')->count();
        }
        return view('MobileApp.index',compact('count'));
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
        $session = Session::find($id);
        Mapper::map($session->start_lat, $session->start_long, ['zoom' => 15,  'markers' =>  ['icon' => ['url' => 'https://chart.googleapis.com/chart?chst=d_map_pin_letter&chld=|FE6256|000000', 'scale' => 100], 'animation' => 'DROP', 'label' => $session->client, 'title' => $session->client,'zoom' =>10]]);
        return view('MobileApp.view',compact('session'));
    }

    /**
     * Show the form for creating a new resource.


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
