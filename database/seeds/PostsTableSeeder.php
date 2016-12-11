<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fistPost = new Post();
        $fistPost->title = "Semple post 1";
        $fistPost->body = "This is first test post";
        $fistPost->user_id = 1;
        $fistPost->save();

        $secondPost = new Post();
        $secondPost->title = "Semple post 2";
        $secondPost->body = "This is second test post";
        $secondPost->user_id = 1;
        $secondPost->save();

        $thirdPost = new Post();
        $thirdPost->title = "Semple post 3";
        $thirdPost->body = "This is third test post";
        $thirdPost->user_id = 1;
        $thirdPost->save();
    }
}
