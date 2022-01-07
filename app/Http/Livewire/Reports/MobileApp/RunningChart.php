<?php

namespace App\Http\Livewire\Reports\MobileApp;

use App\Models\User;
use Livewire\Component;
use App\Models\Api\Trip;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RunningChart extends Component
{
    public $startdate;
    public $enddate;
    public $trips = [];
    public $user_id;
    public $users;
    public $daterange = '';
    public $is_boarded = false;

    public function updatedEnddate(){
        $this->daterange = $this->startdate. ' to '. $this->enddate;
        $this->trips = Trip::groupBy('date')
            ->whereBetween('date',[$this->startdate,$this->enddate])
            ->where('user_id',$this->user_id)
            ->groupBy('date')->get();
    }

    public function UpdatedUserId($value){
        //dd($value);
        $this->user_id = $value;
        $this->trips = Trip::groupBy('date')
            ->whereBetween('date',[$this->startdate,$this->enddate])
            ->where('user_id',$this->user_id)
            ->groupBy('date')->get();
        $user = User::find($this->user_id);
        $this->is_boarded = $user->is_boarded;
        //dd($this->is_boarded);
    }

    public function mount(){
        $user = Auth::user();
        if($user->hasRole(['Community Development coordinator', 'Youth Development coordinator'])){
            $this->users =User::where('id',$user->id)->get();
            $this->user_id = $user->id;
            $this->UpdatedUserId($this->user_id);
            $this->user = $user;
        }
        elseif($user->hasRole(['Regional Manager', 'M&E Staff', 'District Represetnative'])){
            $gnds = auth()->user()->gnds;
            $users = DB::table('users')->where(function ($query) use ($gnds) {
                foreach (json_decode($gnds) as $id) {
                    $query->orWhereJsonContains('gnds', $id);
                }
             })->where('id', '!=',1)->get();

             $this->users = $users;
        }
        else{
            $this->users = User::get();
        }
        //dd($this->users);
       // $users = Users::
    }

    function getDistanceBetweenPoints($latitude1, $longitude1, $latitude2, $longitude2, $unit = 'miles') {
        $theta = $longitude1 - $longitude2;
        $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta)));
        $distance = acos($distance);
        $distance = rad2deg($distance);
        $distance = $distance * 60 * 1.1515;
        switch($unit) {
          case 'miles':
            break;
          case 'kilometers' :
            $distance = $distance * 1.609344;
        }
        return (round($distance,2));
    }

    public function render()
    {
        $user = Auth::user();
        if($user->hasRole(['Community Development coordinator', 'Youth Development coordinator'])){
            $this->users =User::where('id',$user->id)->get();
            $this->user_id = $user->id;
        }
        elseif($user->hasRole(['Regional Manager', 'M&E Staff', 'District Represetnative'])){
            $gnds = auth()->user()->gnds;
            $users = DB::table('users')->where(function ($query) use ($gnds) {
                foreach (json_decode($gnds) as $id) {
                    $query->orWhereJsonContains('gnds', $id);
                }
             })->where('id', '!=',1)->get();

             $this->users = $users;
        }
        else{
            $this->users = User::get();
        }
        return view('livewire.reports.mobile-app.running-chart');
    }
}
