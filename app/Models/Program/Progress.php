<?php

namespace App\Models\Program;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Progress extends Model
{
    use HasFactory;

    use LogsActivity;
    protected static $logOnlyDirty = true;

    public $fillable = [
       'activity_code', 'year', 'no_of_units', 'cost_per_unit', 'completed_date',  'added_by', 'approved', 'approved_by', 'approved_on','budget_type'
    ];

    protected static $logAttributes = [
        'activity_code', 'year', 'no_of_units', 'cost_per_unit', 'completed_date', 'added_by', 'approved', 'approved_by', 'approved_on' ,'budget_type'
    ];

}
