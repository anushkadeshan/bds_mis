<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
/**
 * Class LivelihoodFamilyMember
 * @package App\Models
 * @version March 31, 2021, 8:08 am UTC
 *
 * @property integer $hh_id
 * @property string $relationship_to_hhh
 * @property integer $age
 * @property string $gender
 * @property string $civil_status
 * @property integer $school_grade
 * @property string $education
 * @property string $employment
 * @property string $health
 */
class LivelihoodFamilyMember extends Model
{
    use SoftDeletes;
    use LogsActivity;
    use HasFactory;

    public $table = 'livelihood_family_members';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'hh_id',
        'relationship_to_hhh',
        'age',
        'gender',
        'member_contact',
        'member_sp_contact',
        'civil_status',
        'school_grade',
        'education',
        'employment',
        'health'
    ];

    protected static $logAttributes = [
        'hh_id',
        'relationship_to_hhh',
        'age',
        'gender',
        'member_contact',
        'member_sp_contact',
        'civil_status',
        'school_grade',
        'education',
        'employment',
        'health'
    ];
    protected static $logOnlyDirty = true;

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'hh_id' => 'integer',
        'relationship_to_hhh' => 'string',
        'age' => 'integer',
        'member_sp_contact' => 'integer',
        'member_contact' => 'integer',
        'gender' => 'string',
        'civil_status' => 'string',
        'school_grade' => 'integer',
        'education' => 'string',
        'employment' => 'string',
        'health' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'hh_id' => 'nullable|integer',
        'relationship_to_hhh' => 'required|string|max:100',
        'age' => 'integer',
        'member_contact' => 'integer',
        'member_sp_contact' => 'integer',
        'gender' => 'string|max:255',
        'civil_status' => 'nullable|string|max:100',
        'school_grade' => 'nullable|integer',
        'education' => 'nullable|string|max:100',
        'employment' => 'nullable|string|max:100',
        'health' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
