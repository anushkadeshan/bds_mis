<?php

namespace App\Models\skill;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Family extends Model
{
    use HasFactory,LogsActivity;

    public $timestamps = true;
    protected $fillable = ['district', 'ds_division', 'gn_division', 'head_of_household', 'nic_head_of_household', 'address', 'family_type', 'total_income', 'total_members','livelihood_family_id','is_livelihood'];

    protected static $logAttributes = ['district', 'ds_division', 'gn_division', 'head_of_household', 'nic_head_of_household', 'address', 'family_type', 'total_income', 'total_members','livelihood_family_id','is_livelihood'];

    protected static $logOnlyDirty = true;

    public function youths()
    {
        return $this->hasMany(\App\Models\skill\Youth::class);
    }

    public function dsd()
    {
        return $this->belongsTo(\App\Models\DsOffice::class, 'dsd_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function gn()
    {
        return $this->belongsTo(\App\Models\GnOffice::class, 'gn_id');
    }
}
