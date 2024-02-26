<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function myActivities(){
        $userModel = auth()->user();
        $activities = Activity::causedBy($userModel)->get();
        //dd($activities);
        return view('Logs.personal', compact('activities'));
    }

    public function myActivitiesList(){
        $userModel = auth()->user();
        $activities = Activity::causedBy($userModel)->get();
        //dd($activities);
        return view('Logs.personal', compact('activities'));
    }
}
