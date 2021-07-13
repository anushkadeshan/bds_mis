<?php

namespace App\Models\bss;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pyament
 * @package App\Models
 * @version November 27, 2020, 8:55 am UTC
 *
 * @property number $scholar_amount
 * @property integer $payment_start_year
 * @property string $payment_start_month
 * @property boolean $renewal_document
 * @property string $reason_for_dropouts
 * @property integer $p_status
 * @property integer $finished_year
 * @property integer $student_id
 * @property integer $user_id
 */
class Pyament extends Model
{

    public $table = 'payment_details';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    use LogsActivity;
    use SoftDeletes;


    protected static $logAttributes = [
        'scholar_amount',
        'payment_start_year',
        'payment_start_month',
        'renewal_document',
        'reason_for_dropouts',
        'p_status',
        'finished_year',
        'student_id',
        'user_id',
        'payment_end_month',
        'bank_name',
        'bank_account_holder',
        'bank_account_number',
        'branch_name',
        'branch_code',
    ];

    protected static $logOnlyDirty = true;


    public $fillable = [
        'scholar_amount',
        'payment_start_year',
        'payment_start_month',
        'renewal_document',
        'reason_for_dropouts',
        'p_status',
        'finished_year',
        'student_id',
        'user_id',
        'payment_end_month',
        'bank_name',
        'bank_account_holder',
        'bank_account_number',
        'branch_name',
        'branch_code',

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'scholar_amount' => 'float',
        'payment_start_year' => 'integer',
        'payment_start_month' => 'string',
        'renewal_document' => 'boolean',
        'reason_for_dropouts' => 'string',
        'p_status' => 'integer',
        'finished_year' => 'integer',
        'student_id' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'scholar_amount' => 'required|numeric',
        'payment_start_year' => 'required|integer',
        'payment_start_month' => 'required|string|max:50',
        'renewal_document' => 'required|boolean',
        'reason_for_dropouts' => 'nullable|string|max:500',
        'p_status' => 'required|integer',
        'finished_year' => 'required|integer',
        'student_id' => 'required',
        'user_id' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'payment_end_month' => 'nullable|string',
        'bank_name' => 'nullable|string',
        'bank_account_holder' => 'nullable|string',
        'bank_account_number' => 'nullable|string'
    ];


}
