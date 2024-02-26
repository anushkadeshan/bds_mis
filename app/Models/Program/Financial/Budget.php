<?php

namespace App\Models\Program\Financial;

use App\Models\User;
use App\Models\DsOffice;
use App\Models\GnOffice;
use App\Models\LogFrame\Activity;
use App\Models\Logframe\PreCondition;
use Illuminate\Database\Eloquent\Model;
use App\Models\Program\CompletionReport;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Staudenmeir\EloquentJsonRelations\HasJsonRelationships;

class Budget extends Model
{
    use HasFactory;
    use LogsActivity;
    use HasJsonRelationships;

    protected static $logOnlyDirty = true;

    public $fillable = [
        'gn_id', 'dsd_id', 'district','activity_code', 'type_of_unit', 'boarder_activity', 'year', 'no_of_units', 'cost_per_unit', 'budget_valid_from', 'budget_valid_to', 'added_by', 'approved', 'approved_by', 'approved_on','project_id','pre_condition_id','outcome_id','output_id','activity_id','is_draft','reviewed','reviewed_by','reviewed_at'
    ];

    protected static $logAttributes = [
        'gn_id', 'dsd_id', 'district','activity_code','type_of_unit', 'boarder_activity', 'year', 'no_of_units', 'cost_per_unit', 'budget_valid_from', 'budget_valid_to', 'added_by', 'approved', 'approved_by', 'approved_on','project_id','pre_condition_id','outcome_id','output_id','activity_id','is_draft','reviewed','reviewed_by','reviewed_at'
    ];

    protected $casts = [
        'gn_id' => 'json'
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

    /**
     * Get the user that owns the Budget
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dsd()
    {
        return $this->belongsTo(DsOffice::class, 'dsd_id', 'id');
    }

    public function gnd()
    {
        return $this->hasManyJson(GnOffice::class, 'id','gn_id');
    }

    public function precondition()
    {
        return $this->belongsTo(PreCondition::class, 'pre_condition_id', 'id');
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id', 'id');
    }

    public function addedBy()
    {
        return $this->belongsTo(User::class, 'added_by', 'id');
    }

    public function completion_report()
    {
        return $this->hasOne(CompletionReport::class, 'activity_id', 'activity_id');
    }

   }
