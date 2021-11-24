<?php

namespace App\Http\Controllers\Api;

use Throwable;
use Carbon\Carbon;
use App\Models\Api\Trip;
use App\Models\Api\Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SessionController extends Controller
{
    public function index()
    {
        try{
            $sessions = Session::where('user_id',auth()->user()->id)
                ->select('field_sessions.*', DB::raw('DATE(`date`) as date'))
                ->get();

                return response($sessions,201);
        }
        catch(\Exception  $e){
            return response([
                'success' => false,
                'message' => $e,
            ],402);
        }
    }

    public function create(Request $request){
        $request->request->add(['user_id' => auth()->user()->id]); //add request

        try{
            $data = Session::create($request->all());
            if($data){
                return response([
                    'success' => true,
                    'message' => 'Session Added Successfully',
                ],201);
            }
            else{
                return response([
                    'success' => false,
                    'message' => 'Something Error',
                ],402);

            }
        }
        catch(Throwable $e){
            return response([
                'success' => false,
                'message' => $e,
            ],402);
        }

    }

    public function SessionCounts() {
        try{
            $SessionThisWeek =  Session::where('date', '>', Carbon::now()->startOfWeek())
            ->where('date', '<', Carbon::now()->endOfWeek())
            ->where('user_id',auth()->user()->id)
            ->count();

            $SessionThisMonth =  Session::whereMonth('date', Carbon::now()->month)
            ->where('user_id',auth()->user()->id)
            ->count();

            $SessionThisYear =  Session::whereYear('date', Carbon::now()->year)
            ->where('user_id',auth()->user()->id)
            ->count();

            $SessionsTotal =  Session::where('user_id',auth()->user()->id)->count();
            return response([
                'success' => true,
                'message' => 'Data recieved',
                'SessionThisWeek' => $SessionThisWeek,
                'SessionThisMonth' => $SessionThisMonth,
                'SessionThisYear' => $SessionThisYear,
                'SessionsTotal' => $SessionsTotal,
            ],201);
        }
        catch(\Exception  $e){
            return response([
                'success' => false,
                'message' => $e,
            ],402);
        }

    }

    public function update(Request $request){
        try{
            Session::where('id',$request->id)->update(['description'=> $request->description]);
            return response([
                'success' => true,
                'message' => 'Updated Successfully',
            ],201);
        }
        catch(\Exception  $e){
            return response([
                'success' => false,
                'message' => $e,
            ],402);
        }
    }

}
