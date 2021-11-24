<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    public $table = 'field_sessions';

    protected $fillable = [
        'client',
        'date',
        'description',
        'purpose',
        'start_address',
        'end_address',
        'start_lat',
        'end_lat',
        'start_long',
        'end_long',
        'start_time',
        'end_time',
        'image',
        'user_id',
    ];
}
