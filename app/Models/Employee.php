<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'gender', 'epf', 'title', 'full_name', 'calling_name', 'date_of_birth', 'branch', 'mobile_number', 'company'
    ];
}
