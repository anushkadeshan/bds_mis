<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class ActivityController extends Controller
{
    public function index(){
        return view('Logs.index');
    }

    public function edit($id){
        $activity = Activity::with('causer')->where('id',$id)->first();
        return view('Logs.edit', compact('activity'));
    }
}
