<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DsOffice extends Model
{
    use HasFactory;

    public $table = 'dsd_office';



    public $fillable = [
        'name',
        'district',
        'province'
    ];

    protected static $logAttributes = ['name', 'district','province'];
    protected static $logOnlyDirty = true;
    /**
     * Get all of the comments for the DsOffice
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gnDivisions(): HasMany
    {
        return $this->hasMany(GnOffice::class, 'gnd_id');
    }
}
