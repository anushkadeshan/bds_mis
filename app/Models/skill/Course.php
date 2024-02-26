<?php

namespace App\Models\skill;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;
    public $timestamps = true;
    protected static $logAttributes = ['name', 'duration', 'course_fee', 'course_type',	'standard',	'course_time', 'course_catogery', 'medium', 'min_qualification','added_by','embeded_softs_skills',
    'approved',
    'approved_by'];

    protected static $logOnlyDirty = true;

    protected $fillable = ['name', 'duration', 'course_fee', 'course_type',	'standard',	'course_time', 'course_catogery', 'medium', 'min_qualification','added_by','embeded_softs_skills',
    'approved',
    'approved_by'];

    //public function institutes(){
    //	return $this->belongsToMany(Institute::class,'courses_institutes');
    //}
//
    //public function youths(){
    //	return $this->belongsToMany(Youth::class,'youths_courses');
    //}
}
