<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Insurance extends Model
{
    use HasFactory;
    use LogsActivity;

    public $fillable = [
        'responsible_officer',
        'log_activity_name',
        'output_code',
        'activity_code',
        'financial_year',
        'specific_activity_name',
        'disctrict',
        'dsd_id',
        'gnd_id',
        'date_of_start',
        'date_of_end',
        'partner_contribution',
        'bds_contribution',
        'totol_planned_cost',
        'units_completed',
        'lessions_learned',
        'family_id',
        'added_by',
        'views_of_rp',
        'attendance',
        'resourse_person_id'
    ];

    protected static $logAttributes =[
        'responsible_officer',
        'log_activity_name',
        'output_code',
        'activity_code',
        'financial_year',
        'specific_activity_name',
        'disctrict',
        'dsd_id',
        'gnd_id',
        'date_of_start',
        'date_of_end',
        'partner_contribution',
        'bds_contribution',
        'totol_planned_cost',
        'units_completed',
        'lessions_learned',
        'family_id',
        'added_by',
        'views_of_rp',
        'attendance',
        'resourse_person_id'
    ];

    protected static $logOnlyDirty = true;
}
