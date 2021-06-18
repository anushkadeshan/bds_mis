<?php

namespace App\Models\skill;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class CourseYouth extends Model
{
    use HasFactory, LogsActivity;

    public $table = 'youths_courses';

    public $fillable = [
        'course_id',
        'youth_id',
        'status',
        'provided_by_bec',
        'completed_at'
    ];

    protected static $logAttributes = [
        'course_id',
        'youth_id',
        'status',
        'provided_by_bec',
        'completed_at'
    ];

    public function youth(){
        return $this->belongsTo('App\Models\skill\Youth');
    }

    protected static $logOnlyDirty = true;

}
