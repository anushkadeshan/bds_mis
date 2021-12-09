<?php

namespace App\Models\Program;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingData extends Model
{
    use HasFactory;

    public $fillable = [
        'introduction',
        'training_target_group',
        'methodology',
        'resourses',
        'results',
        'completion_report_id',
    ];
}
