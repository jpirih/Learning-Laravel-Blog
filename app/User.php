<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    // one-to-many connection with table posts
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    // one-to many-connection with table comments
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    // many-to-many-connection with table roles
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'roles_users', 'user_id', 'role_id');
    }

    public function hasAnyRole ($roles)
    {
        if(is_array($roles))
        {
            foreach($roles as $role)
            {
                if($this->hasRole($role))
                {
                    return true;
                }
            }
        }
        else
        {
            if($this->hasRole($roles))
            {
                return true;
            }
        }
        return false;

    }

    public function hasRole($role)
    {
        if($this->roles()->where('name', $role)->first())
        {
            return true;
        }
        return false;
    }
}
