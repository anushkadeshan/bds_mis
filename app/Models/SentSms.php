<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SentSms extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'receiver', 'characters', 'epf', 'company', 'branch','response_id','response_status','response_data'
    ];
}
