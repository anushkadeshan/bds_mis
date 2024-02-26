<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected static $logOnlyDirty = true;

    public $fillable = [
        'name', 'type', 'task_start_at', 'task_end_at', 'importance', 'added_by'
    ];

    protected static $logAttributes = [
        'name', 'type', 'task_start_at', 'task_end_at', 'importance', 'added_by'
    ];
}
