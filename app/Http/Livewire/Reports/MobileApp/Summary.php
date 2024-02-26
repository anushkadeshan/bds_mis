<?php

namespace App\Http\Livewire\Reports\MobileApp;

use App\Models\Api\Session;
use DateTime;
use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\Api\Trip;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class Summary extends Component
{
    use WithPagination;
    use LivewireAlert;
    public $startdate;
    public $enddate;
    public $daterange = '';
    public $users = [];
    public $user_id;

    public $total_km;
    public $total_sessions;
    public $session_time;
    public $trip_time;

    public function updatedEnddate(){
        $this->daterange = $this->startdate. ' to '. $this->enddate;
        $subordinates = Auth::user()->subordinates;
        //dd($subordinates);
        if(empty(!$subordinates)){
            //dd($subordinates);
            if(is_null($this->user_id)){
                $trips =Trip::whereBetween('date',[$this->startdate,$this->enddate])
                    ->whereIn('user_id',json_decode($subordinates))
                    ->groupBy('trip_id')
                    ->get();
               // dd($subordinates,$trips);
               $sessions = Session::whereIn('user_id',json_decode($subordinates))->whereBetween('date',[$this->startdate,$this->enddate])->get();
               $this->total_sessions = count($sessions);
            }
            else{
                $trips =Trip::whereBetween('date',[$this->startdate,$this->enddate])
                    ->where('user_id',$this->user_id)
                    ->groupBy('trip_id')
                    ->get();
            $sessions = Session::where('user_id',$this->user_id)->whereBetween('date',[$this->startdate,$this->enddate])->get();
            $this->total_sessions = count($sessions);
            }
        }
        else{
            $trips = [];
            $sessions = [];
        }
        //dd($subordinates);

        $sumTrips = 0;
        $trip_hours = 0;
        $trip_minutes = 0;
        foreach($trips as $t){
            $sumTrips += $t->distance;
            $time1 = new DateTime($t->start_time);
            $time2 = new DateTime($t->end_time);
            $timediff = $time1->diff($time2);
            $trip_hours += $timediff->format('%h');
            $trip_minutes += $timediff->format('%i');
        }
        $this->total_km = round($sumTrips);
        $this->trip_minutes = $trip_hours;
        $this->trip_time = intdiv($trip_minutes, 60).'h '. ($trip_minutes % 60).'m';

        //sum of sessions
        $session_minutes = 0;
        foreach($sessions as $s){
            $time1 = new DateTime($s->start_time);
            $time2 = new DateTime($s->end_time);
            $timediff = $time1->diff($time2);
            $session_minutes += $timediff->format('%i');
        }

        $this->session_time = intdiv($session_minutes, 60).'h '. ($session_minutes % 60).'m';

        if(count($trips)==0 && count($sessions)==0){
            $this->alert('warning', 'No data found for this time range.', [
                'showDenyButton' => true,
                'denyButtonText' => 'Ok',
                'toast' => false,
                'position' => 'center',
                'timer' => null,
            ]);
        }

    }

    public function UpdatedUserId($value){
        $this->user_id = $value;
        $this->mount();
    }

    public function mount(){
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
        $this->updatedEnddate();
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

        $this->daterange = $this->startdate. ' to '. $this->enddate;
        $subordinates = Auth::user()->subordinates;
        //dd($subordinates);
        if(empty(!$subordinates)){
            //dd($subordinates);
            if(is_null($this->user_id)){
                $trips =Trip::with('user')->whereBetween('date',[$this->startdate,$this->enddate])
                    ->whereIn('user_id',json_decode($subordinates))
                    ->groupBy('trip_id')
                    ->paginate(10);
               // dd($subordinates,$trips);
               $sessions = Session::with('user')->whereBetween('date',[$this->startdate,$this->enddate])->whereIn('user_id',json_decode($subordinates))->get();
            }
            else{
                $trips =Trip::with('user')->whereBetween('date',[$this->startdate,$this->enddate])
                    ->where('user_id',$this->user_id)
                    ->groupBy('trip_id')
                ->paginate(10);
            $sessions = Session::with('user')->whereBetween('date',[$this->startdate,$this->enddate])->where('user_id',$this->user_id)->get();
            }
        }
        else{
            $trips = [];
            $sessions = [];
        }

        return view('livewire.reports.mobile-app.summary',['trips'=> $trips, 'sessions'=> $sessions]);
    }
}
