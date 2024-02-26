<?php

namespace App\Models;

use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Shetabit\Visitor\Traits\Visitor;


class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
    use SoftDeletes;
    use Visitor;
    protected $guard_name = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','active','phone','last_seen','reporting_to','subordinates', 'me_officers','branch_id','branches', 'dsds', 'gnds', 'home_lattitudes', 'home_longitudes', 'office_lattitudes', 'office_longitudes', 'is_boarded', 'bike_number'
    ];

    protected static $logAttributes = [
        'name', 'email', 'password','active','phone','last_seen','reporting_to','subordinates', 'me_officers', 'branch_id','branches', 'dsds', 'gnds', 'home_lattitudes', 'home_longitudes', 'office_lattitudes', 'office_longitudes', 'is_boarded', 'bike_number'
    ];

    protected static $logOnlyDirty = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',

    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];



    public function receivesBroadcastNotificationsOn() {
        return 'App.Models.User.'.$this->id;
    }

    public function getUserDsds(){
        if($this->dsds){
            $dsds = DsOffice::whereIn('id',json_decode($this->dsds))->pluck('name');
            return $dsds;
        }
        return [];

    }

    public function getUserGnds(){
        $gnds = GnOffice::whereIn('id',json_decode($this->gnds))->pluck('name');
        return $gnds;
    }
}
