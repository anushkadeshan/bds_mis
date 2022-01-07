<?php

namespace App\Models\Program;

use App\Models\GnOffice;
use App\Models\Program\Partner;
use App\Models\Program\Attachment;
use App\Models\Program\CsoTraining;
use App\Models\Program\Participant;
use App\Models\Program\Construction;
use App\Models\Program\TrainingData;
use App\Models\Program\MaterialSupport;
use Illuminate\Database\Eloquent\Model;
use App\Models\Program\FinancialSupport;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompletionReport extends Model
{
    use HasFactory;
    use LogsActivity;


    protected static $logOnlyDirty = true;

    public $fillable = [
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
        'lessions_learned',
        'isApproved',
        'approved_by',
        'added_by',
    ];

    protected static $logAttributes = [
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
        'lessions_learned',
        'isApproved',
        'approved_by',
        'added_by',
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
}
