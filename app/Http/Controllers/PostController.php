<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    // obrazec za vnos objav
    public function writeNewPost(){
        $categories = Category::all();
        return view('pages.new_post', ['categories' => $categories]);
    }
    // funkcija saveNewPost shrani novo objavo v bazo podatkov

    /**
     * @return RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveNewPost(){
        $post = new Post;
        $title = Request::get('title');
        $content = Request::get('content');
        $post->title = $title;
        $post->content = $content;
        $post->save();

        $categories = Request::get('categories');
        // preveri ce je kategorija oznacena v spremenljivko sharni id od kategorije ki je oznacena
        if($categories != null){
            for($i = 0; $i < count($categories); $i++){
                $category = Category::find($categories[$i]);
                // poveze oznacene kategorije s tem dolocenim novim postom
                $category->posts()->attach($post->id);
            }
        }

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

        // shranimo post_id
        $comment->post_id = $post->id;
        $comment->save();

        return redirect('objava/'.$postId);


    }
}
