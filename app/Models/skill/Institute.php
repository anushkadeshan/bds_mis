<?php

namespace App\Models\skill;

use App\Models\skill\Course;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Institute extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps = true;
    use LogsActivity;
    protected $fillable = ['name', 'location', 'address', 'contact_person', 'phone','email','is_registerd','reg_no','type','added_by'];

    protected static $logAttributes = ['name', 'location', 'address', 'contact_person', 'phone','email','is_registerd','reg_no','type','added_by'];

    protected static $logOnlyDirty = true;

    public function courses(){
    	return $this->belongsToMany(Course::class,'courses_institutes');
    }
}
