<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class BD_CSOparticipants extends Model
{
    use HasFactory;
    use LogsActivity;
    public $table = "bd_csos";

    public $fillable = [
        'name', 'male','female'
    ];

    protected static $logAttributes = [
        'name', 'male','female'
    ];

    protected static $logOnlyDirty = true;
}
