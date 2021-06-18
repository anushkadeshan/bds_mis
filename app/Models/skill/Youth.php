<?php

namespace App\Models\skill;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Youth extends Model
{
    use HasFactory;
    public $timestamps = true;
    use LogsActivity;

    protected $fillable = [
        'name',
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
        'branch_id'
    ];

    protected static $logAttributes = [
        'name',
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
        'bss_id',
        'bss',
        'branch_id'
    ];

    protected static $logOnlyDirty = true;

    public function family(){
    	return $this->belongsTo('App\skill\Family');
    }

    public function results(){
    	return $this->hasMany('App\Result');
    }

    public function courses(){
    	return $this->belongsToMany(Course::class,'youths_courses');
    }

    public function branch(){
        return $this->belongsTo('App\Branch');
    }

    public function progresses(){
        return $this->hasMany('App\Progress');
    }

    public function career_guidances(){
        return $this->belongsToMany(CareerGuidance::class, 'branches_careerGuidances');
    }

    public function intrestingJobs(){
        return $this->hasMany('App\IntrestingJobs');
    }
}
