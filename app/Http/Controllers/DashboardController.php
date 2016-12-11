<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class DashboardController extends Controller
{
    // admin dashboard index
    public function dashboard()
    {
        $recentPosts = Post::all()->sortByDesc('date_published')->take(3);

        $recentComments = Comment::all()->sortByDesc('created_at')->take(3);


        $data = [
            'recentPosts' => $recentPosts,
            'recentComments' => $recentComments
        ];

        return view('admin.dashboard', $data);
    }

    // admin blog management page
    public function blogAdmin()
    {
        $categories = Category::all();
        $posts = Post::all();

        foreach ($posts as $post)
        {
            $post->date_published = Carbon::createFromTimestamp(strtotime($post->date_published));
        }

        $data = ['categories' => $categories, 'posts' => $posts];

        return view('admin.blog', $data);
    }
}
