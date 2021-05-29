<?php

namespace App\Models\skill;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacancy extends Model
{
    use HasFactory;
    public $timestamps = true;
    use LogsActivity;
    protected $fillable = [
        'title',
        'description',
        'job_type',
        'industry',
        'business_function',
        'location',
        'district',
        'salary',
        'total_vacancies',
        'dedline',
        'min_qualification',
        'specializaion',
        'skills',
        'gender',
        'user_id',
        'employer_id'
    ];

    protected static $logAttributes = [
        'title',
        'description',
        'job_type',
        'industry',
        'business_function',
        'location',
        'district',
        'salary',
        'total_vacancies',
        'dedline',
        'min_qualification',
        'specializaion',
        'skills',
        'gender',
        'user_id',
        'employer_id'
    ];

    protected static $logOnlyDirty = true;

    public function employer(){
    	return $this->belongsTo('App\skill\Employer');
    }
}
