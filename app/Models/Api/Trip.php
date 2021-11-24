<?php

namespace App\Models\Api;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'start_meter_reading',
        'trip_id',
        'latitude',
        'longitude',
        'accuracy',
        'altitude',
        'speed',
        'end_meter_reading',
        'time',
        'user_id',
        'distance',
        'start_time',
        'end_time',
        'trip_end_location',
        'trip_start_location'

    ];

}
