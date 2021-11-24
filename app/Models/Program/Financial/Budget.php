<?php

namespace App\Models\Program\Financial;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Budget extends Model
{
    use HasFactory;
    use LogsActivity;
    protected static $logOnlyDirty = true;

    public $fillable = [
       'activity_code', 'budget_type', 'year', 'no_of_units', 'cost_per_unit', 'budget_valid_from', 'budget_valid_to', 'added_by', 'approved', 'approved_by', 'approved_on'
    ];

    protected static $logAttributes = [
        'activity_code','budget_type', 'year', 'no_of_units', 'cost_per_unit', 'budget_valid_from', 'budget_valid_to', 'added_by', 'approved', 'approved_by', 'approved_on'
    ];
}
