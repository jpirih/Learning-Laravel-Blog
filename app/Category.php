<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = ('categories');

    public function posts(){
        $this->belongsToMany('App\Post', 'categories_posts');
    }
}
