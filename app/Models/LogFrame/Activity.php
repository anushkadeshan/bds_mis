<?php

namespace App\Models\LogFrame;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected static $logOnlyDirty = true;

    public $fillable = [
        'code', 'name', 'methodology', 'type', 'running','indicators', 'need_for_baseline', 'means_of_verification', 'assumptions_risks' ,'output_id'
    ];

    protected static $logAttributes = [
        'code', 'name', 'methodology', 'type', 'running','indicators', 'need_for_baseline', 'means_of_verification', 'assumptions_risks' ,'output_id'
    ];
}
