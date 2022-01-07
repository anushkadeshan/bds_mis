<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DsOffice extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;
    public $table = 'dsd_office';

    public $fillable = [
        'name',
        'district',
        'province',
        'is_working',
        'approved',
        'approved_by'
    ];

    protected static $logAttributes = ['name', 'district','province',
        'is_working',
        'approved',
    'approved_by'];
    protected static $logOnlyDirty = true;
    /**
     * Get all of the comments for the DsOffice
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gnDivisions()
    {
        return $this->hasMany(GnOffice::class, 'gnd_id');
    }
}
