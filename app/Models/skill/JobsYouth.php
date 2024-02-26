<?php

namespace App\Models\skill;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobsYouth extends Model
{
    use HasFactory, LogsActivity;
    use SoftDeletes;
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
