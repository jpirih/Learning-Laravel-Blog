<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // table
    protected $table = 'posts';

    // one to many connection with table comments
    public function comments(){
        return $this->hasMany('App\Comment');
    }

    // many-to many connection with categories using categories_posts pivot table
    public function categories(){
        return $this->belongsToMany('App\Category', 'categories_posts');
    }

    // one-to-many connection with table users using user_id foreign key
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
