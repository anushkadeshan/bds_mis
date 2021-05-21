<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class Role
 * @package App\Models
 * @version March 26, 2021, 4:22 am UTC
 *
 */
class Role extends Model
{
    

    use HasFactory;
    use LogsActivity;
    public $table = 'roles';
    


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
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
