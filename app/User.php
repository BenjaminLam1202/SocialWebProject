<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\BrNotification;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','title','des','url','username',
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

    public function posts()
    {
        return $this->hasMany(Post::class)->orderby('created_at','DESC');
    }
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
    public function reactions()
    {
        return $this->hasMany(Reaction::class)->orderby('created_at','DESC');
    }
    public function comment()
    {
        return $this->hasMany(Comments::class)->orderby('created_at','DESC');
    }
    public function followings()
    {
        return $this->belongsToMany(User::class, 'follower_users', 'follower_id', 'user_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follower_users', 'user_id', 'follower_id');
    }
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
    }
}