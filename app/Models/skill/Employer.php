<?php

namespace App\Models\skill;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employer extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;
    public $timestamps = true;

    protected $fillable=[
        'name',
        'address',
        'company_type',
        'industry',
        'user_id',
        'phone',
        'email',
        'added_by',
        'approved',
        'approved_by'
    ];

    protected static $logAttributes=[
        'name',
        'address',
        'company_type',
        'industry',
        'user_id',
        'phone',
        'email',
        'added_by',
        'approved',
        'approved_by'
    ];

    protected static $logOnlyDirty = true;


}
