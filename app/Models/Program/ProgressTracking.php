<?php

namespace App\Models\Program;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressTracking extends Model
{
    public $fillable = [
        'action',
        'action_by',
        'action_date',
        'progress_id',
    ];

    use HasFactory;
}
