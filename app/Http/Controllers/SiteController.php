<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function index(){
        $posts = DB::table('posts')->orderBy('created_at', 'desc')->get();

        $newPosts = DB::table('posts')->orderBy('created_at', 'desc')->take(3)->get();
        return view('pages.index', ['posts' => $posts, 'newPosts' => $newPosts]);
    }

    public function about(){
        return view('pages.about');
    }

    public function contact(){
        return view('pages.contact');
    }
}
