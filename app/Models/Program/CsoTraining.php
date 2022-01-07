<?php

namespace App\Models\Program;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CsoTraining extends Model
{
    use HasFactory;

    public $fillable = [
        'cso_name',
        'cso_reg_no',
        'cso_male',
        'cso_female',
        'completion_report_id',
    ];
}
