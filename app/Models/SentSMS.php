<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SentSMS extends Model
{
    use HasFactory;
    protected $table = 'sent_sms';

    public $receiver, $characters, $epf, $company, $branch, $response_id, $response_status, $response_data, $created_at, $updated_at;
}
