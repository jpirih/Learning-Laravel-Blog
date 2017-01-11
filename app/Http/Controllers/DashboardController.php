<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Http\Helper;
use App\Post;
use Carbon\Carbon;



class DashboardController extends Controller
{
    // admin dashboard index
    public function dashboard(Helper $helper)
    {
        $recentPosts = Post::all()->sortByDesc('date_published')->take(3);
        $recentComments = Comment::all()->sortByDesc('created_at')->take(3);

        foreach ($recentPosts as $post){
            $post->date_published = $helper->slovenianDate($post->date_published);
        }

        $data = [
            'recentPosts' => $recentPosts,
            'recentComments' => $recentComments
        ];
        return view('admin.dashboard', $data);
    }

    // admin blog management page
    public function blogAdmin( Helper $helper)
    {
        $categories = Category::all();
        $posts = Post::all();

        foreach ($posts as $post)
        {
            $post->date_published = $helper->slovenianDate($post->date_published);
        }

        $data = ['categories' => $categories, 'posts' => $posts];
        return view('admin.blog', $data);
    }
}
