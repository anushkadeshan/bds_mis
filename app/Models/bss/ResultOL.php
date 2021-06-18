<?php

namespace App\Models\bss;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ResultOL
 * @package App\Models
 * @version November 27, 2020, 8:37 am UTC
 *
 * @property integer $OL_A
 * @property integer $OL_B
 * @property integer $OL_C
 * @property integer $OL_S
 * @property integer $OL_W
 * @property string $Maths_Result
 * @property string $Exam_Year
 * @property string $Medium
 * @property integer $student_id
 * @property integer $user_id
 */
class ResultOL extends Model
{

    public $table = 'ol_results';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    use LogsActivity;


    protected static $logAttributes = [
        'OL_A',
        'OL_B',
        'OL_C',
        'OL_S',
        'OL_W',
        'Maths_Result',
        'Exam_Year',
        'Medium',
        'student_id',
        'user_id'
    ];

    protected static $logOnlyDirty = true;

    public $fillable = [
        'OL_A',
        'OL_B',
        'OL_C',
        'OL_S',
        'OL_W',
        'Maths_Result',
        'Exam_Year',
        'Medium',
        'student_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'OL_A' => 'integer',
        'OL_B' => 'integer',
        'OL_C' => 'integer',
        'OL_S' => 'integer',
        'OL_W' => 'integer',
        'Maths_Result' => 'string',
        'Exam_Year' => 'string',
        'Medium' => 'string',
        'student_id' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'OL_A' => 'required|integer|max:10',
        'OL_B' => 'required|integer|max:10',
        'OL_C' => 'required|integer|max:10',
        'OL_S' => 'required|integer|max:10',
        'OL_W' => 'required|integer|max:10',
        'Maths_Result' => 'required|string|max:11',
        'Exam_Year' => 'required|string|max:11',
        'Medium' => 'required|string|max:40',
        'user_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];


}
