<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GnOffice extends Model
{
    use HasFactory;
    public $table = 'gn_office';



    public $fillable = [
        'name',
        'dsd_id'
    ];

    protected static $logAttributes = ['name', 'dsd_id'];
    protected static $logOnlyDirty = true;

    /**
     * Get the user that owns the GnOffice
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dsoffice(): BelongsTo
    {
        return $this->belongsTo(DsOffice::class, 'dsd_id');
    }


}
