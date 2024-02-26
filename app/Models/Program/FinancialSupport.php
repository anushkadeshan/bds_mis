<?php

namespace App\Models\Program;

use App\Models\LivelihoodFamily;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FinancialSupport extends Model
{
    use HasFactory;

    public $fillable = [
        'beneficiary_id',
        'financial_purpose',
        'approved_amount',
        'completion_report_id',
    ];

    public function beneficiary()
    {
        return $this->hasOne(LivelihoodFamily::class, 'id','beneficiary_id');
    }
}
