<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cso extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;

    public $table = 'csos';

    public $fillable = [
        'name',
        'district',
        'dsd_id',
        'gn_id',
        'category',
        'reg_no',
    ];

    protected static $logAttributes = [
        'name',
        'district',
        'dsd_id',
        'gn_id',
        'category',
        'reg_no',
    ];

    protected static $logOnlyDirty = true;

    /**
     * Get all of the comments for the Cso
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function members()
    {
        return $this->hasMany(CsoMember::class, 'cso_id', 'id');
    }
}
