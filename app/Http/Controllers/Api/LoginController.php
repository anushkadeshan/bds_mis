<?php

namespace App\Http\Controllers\Api;

use Throwable;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class LoginController extends Controller
{
    function index(Request $request)
    {
        $user= User::where('email', $request->email)->first();
        // print_r($data);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'success' => false,
                    'message' => 'The Username and Password do not match our records.'
                ], 404);
            }

             $token = $user->createToken('my-app-token')->plainTextToken;

            $response = [
                'success' => true,
                'user' => $user,
                'token' => $token
            ];

             return response($response, 201);
    }

    public function logout(Request $request){
        $user = auth()->user();
        try{
            $user->currentAccessToken()->delete();
            return response([
                'success' => true,
                'message' => 'Logout Successfully'
            ]);
        }
        catch(Throwable $e){
            return response([
                'success' => false,
                'message' => 'Something Error'
            ]);
        }

    }

    public function user(Request $request) {
        $bearerToken= $request->bearerToken();
        $token = PersonalAccessToken::findToken($bearerToken);

        if (!$token) {
            return response([
                'success' => false,
                'message' => 'toekn not found'
            ], 404);
        }

        $user = $token->tokenable;

        $response = [
            'success' => true,
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);

    }

    public function addHome(Request $request) {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        try{
            $user->home_lattitudes = $request->home_lattitudes;
            $user->home_longitudes = $request->home_longitudes;
            $user->save();

            return response([
                'success' => true,
                'message' => 'Home Added Successfully',
            ],201);

        }
        catch(\Exception  $e){
            return response([
                'success' => false,
                'message' => $e,
            ],402);
        }

    }

    public function addOffice(Request $request) {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        try{
            $user->office_lattitudes = $request->office_lattitudes;
            $user->office_longitudes = $request->office_longitudes;
            $user->save();

            return response([
                'success' => true,
                'message' => 'Office Added Successfully',
            ],201);
        }
        catch(\Exception  $e){
            return response([
                'success' => false,
                'message' => $e,
            ],402);
        }

    }

    public function addBoarding(Request $request) {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        try{
            $user->is_boarded = $request->is_boarded;
            $user->save();

            return response([
                'success' => true,
                'message' => 'Boarding Place Updated Successfully',
            ],201);
        }
        catch(\Exception  $e){
            return response([
                'success' => false,
                'message' => $e,
            ],402);
        }

    }

    public function addBikeNumber(Request $request) {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        try{
            $user->bike_number = $request->bike_number;
            $user->save();

            return response([
                'success' => true,
                'message' => 'Bike Plate Number Updated Successfully',
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
