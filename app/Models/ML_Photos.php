<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ML_Photos extends Model
{
    use HasFactory;

    public $table = "ml_photos";

    public $fillable = ['name','ml_id'];
}
