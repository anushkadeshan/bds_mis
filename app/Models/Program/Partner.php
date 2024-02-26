<?php

namespace App\Models\Program;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    public $fillable = [
        'type_of_contribution', 'financial_contribution', 'organization', 'other', 'other_amount', 'completion_report_id',
    ];
}
