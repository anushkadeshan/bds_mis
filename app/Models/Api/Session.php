<?php

namespace App\Models\Api;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
