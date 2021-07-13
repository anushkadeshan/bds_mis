<?php

namespace App\Models\skill;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Youth extends Model
{
    use HasFactory;
    public $timestamps = true;
    use LogsActivity;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'cg',
        'vt',
        'prof',
        'soft_skills',
        'job',
        'full_name',
        'gender',
        'nic',
        'phone',
        'email',
        'birth_date',
        'driving_licence',
        'maritial_status',
        'nationality',
        'disability',
        'reason',
        'highest_qualification',
        'family_id',
        'added_by',
        'bss',
        'bss_id',
        'branch_id',
        'is_application_completed',
        'approved',
        'approved_by'
    ];

    protected static $logAttributes = [
        'name',
        'cg',
        'vt',
        'prof',
        'soft_skills',
        'job',
        'full_name',
        'gender',
        'nic',
        'phone',
        'email',
        'birth_date',
        'driving_licence',
        'maritial_status',
        'nationality',
        'disability',
        'reason',
        'highest_qualification',
        'family_id',
        'added_by',
        'bss',
        'bss_id',
        'branch_id',
        'is_application_completed',
        'approved',
        'approved_by'
    ];

    protected static $logOnlyDirty = true;

    public function family(){
    	return $this->belongsTo('App\Models\skill\Family');
    }

    public function branch(){
    	return $this->belongsTo('App\Models\Branch');
    }


    public function languages()
    {
        return $this->hasOne(LanguageYouth::class, 'youth_id', 'id');
    }

    public function jobs()
    {
        return $this->hasOne(JobsYouth::class, 'youth_id', 'id');
    }

    public function intrstingjobs()
    {
        return $this->hasOne(JobsIntresting::class, 'youth_id', 'id');
    }

    public function education()
    {
        return $this->hasOne(EductionYouth::class, 'youth_id', 'id');
    }

    public function courses()
    {
        return $this->hasOne(CourseYouth::class, 'youth_id', 'id');
    }

    public function business()
    {
        return $this->hasOne(BusinessYouth::class, 'youth_id', 'id');
    }

}
