<?php

namespace App\Models\Api;

use Carbon\Carbon;
use App\Models\User;
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
        'end_latitude',
        'end_longitude',
        'start_meter_image',
        'end_meter_image',
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
        'trip_start_location',

    ];

    /**
     * Get the user that owns the Trip
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
