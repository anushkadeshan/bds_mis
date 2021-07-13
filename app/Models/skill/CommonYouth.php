<?php

namespace App\Models\skill;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommonYouth extends Model
{
    use HasFactory, LogsActivity;
    use SoftDeletes;
    public $table = 'youth_common_details';

    public $fillable = [
        'bank_account',
        'smart_phone',
        'training',
        'when',
        'youth_id'
    ];

    protected static $logAttributes = [
        'bank_account',
        'smart_phone',
        'training',
        'when',
        'youth_id'
    ];

    protected static $logOnlyDirty = true;

    public function youth(){
        return $this->belongsTo('App\Models\skill\Youth');
    }

}
