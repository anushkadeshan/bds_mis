<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ML_CSOparticipant extends Model
{
    use HasFactory;
    use LogsActivity;
    public $table = "ml_csos";

    public $fillable = [
        'name', 'male','female','ml_id'
    ];

    protected static $logAttributes = [
        'name', 'male','female','ml_id'
    ];

    protected static $logOnlyDirty = true;
}
