<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','verified','provider', 'provider_id','phone','banned'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function phones()
    {
        return $this->hasMany(Phone::class);
    }

    public function passwordSecurity()
    {
        return $this->hasOne(PasswordSecurity::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function bids()
    {
        return $this->hasMany(Bid::class);
    }

    public function verifyUser()
    {
        return $this->hasOne('App\VerifyUser');
    }

    public function routeNotificationForSlack()
    {
        return 'https://hooks.slack.com/services/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';
    }
}
