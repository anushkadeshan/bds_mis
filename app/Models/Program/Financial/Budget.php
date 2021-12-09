<?php

namespace App\Models\Program\Financial;

use App\Models\LogFrame\Activity;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Budget extends Model
{
    use HasFactory;
    use LogsActivity;
    protected static $logOnlyDirty = true;

    public $fillable = [
       'activity_code', 'budget_type', 'year', 'no_of_units', 'cost_per_unit', 'budget_valid_from', 'budget_valid_to', 'added_by', 'approved', 'approved_by', 'approved_on','project_id','pre_condition_id','outcome_id','output_id','activity_id'
    ];

    protected static $logAttributes = [
        'activity_code','budget_type', 'year', 'no_of_units', 'cost_per_unit', 'budget_valid_from', 'budget_valid_to', 'added_by', 'approved', 'approved_by', 'approved_on','project_id','pre_condition_id','outcome_id','output_id','activity_id'
    ];


    /**
     * Get all of the comments for the Budget
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activities()
    {
        return $this->hasMany(Activity::class, 'id', 'activity_id');
    }
   }
