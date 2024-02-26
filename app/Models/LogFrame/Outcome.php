<?php

namespace App\Models\Logframe;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outcome extends Model
{
    use HasFactory;
    protected static $logOnlyDirty = true;

    protected $fillable = [
        'code', 'outcome', 'pre_condition_id'
    ];

    protected static $logAttributes = [
        'code', 'outcome', 'pre_condition_id'
    ];

    
}
