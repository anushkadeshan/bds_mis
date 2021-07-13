<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AwarnessPhotos extends Model
{
    use HasFactory;
    public $table = "awarness_photos";
    use SoftDeletes;
    public $fillable = ['name','bd_id'];
}
