<?php

namespace App\Models\Program\Financial;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BudgetType extends Model
{
    use HasFactory;
    use LogsActivity;
    
    protected static $logOnlyDirty = true;
    public $fillable = [
        'year', 'start_date', 'end_date', 'type', 'added_by'
    ];

    protected static $logAttributes = [
        'year', 'start_date', 'end_date', 'type', 'added_by'
    ];


}
