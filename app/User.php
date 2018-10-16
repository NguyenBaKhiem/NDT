<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Avatar;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "users";
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
        if (empty($this->attributes['avatar'])) {
            return Avatar::create($this->attributes['name'])
            ->setDimension(50, 50)
            ->setFontSize(20)
            ->setShape('square')
            ->toBase64();
        }

        return $this->attributes['avatar']; 
    }

    public function question()
    {
        return $this->hasMany('App\Question', 'idUser', 'id');

    }
    public function support()
    {
        return $this->hasMany('App\Question', 'idUser', 'id');

    }
    public function questioncomment()
    {
        return $this->hasMany('App\Questioncomment', 'idUser', 'id');
        
    }
    public function questionlike()
    {
        return $this->hasMany('App\Questionlike', 'idUser', 'id');
        
    }
    public function commentquestion()
    {
        return $this->hasManyThrough('App\Questioncomment', 'App\Question', 'idQuestion', 'idUser', 'id');
    }
    public function likequestion()
    {
        return $this->hasManyThrough('App\Questionlike', 'App\Question', 'idQuestion', 'idUser', 'id');
    }
}
