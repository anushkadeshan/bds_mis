<?php

namespace App\Models\bss;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ResultAL
 * @package App\Models
 * @version November 28, 2020, 5:17 am UTC
 *
 * @property string $stream
 * @property string $school
 * @property integer $year
 * @property integer $index_No
 * @property integer $AL_A
 * @property integer $AL_B
 * @property integer $AL_C
 * @property integer $AL_S
 * @property integer $AL_W
 * @property integer $pass_fail
 * @property integer $student_id
 * @property integer $attempt
 * @property string $z_Score
 * @property integer $district_rank
 * @property integer $island_rank
 * @property integer $user_id
 */
class ResultAL extends Model
{

    public $table = 'al_results';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'stream',
        'school',
        'year',
        'index_no',
        'AL_A',
        'AL_B',
        'AL_C',
        'AL_S',
        'AL_W',
        'pass_fail',
        'student_id',
        'attempt',
        'z_score',
        'district_rank',
        'island_rank',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'stream' => 'string',
        'school' => 'string',
        'year' => 'integer',
        'index_no' => 'integer',
        'AL_A' => 'integer',
        'AL_B' => 'integer',
        'AL_C' => 'integer',
        'AL_S' => 'integer',
        'AL_W' => 'integer',
        'pass_fail' => 'integer',
        'student_id' => 'integer',
        'attempt' => 'integer',
        'z_score' => 'string',
        'district_rank' => 'integer',
        'island_rank' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'stream' => 'required|string|max:50',
        'school' => 'required|string|max:150',
        'year' => 'required|integer',
        'index_no' => 'required|integer',
        'AL_A' => 'required|integer',
        'AL_B' => 'required|integer',
        'AL_C' => 'required|integer',
        'AL_S' => 'required|integer',
        'AL_W' => 'required|integer',
        'pass_fail' => 'nullable|integer',
        'student_id' => 'required',
        'attempt' => 'required|integer',
        'z_score' => 'required|string|max:10',
        'district_rank' => 'required|integer',
        'island_rank' => 'required|integer',
        'user_id' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];


}
