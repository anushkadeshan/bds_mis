<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EconomicCrisis extends Model
{
    use HasFactory;

    public $fillable = [
       'livelihood_family_id', 'money_order_scanned_copy', 'money_order_offer_picture'
    ];
}
