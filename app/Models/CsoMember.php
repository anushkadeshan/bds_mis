<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CsoMember extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;

    public $table = 'cso_members';

    public $fillable = [
        'name',
        'nic',
        'mobile',
        'hh_id',
        'cso_id',
    ];

    protected static $logAttributes = [
        'name',
        'nic',
        'mobile',
        'hh_id',
        'cso_id',
    ];

    protected static $logOnlyDirty = true;
}
