<?php

namespace App\Repositories;

use App\Models\LivelihoodFamilyMember;
use App\Repositories\BaseRepository;

/**
 * Class LivelihoodFamilyMemberRepository
 * @package App\Repositories
 * @version March 31, 2021, 8:08 am UTC
*/

class LivelihoodFamilyMemberRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'hh_id',
        'relationship_to_hhh',
        'age',
        'gender',
        'civil_status',
        'school_grade',
        'education',
        'employment',
        'health'
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
        return LivelihoodFamilyMember::class;
    }
}
