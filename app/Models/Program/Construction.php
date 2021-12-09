<?php

namespace App\Models\Program;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Construction extends Model
{
    use HasFactory;

    public $fillable = [
        'type_of_construction',
        'target_group',
        'selected_target_group',
        'individual_id',
        'current_status',
        'remarks',
        'completion_report_id',
    ];
}
