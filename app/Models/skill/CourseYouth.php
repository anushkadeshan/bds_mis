<?php

namespace App\Models\skill;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseYouth extends Model
{
    use HasFactory, LogsActivity;
    use SoftDeletes;
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
