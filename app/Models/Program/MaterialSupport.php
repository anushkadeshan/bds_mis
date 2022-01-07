<?php

namespace App\Models\Program;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialSupport extends Model
{
    use HasFactory;
    public $fillable = [
        'beneficiary_meterial',
        'nic_or_reg_no',
        'meterial_provided',
        'meterial_quantity',
        'completion_report_id',
    ];
}
