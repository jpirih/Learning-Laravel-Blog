<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class SiteController extends Controller
{
    public function index(){
        Carbon::setLocale('sl');
        $danes = Carbon::today();


        $newPosts = DB::table('posts')->orderBy('created_at', 'desc')->take(3)->get();
        foreach ($newPosts as $item)
        {
            $item->created_at = strtotime($item->created_at);
            $item->created_at = date('d.M.Y H:i:s', $item->created_at);
            
        }

        return view('pages.index', ['newPosts' => $newPosts]);
    }

    public function about(){
        return view('pages.about');
    }

    public function contact(){
        return view('pages.contact');
    }

}
