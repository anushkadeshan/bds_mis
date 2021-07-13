<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory;
    public $table = 'permissions';
    use LogsActivity;
    use SoftDeletes;
    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'guard_name',
        'only_super_admin'
    ];

    protected static $logAttributes = [
        'name',
        'guard_name',
        'only_super_admin'

    ];
    protected static $logOnlyDirty = true;

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
}
