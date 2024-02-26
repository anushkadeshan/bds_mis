<?php

namespace App\Models\Program\Financial;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BudgetTracking extends Model
{
    use HasFactory;
    use LogsActivity;
    protected static $logOnlyDirty = true;

    public  $fillable = [
        'action', 'action_by', 'action_date', 'budget_id'
    ];

    protected static $logAttributes = [
        'action', 'action_by', 'action_date', 'budget_id'
    ];

    /**
     * Get all of the comments for the BudgetTracking
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class, 'id', 'action_by');
    }
}
