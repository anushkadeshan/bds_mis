<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BD_CSOparticipants extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;
    public $table = "bd_csos";

    public $fillable = [
        'name', 'male','female'
    ];

    protected static $logAttributes = [
        'name', 'male','female'
    ];

    protected static $logOnlyDirty = true;
}
