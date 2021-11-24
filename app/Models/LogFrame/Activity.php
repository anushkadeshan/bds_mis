<?php

namespace App\Models\LogFrame;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected static $logOnlyDirty = true;

    public $fillable = [
        'code', 'name', 'methodology', 'type', 'running'
    ];

    protected static $logAttributes = [
        'code', 'name', 'methodology', 'type', 'running'
    ];
}
