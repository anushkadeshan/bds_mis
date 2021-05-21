<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Permission extends Model
{
    use HasFactory;
    public $table = 'permissions';
    use LogsActivity;

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'guard_name'
    ];

    protected static $logAttributes = [
        'name',
        'guard_name'
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
