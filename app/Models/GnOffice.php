<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GnOffice extends Model
{
    use HasFactory;
    public $table = 'gn_office';
    use SoftDeletes;


    public $fillable = [
        'name',
        'dsd_id',
        'approved',
        'is_working',
        'approved_by'
    ];

    protected static $logAttributes = ['name', 'dsd_id',
        'is_working',
        'approved',
    'approved_by'];
    protected static $logOnlyDirty = true;

    /**
     * Get the user that owns the GnOffice
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dsoffice()
    {
        return $this->belongsTo(DsOffice::class, 'dsd_id');
    }


}
