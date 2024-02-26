<?php

namespace App\Models\Program;

use App\Models\Cso;
use App\Models\LivelihoodFamily;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialSupport extends Model
{
    use HasFactory;
    public $fillable = [
        'beneficiary_id',
        'cso_id',
        'meterial_provided',
        'meterial_quantity',
        'completion_report_id',
    ];


    public function beneficiary()
    {
        return $this->hasOne(LivelihoodFamily::class, 'id','beneficiary_id');
    }

    public function cso()
    {
        return $this->hasOne(Cso::class, 'id','cso_id');
    }
}
