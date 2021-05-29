<?php

namespace App\Repositories;

use App\Models\LivelihoodFamily;
use App\Repositories\BaseRepository;

/**
 * Class LivelihoodFamilyRepository
 * @package App\Repositories
 * @version March 31, 2021, 8:06 am UTC
*/

class LivelihoodFamilyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        'spouse_health'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return LivelihoodFamily::class;
    }
}
