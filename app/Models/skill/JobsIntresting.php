<?php

namespace App\Models\skill;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobsIntresting extends Model
{
    use HasFactory,LogsActivity;

    public $timestamps = true;
    public $table = "youth_intresting_jobs";

    protected $fillable = [
        'industry',
        'location',
        'profession_adequate',
        'plan_to_meet_qualifications',
        'details',
        'experience',
        'min_salary',
        'intresting_courses',
        'youth_id'
    ];

    protected static $logAttributes = [
        'industry',
        'location',
        'profession_adequate',
        'plan_to_meet_qualifications',
        'details',
        'experience',
        'min_salary',
        'intresting_courses',
        'youth_id'
    ];

    protected static $logOnlyDirty = true;

    protected $casts = [
        'industry' => 'array',
        'location' => 'array',
        'intresting_courses' => 'array'
    ];

    public function youth(){
        return $this->belongsTo('App\Models\skill\Youth');
    }
}
