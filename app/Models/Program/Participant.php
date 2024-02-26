<?php

namespace App\Models\Program;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    public $fillable = [
        'age',
        'gender_male',
        'gender_female',
        'disability_male',
        'disability_female',
        'sinhala',
        'tamil',
        'muslim',
        'other_ethnicity',
        'completion_report_id',
    ];
}
