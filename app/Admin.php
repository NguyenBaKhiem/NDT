<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Avatar;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin' ;
    protected $table = "admins";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar',
    ];
    /* setting avatar default */
    protected $appends = [
        'avatar_path'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAvatarPathAttribute()
    {

        $fullname = $this->attributes['name'];
        $name = explode(" ", $fullname);
        $len = count($name);
        $editname = substr($fullname, 0, 1)." ".$name[$len -1];

        if (empty($this->attributes['avatar'])) {
        return Avatar::create($editname)
        ->setDimension(100, 100)
        ->setFontSize(40)
        ->setShape('circle')
        ->toBase64();
    }

    return $this->attributes['avatar']; 
}
public function post()
{
    return $this->hasMany('App\Post', 'idAdmin', 'id');
}
//
}
