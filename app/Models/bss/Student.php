<?php

namespace App\Models\bss;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public $table = 'students';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'schol_given_on',
        'ref_no',
        'grade_05_year',
        'ol_year',
        'uni_year',
        'name',
        'gender',
        'nic',
        'ethnicity',
        'date_of_birth',
        'address',
        'contact',
        'guardian_name',
        'relationship',
        'al_year',
        'stream',
        'school',
        'direct_by_bmic',
        'dsd_id',
        'gn_id',
        'sector',
        'branch_id',
        'samurdi',
        'low_income',
        'bmic_pci',
        'non_bmic_pci',
        'status_id',
        'client_code',
        'added_by',
        'schol_type',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'schol_given_on' => 'string',
        'ref_no' => 'string',
        'name' => 'string',
        'gender' => 'string',
        'nic' => 'string',
        'ethnicity' => 'string',
        'date_of_birth' => 'string',
        'address' => 'string',
        'contact' => 'string',
        'guardian_name' => 'string',
        'relationship' => 'string',
        'al_year' => 'integer',
        'stream' => 'string',
        'grade_05_year' => 'integer',
        'ol_year' => 'integer',
        'uni_year' => 'integer',
        'school' => 'string',
        'direct_by_bmic' => 'string',
        'dsd_id' => 'integer',
        'gn_id' => 'integer',
        'sector' => 'string',
        'branch_id' => 'integer',
        'samurdi' => 'string',
        'low_income' => 'string',
        'bmic_pci' => 'float',
        'non_bmic_pci' => 'float',
        'status_id' => 'integer',
        'client_code' => 'string',
        'added_by' => 'integer',
        'schol_type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'schol_given_on' => 'nullable',
        'ref_no' => 'required|string|max:150',
        'name' => 'required|string|max:155',
        'gender' => 'required|string|max:45',
        'nic' => 'nullable|string|max:45',
        'ethnicity' => 'required|string|max:45',
        'date_of_birth' => 'required',
        'address' => 'required|string|max:255',
        'contact' => 'required|string|max:45',
        'guardian_name' => 'required|string|max:105',
        'relationship' => 'required|string|max:45',
        'al_year' => 'integer',
        'stream' => 'string|max:45',
        'school' => 'required|string|max:155',
        'grade_05_year' => 'nullable|numeric',
        'ol_year' => 'nullable|numeric',
        'uni_year' => 'nullable|numeric',
        'direct_by_bmic' => 'required|boolean',
        'dsd_id' => 'required|integer',
        'gn_id' => 'required',
        'sector' => 'required|string|max:45',
        'branch_id' => 'required|integer',
        'samurdi' => 'required|boolean',
        'low_income' => 'required|boolean',
        'bmic_pci' => 'nullable|numeric',
        'non_bmic_pci' => 'nullable|numeric',
        'status_id' => 'required|integer',
        'client_code' => 'nullable|string|max:45',
        'added_by' => 'nullable',
        'created_at' => 'nullable|string|max:45',
        'updated_at' => 'nullable|string|max:45',
        'schol_type' => 'nullable|string|max:45',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function addedBy()
    {
        return $this->belongsTo(\App\Models\User::class, 'added_by');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function branch()
    {
        return $this->belongsTo(\App\Models\Branch::class, 'branch_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dsd()
    {
        return $this->belongsTo(\App\Models\DsOffice::class, 'dsd_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function gn()
    {
        return $this->belongsTo(\App\Models\GnOffice::class, 'gn_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function status()
    {
        return $this->belongsTo(\App\Models\bss\Status::class, 'status_id');
    }

    public function payment()
    {
        return $this->hasOne(\App\Models\bss\Pyament::class, 'student_id', 'id');
    }
}
