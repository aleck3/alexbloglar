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
    protected $casts = [
        'is_admin' => 'boolean',
    ];

    public function userdetails()
    {
        return $this->hasOne('App\Userdetails', 'id');
    }

    /**
     * Checking if the User is Admin
     */
    public function isAdmin()
    {
        if ($this->userdetails->role == 'admin') {
            return true;
        } else {
            return false;
        }
    }

}
