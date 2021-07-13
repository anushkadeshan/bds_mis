<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LivilyhoodMeterials extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;
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
