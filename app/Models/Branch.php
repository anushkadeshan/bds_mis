<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branch extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;
    public $table = 'branches';


    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'manager',
        'ext',
        'manager_bds',
        'area'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'manager' => 'string',
        'ext' => 'string',
        'manager_bds' => 'string',
        'area' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
}
