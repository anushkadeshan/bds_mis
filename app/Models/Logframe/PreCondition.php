<?php

namespace App\Models\Logframe;

use App\Models\Logframe\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PreCondition extends Model
{
    use HasFactory;
    protected static $logOnlyDirty = true;


    public $fillable = [
        'code', 'pre_condition', 'project_id'
    ];

    protected static $logAttributes = [
        'code', 'pre_condition', 'project_id'
    ];

    /**
     * Get the user that owns the PreCondition
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
