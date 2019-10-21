<?php

namespace App\Models\User;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $append = [
        'full_name',
    ];

    
    public function orders()
    {
        return $this->hasMany('App\Models\Order\Order');
    }
    public function activeOrders()
    {
        return $this->hasMany('App\Models\Order\Order')->where('status','!=',4);
    }
    public function oldOrders()
    {
        return $this->hasMany('App\Models\Order\Order')->where('status',4);
    }


    //getters
    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }
}
