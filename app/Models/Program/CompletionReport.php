<?php

namespace App\Models\Program;

use App\Models\User;
use App\Models\DsOffice;
use App\Models\GnOffice;
use App\Models\Program\Partner;
use App\Models\LogFrame\Activity;
use App\Models\Program\Attachment;
use App\Models\Program\CsoTraining;
use App\Models\Program\Participant;
use App\Models\Program\Construction;
use App\Models\Program\TrainingData;
use App\Models\Program\MaterialSupport;
use Illuminate\Database\Eloquent\Model;
use App\Models\Program\Financial\Budget;
use App\Models\Program\FinancialSupport;
use App\Models\Program\ProgressTracking;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompletionReport extends Model
{
    use HasFactory;
    use LogsActivity;


    protected static $logOnlyDirty = true;

    public $fillable = [
        'activity_code',
        'project_id',
        'pre_condition_id',
        'outcome_id',
        'output_id',
        'activity_id',
        'district',
        'dsd',
        'gnds',
        'responsible_officer',
        'financial_year',
        'date_of_start',
        'date_of_end',
        'partner_contribution',
        'bds_contribution',
        'totol_planned_cost',
        'totdal_actual_cost',
        'unit_cost',
        'units_completed',
        'lessions_learned',
        'is_draft',
        'isApproved',
        'approved_by',
        'added_by',
        'budget_id',
        'approved_at',
        'isReviewed',
        'reviewedBy',
        'reviewed_at'
    ];

    protected static $logAttributes = [
        'activity_code',
        'project_id',
        'pre_condition_id',
        'outcome_id',
        'output_id',
        'activity_id',
        'district',
        'dsd',
        'gnds',
        'responsible_officer',
        'financial_year',
        'date_of_start',
        'date_of_end',
        'partner_contribution',
        'bds_contribution',
        'totol_planned_cost',
        'totdal_actual_cost',
        'units_completed',
        'unit_cost',
        'lessions_learned',
        'isApproved',
        'approved_by',
        'is_draft',
        'added_by',
        'budget_id',
        'approved_at',
        'isReviewed',
        'reviewedBy',
        'reviewed_at'
    ];

    protected $casts = [
        'gnds' => 'json'
    ];

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partners()
    {
        return $this->hasMany(Partner::class, 'completion_report_id', 'id');
    }

    public function constructions()
    {
        return $this->hasMany(Construction::class, 'completion_report_id', 'id');
    }

    public function materialsupports()
    {
        return $this->hasMany(MaterialSupport::class, 'completion_report_id', 'id');
    }

    public function financialsupports()
    {
        return $this->hasMany(FinancialSupport::class, 'completion_report_id', 'id');
    }

    public function trainingData()
    {
        return $this->hasMany(TrainingData::class, 'completion_report_id', 'id');
    }

    public function participants()
    {
        return $this->hasMany(Participant::class, 'completion_report_id', 'id');
    }

    public function csoTrainings()
    {
        return $this->hasMany(CsoTraining::class, 'completion_report_id', 'id');
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class, 'completion_report_id', 'id');
    }

    public function budget()
    {
        return $this->belongsTo(Budget::class, 'budget_id');
    }

    public function dsd_office()
    {
        return $this->belongsTo(DsOffice::class, 'dsd');
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class,'activity_id');
    }


    public function addedBy()
    {
        return $this->hasOne(User::class, 'id', 'added_by');
    }

    public function tracking()
    {
        return $this->hasMany(ProgressTracking::class, 'progress_id', 'id');
    }
}
