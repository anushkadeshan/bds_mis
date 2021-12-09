<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post("login",[App\Http\Controllers\Api\LoginController::class,'index']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get("logout",[App\Http\Controllers\Api\LoginController::class,'logout']);
    Route::get("user",[App\Http\Controllers\Api\LoginController::class,'user']);
    Route::post("create-session",[App\Http\Controllers\Api\SessionController::class,'create']);
    Route::post("create-trip",[App\Http\Controllers\Api\TripController::class,'create']);
    Route::get("sessions-counts",[App\Http\Controllers\Api\SessionController::class,'SessionCounts']);
    Route::get("trip-data",[App\Http\Controllers\Api\TripController::class,'TripData']);
    Route::get("all-trips",[App\Http\Controllers\Api\TripController::class,'index']);
    Route::get("all-sessions",[App\Http\Controllers\Api\SessionController::class,'index']);
    Route::post("single-trips",[App\Http\Controllers\Api\TripController::class,'show']);
    Route::post("update-session",[App\Http\Controllers\Api\SessionController::class,'update']);
    Route::post("add-home",[App\Http\Controllers\Api\LoginController::class,'addHome']);
    Route::post("add-office",[App\Http\Controllers\Api\LoginController::class,'addOffice']);
    Route::post("add-boarding",[App\Http\Controllers\Api\LoginController::class,'addBoarding']);
    Route::post("add-bike",[App\Http\Controllers\Api\LoginController::class,'addBikeNumber']);
});
