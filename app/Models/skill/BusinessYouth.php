<?php

namespace App\Models\skill;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class BusinessYouth extends Model
{
    use HasFactory, LogsActivity;

    public $table = 'youth_intresting_business';

    public $fillable = [
        'intresting_business',
        'need_help',
        'type_of_help',
        'youth_id'
    ];

    protected static $logAttributes = [
        'intresting_business',
        'need_help',
        'type_of_help',
        'youth_id'
    ];

    protected static $logOnlyDirty = true;

    public function youth(){
        return $this->belongsTo('App\Models\skill\Youth');
    }
}
