<?php

namespace App\Models\Logframe;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Output extends Model
{
    use HasFactory;
    protected static $logOnlyDirty = true;

    public $fillable = [
        'output','code','outcome_id'
    ];

    protected static $logAttributes = [
        'output','code','outcome_id'
    ];

}
