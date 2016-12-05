<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // table
    protected $table = 'comments';

    // one-to-many connection with table posts using post_id foreign key
    public function post(){
        return $this->belongsTo('App\Post');
    }

    // connection one-to-many with table users using user_id foreign key
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
