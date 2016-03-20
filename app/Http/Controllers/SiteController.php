<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function index(){
        Carbon::setLocale('sl');
        $danes = Carbon::today();
        $posts = DB::table('posts')->where('date_published', '<=', $danes)
            ->orderBy('created_at', 'desc')->paginate(3);
        foreach ($posts as $post)
            if(gettype($post->date_published) == "string")
            {
                $post->date_published = strtotime($post->date_published);
                $post->date_published = date('d.M.Y', $post->date_published);
            }
            else
            {
                $post->date_published = date('d.M.Y', $post->date_published);
            }

        $newPosts = DB::table('posts')->orderBy('created_at', 'desc')->take(3)->get();
        foreach ($newPosts as $item)
        {
            $item->created_at = strtotime($item->created_at);
            $item->created_at = date('d.M.Y H:i:s', $item->created_at);
            
        }

        return view('pages.index', ['posts' => $posts, 'newPosts' => $newPosts]);
    }

    public function about(){
        return view('pages.about');
    }

    public function contact(){
        return view('pages.contact');
    }
}
