<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IG_CSOparticipants extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;
    public $table = "ig_csos";

    public $fillable = [
        'name', 'male','female','ig_id'
    ];

    protected static $logAttributes = [
        'name', 'male','female','ig_id'
    ];

    protected static $logOnlyDirty = true;
}
