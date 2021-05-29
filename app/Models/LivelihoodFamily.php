<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class LivelihoodFamily
 * @package App\Models
 * @version March 31, 2021, 8:06 am UTC
 *
 * @property string $district
 * @property integer $dsd_id
 * @property integer $gn_id
 * @property string $village
 * @property string $date_of_interviewed
 * @property string $interviewer
 * @property string $respondent
 * @property string $res_rela_to_HHH
 * @property string $hh_address
 * @property string $family_type
 * @property string $hh_name
 * @property string $hh_nic
 * @property string $spouse_nic
 * @property integer $hh_contact
 * @property integer $spouse_contact
 * @property integer $hh_sp_contact
 * @property integer $spouse_sp_contact
 * @property string $hh_ethnicity
 * @property string $hh_religion
 * @property string $hh_gender
 * @property string $spouse_gender
 * @property integer $hh_age
 * @property integer $spouse_age
 * @property string $hh_civil_status
 * @property string $hh_education
 * @property string $spouse_education
 * @property string $hh_employment
 * @property string $spouse_employment
 * @property string $hh_health
 * @property string $spouse_health
 */
class LivelihoodFamily extends Model
{
    

    use HasFactory;
    use LogsActivity;
    public $table = 'livelihood_families';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'district',
        'dsd_id',
        'gn_id',
        'village',
        'date_of_interviewed',
        'interviewer',
        'respondent',
        'res_rela_to_HHH',
        'hh_address',
        'family_type',
        'hh_name',
        'hh_nic',
        'spouse_nic',
        'hh_contact',
        'spouse_contact',
        'hh_sp_contact',
        'spouse_sp_contact',
        'hh_ethnicity',
        'hh_religion',
        'hh_gender',
        'spouse_gender',
        'hh_age',
        'spouse_age',
        'hh_civil_status',
        'hh_education',
        'spouse_education',
        'hh_employment',
        'spouse_employment',
        'hh_health',
        'spouse_health',
        'added_by'
    ];

    protected static $logAttributes = [
        'district',
        'dsd_id',
        'gn_id',
        'village',
        'date_of_interviewed',
        'interviewer',
        'respondent',
        'res_rela_to_HHH',
        'hh_address',
        'family_type',
        'hh_name',
        'hh_nic',
        'spouse_nic',
        'hh_contact',
        'spouse_contact',
        'hh_sp_contact',
        'spouse_sp_contact',
        'hh_ethnicity',
        'hh_religion',
        'hh_gender',
        'spouse_gender',
        'hh_age',
        'spouse_age',
        'hh_civil_status',
        'hh_education',
        'spouse_education',
        'hh_employment',
        'spouse_employment',
        'hh_health',
        'spouse_health',
        'added_by'
    ];
    protected static $logOnlyDirty = true;
    
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'district' => 'string',
        'dsd_id' => 'integer',
        'gn_id' => 'integer',
        'village' => 'string',
        'date_of_interviewed' => 'string',
        'interviewer' => 'string',
        'respondent' => 'string',
        'res_rela_to_HHH' => 'string',
        'hh_address' => 'string',
        'family_type' => 'string',
        'hh_name' => 'string',
        'hh_nic' => 'string',
        'spouse_nic' => 'string',
        'hh_contact' => 'integer',
        'spouse_contact' => 'integer',
        'hh_sp_contact' => 'integer',
        'spouse_sp_contact' => 'integer',
        'hh_ethnicity' => 'string',
        'hh_religion' => 'string',
        'hh_gender' => 'string',
        'spouse_gender' => 'string',
        'hh_age' => 'integer',
        'spouse_age' => 'integer',
        'hh_civil_status' => 'string',
        'hh_education' => 'string',
        'spouse_education' => 'string',
        'hh_employment' => 'string',
        'spouse_employment' => 'string',
        'hh_health' => 'string',
        'spouse_health' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'district' => 'required|string|max:100',
        'dsd_id' => 'required|integer',
        'gn_id' => 'required|integer',
        'village' => 'required|string|max:255',
        'date_of_interviewed' => 'required|string|max:255',
        'interviewer' => 'required|string|max:255',
        'respondent' => 'required|string|max:255',
        'res_rela_to_HHH' => 'required|string|max:255',
        'hh_address' => 'required|string|max:500',
        'family_type' => 'nullable|string|max:100',
        'hh_name' => 'required|string|max:500',
        'hh_nic' => 'required|string|max:500',
        'spouse_nic' => 'nullable|string|max:500',
        'hh_contact' => 'nullable|integer',
        'spouse_contact' => 'nullable|integer',
        'hh_sp_contact' => 'nullable|integer',
        'spouse_sp_contact' => 'nullable|integer',
        'hh_ethnicity' => 'required|string|max:100',
        'hh_religion' => 'required|string|max:100',
        'hh_gender' => 'nullable|string|max:100',
        'spouse_gender' => 'nullable|string|max:100',
        'hh_age' => 'nullable|integer',
        'spouse_age' => 'nullable|integer',
        'hh_civil_status' => 'nullable|string|max:100',
        'hh_education' => 'nullable|string|max:100',
        'spouse_education' => 'nullable|string|max:100',
        'hh_employment' => 'nullable|string|max:100',
        'spouse_employment' => 'nullable|string|max:100',
        'hh_health' => 'nullable|string|max:100',
        'spouse_health' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
