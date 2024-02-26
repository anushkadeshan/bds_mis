<?php

namespace App\Models\skill;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LanguageYouth extends Model
{
    use HasFactory, LogsActivity;
    use SoftDeletes;
    public $timestamps = true;
    public $table = 'youth_languages';

    public $fillable = [
        'reading_tamil',
        'reading_sinhala',
        'reading_english',
        'writing_tamil',
        'writing_sinhala',
        'writing_english',
        'speaking_tamil',
        'speaking_sinhala',
        'speaking_english',
        'youth_id'
    ];

    protected static $logAttributes = [
        'reading_tamil',
        'reading_sinhala',
        'reading_english',
        'writing_tamil',
        'writing_sinhala',
        'writing_english',
        'speaking_tamil',
        'speaking_sinhala',
        'speaking_english',
        'youth_id'
    ];

    protected static $logOnlyDirty = true;
}
