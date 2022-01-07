<?php

namespace App\Models\Program;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialSupport extends Model
{
    use HasFactory;

    public $fillable = [
        'beneficiary_financial',
        'beneficiary_financial_nic',
        'financial_purpose',
        'approved_amount',
        'completion_report_id',
    ];
}
