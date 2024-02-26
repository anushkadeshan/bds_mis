<?php

namespace App\Models\Program;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingBeneficiary extends Model
{
    use HasFactory;

    public $fillable = [
        'beneficiary_id', 'training_type', 'completion_report_id'
    ];
}
