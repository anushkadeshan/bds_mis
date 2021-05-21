<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class LivilyhoodPartners extends Model
{
    use HasFactory;
    use LogsActivity;
    public $table = 'livelihood_partners';


    public $fillable =[
        'organization',
        'type_of_contribution',
        'financial_contribution',
        'other',
        'other_amount'
    ];

    protected static $logAttributes =[
        'organization',
        'type_of_contribution',
        'financial_contribution',
        'other',
        'other_amount'

    ];

    protected static $logOnlyDirty = true;
}
