<?php

namespace App\Models\Program\Financial;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyBudget extends Model
{
    use HasFactory;

    public $fillable = [
        'month', 'physical_target' , 'cost_per_unit' ,'budget_id'
    ];
}
