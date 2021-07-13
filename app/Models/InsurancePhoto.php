<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InsurancePhoto extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $fillable = ['name','i_id'];

}
