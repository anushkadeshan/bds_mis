<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


class ResoursePerson extends Model
{
    use HasFactory;
    use LogsActivity;

    public $fillable = [
        'name',
        'proffesion',
        'institute',
        'cv',
    ];

    protected static $logAttributes = [
        'name',
        'proffesion',
        'institute',
        'cv',
    ];

    protected static $logOnlyDirty = true;
}
