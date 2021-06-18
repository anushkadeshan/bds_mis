<?php

namespace App\Models\skill;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class EductionYouth extends Model
{
    use HasFactory, LogsActivity;
    public $timestamps = true;
    public $table = 'youth_results';

    protected $fillable = [
        'ol_year',
        'ol_attempt',
        'ol_pass_or_fail',
        'al_year',
        'al_attempt',
        'al_pass_or_fail',
        'stream','degree',
        'pass_out_year',
        'medium',
        'grade',
        'university',
        'other_professional_qualifications',
        'youth_id',
        'added_by'
    ];

    protected static $logAttributes = [
        'ol_year',
        'ol_attempt',
        'ol_pass_or_fail',
        'al_year',
        'al_attempt',
        'al_pass_or_fail',
        'stream','degree',
        'pass_out_year',
        'medium',
        'grade',
        'university',
        'other_professional_qualifications',
        'youth_id',
        'added_by'
    ];

    protected static $logOnlyDirty = true;

    public function youth(){
        return $this->belongsTo('App\Models\skill\Youth');
    }
}
