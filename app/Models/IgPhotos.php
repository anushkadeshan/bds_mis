<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IgPhotos extends Model
{
    use HasFactory;
    public $table = "ig_photos";

    public $fillable = ['name','ig_id'];
}
