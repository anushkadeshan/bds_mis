<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ResoursePerson extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;
    public $fillable = [
        'name',
        'proffesion',
        'institute',
        'cv',
        'approved',
        'approved_by'
    ];

    protected static $logAttributes = [
        'name',
        'proffesion',
        'institute',
        'cv',
        'approved',
        'approved_by'
    ];

    protected static $logOnlyDirty = true;
}
