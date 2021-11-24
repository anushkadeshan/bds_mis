<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Eip extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;

    public $table = 'eip_clients';

    public $fillable = [
        'name',
        'address',
        'dsd_id',
        'post_office',
        'allowance',
        'mo_allowance',
        'postage',
    ];

    protected static $logAttributes = [
        'name',
        'address',
        'dsd_id',
        'post_office',
        'allowance',
        'mo_allowance',
        'postage',
    ];

    protected static $logOnlyDirty = true;
}
