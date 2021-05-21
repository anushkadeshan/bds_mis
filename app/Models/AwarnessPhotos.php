<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AwarnessPhotos extends Model
{
    use HasFactory;
    public $table = "awarness_photos";

    public $fillable = ['name','bd_id'];
}
