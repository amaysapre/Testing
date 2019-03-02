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
        'name', 'email', 'password','role_id','admin_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function devloper_task()
    {
        return $this->hasMany('App\Task','devloper_id','id');
    }

    public function manager_dev_list()
    {
        return $this->hasMany('App\User','admin_id','id');
    }

    public function manager()
    {
        return $this->belongsTo('App\User','admin_id','id');
    }
}
