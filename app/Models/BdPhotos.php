<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BdPhotos extends Model
{
    use HasFactory;
    public $table = "bd_photos";

    public $fillable = ['name','bd_id'];
}
