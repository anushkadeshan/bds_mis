<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AwarnessCSOS extends Model
{
    use HasFactory;
    use LogsActivity;
    public $table = "awarness_csos";

    public $fillable = [
        'name', 'male','female'
    ];

    protected static $logAttributes = [
        'name', 'male','female'
    ];

    protected static $logOnlyDirty = true;
}
