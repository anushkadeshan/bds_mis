<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IgPhotos extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = "ig_photos";

    public $fillable = ['name','ig_id'];
}
