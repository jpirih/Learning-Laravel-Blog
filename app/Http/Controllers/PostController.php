<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    // obrazec za vnos objav
    public function writeNewPost(){

        return view('pages.new_post');
    }
    // funkcija saveNewPost shrani novo objavo v bazo podatkov

    public function saveNewPost(){
        $post = new Post();
        $title = Request::get('title');
        $content = Request::get('content');

        $post->title = $title;
        $post->content = $content;

        $post->save();
        return redirect('/');

        //return 'Objava za naslvom: '.$post->title. 'je bila uspešno shranjena :) ';
    }

    // podrobnosti posamezne objave
    public function postDetails($id){
        $post = Post::find($id);
        return view('pages.post_details', ['post' => $post]);
    }
    // pregled vseh objav - tabela
    public function allPosts(){
        $posts = Post::all();
        return view('pages.posts_dashboard', ['posts' => $posts]);
    }

    public function saveComment($postId){
        // pridobi podatke iz baze za posmezen post
        $post = Post::find($postId);

        $comment = new Comment;
        $comment->post_id = $postId;
        $comment->name = Request::get('name');
        $comment->body = Request::get('body');

        // shranimo post_icd

        $comment->post_id = $post->id;
        $comment->save();

        return redirect('objava/'.$postId);


    }
}
