<?php

namespace App\Models\Logframe;

use App\Models\Logframe\PreCondition;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    protected static $logOnlyDirty = true;


    public $fillable = [
        'name', 'started_at', 'end_at', 'type', 'district', 'dsds','budget','goal'
    ];

    protected static $logAttributes = [
        'name', 'started_at', 'end_at', 'type', 'district', 'dsds','budget','goal'
    ];
    /**
     * Get all of the comments for the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function preConditions()
    {
        return $this->hasMany(PreCondition::class, 'project_id');
    }
}
