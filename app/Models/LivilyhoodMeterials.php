<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class LivilyhoodMeterials extends Model
{
    use HasFactory;
    use LogsActivity;

    public $table = 'livelihood_meterials_supports';

    public $fillable =[
        'beneficiary_name',
        'meterial',
        'quantity',
    ];

    protected static $logAttributes =[
        'beneficiary_name',
        'meterial',
        'quantity',
    ];

    protected static $logOnlyDirty = true;

}
