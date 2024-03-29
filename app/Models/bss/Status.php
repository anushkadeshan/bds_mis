<?php

namespace App\Models\bss;

use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Status
 * @package App\Models
 * @version November 14, 2020, 11:01 am UTC
 *
 * @property string $status
 */
class Status extends Model
{

    public $table = 'status';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    use LogsActivity;
    use SoftDeletes;

    protected static $logAttributes = [
        'status'
    ];

    protected static $logOnlyDirty = true;

    public $fillable = [
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'status' => 'required|string|max:100'
    ];


}
