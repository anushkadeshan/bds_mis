<?php

namespace App\Models\Program;

use App\Models\User;
use App\Models\DsOffice;
use App\Models\GnOffice;
use App\Models\LogFrame\Activity;
use App\Models\Logframe\PreCondition;
use Illuminate\Database\Eloquent\Model;
use App\Models\Program\Financial\Budget;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Progress extends Model
{
    use HasFactory;

    use LogsActivity;
    protected static $logOnlyDirty = true;

    public $fillable = [
        'activity_code',
        'project_id', 'pre_condition_id',
        'outcome_id',
        'output_id',
        'activity_id',
        'title',
        'completion_report_id',
        'financial_year',
        'no_of_units',
        'total_cost',
        'completed_date',
        'district',
        'dsd_id',
        'gn_id',
        'added_by',
        'approved',
        'approved_by',
        'approved_on',
    ];

    protected static $logAttributes = [
        'district', 'dsd_id', 'gn_id','activity_code', 'title','project_id', 'pre_condition_id', 'outcome_id', 'output_id', 'activity_id', 'completion_report_id', 'financial_year', 'no_of_units', 'total_cost', 'completed_date', 'added_by', 'approved', 'approved_by', 'approved_on',
    ];

    /**
     * Get the user associated with the Progress
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function addedBy()
    {
        return $this->hasOne(User::class, 'id', 'added_by');
    }

    public function activity()
    {
        return $this->hasOne(Activity::class, 'id', 'activity_id');
    }

    public function dsd()
    {
        return $this->belongsTo(DsOffice::class, 'dsd_id', 'id');
    }

    public function gnd()
    {
        return $this->belongsTo(GnOffice::class, 'gn_id', 'id');
    }

    public function precondition()
    {
        return $this->belongsTo(PreCondition::class, 'pre_condition_id', 'id');
    }


    /**
     * Get the user that owns the Progress
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function budget()
    {
        return $this->belongsTo(Budget::class, 'activity_id', 'activity_id');
    }

}
