<?php

namespace App\Models\skill;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class JobsYouth extends Model
{
    use HasFactory, LogsActivity;

    public $table = 'youths_jobs_details';

    public $fillable = [
        'title',
        'employer_name',
        'provided_by',
        'nature_job',
        'career_plan',
        'step_forward',
        'description',
        'youth_id'
    ];

    protected static $logAttributes = [
        'title',
        'employer_name',
        'provided_by',
        'nature_job',
        'career_plan',
        'step_forward',
        'description',
        'youth_id'
    ];

    public function youth(){
        return $this->belongsTo('App\Models\skill\Youth');
    }

    protected static $logOnlyDirty = true;
}
