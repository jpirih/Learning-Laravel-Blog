<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use Carbon\Carbon;
use Faker\Provider\zh_TW\DateTime;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Jenssegers\Date\Date;

class PostController extends Controller
{
    // obrazec za vnos objav
    // zraven posljem podatke o kategorijah, ki jih lahko zbiras
    public function writeNewPost(){
        $categories = Category::all();
        return view('pages.new_post', ['categories' => $categories]);
    }

    /**
     * @return RedirectResponse|\Illuminate\Routing\Redirector
     */
    // funkcija saveNewPost shrani novo objavo v bazo podatkov
    public function saveNewPost(){
        $post = new Post;
        $datePublished = Request::get('date_published');
        // pretvri tekst v datum 
         $datePublished = strtotime($datePublished);
        $date= date('Y-m-d', $datePublished);
        // shranjevanje podatkov 
        $title = Request::get('title');
        $content = Request::get('content');
        $post->title = $title;
        $post->content = $content;
        $post->date_published = $date;
        $post->save();
        
        // post je treba najprej shraniti da ima svoj id sele potem povezujem kategorije
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
    }

    // podrobnosti posamezne objave
    public function postDetails($id){

        $post = Post::find($id);
        Carbon::setLocale( "sl");
        $datum = strtotime($post->date_published);
        $post->date_published = date('d.M.Y', $datum);
        return view('pages.post_details', ['post' => $post]);
    }
    public function editPost($id){
        $post = Post::find($id);
        $categories = Category::all();
        return view('pages.edit_post', ['post' => $post, 'categories' => $categories]);
    }

    // urejanje objav update_post
    public function updatePost($id){
        $post = Post::find($id);
        $title = Request::get('title');
        $content = Request::get('content');
        $categories = Request::get('categories');


        // Ce oznacis kategorije jih doda k prejsnjim
        if($categories != null){
            for($i = 0; $i < count($categories); $i++){
                $category = Category::find($categories[$i]);
                $category->posts()->attach($post->id);
            }
        }
        // post update
        $post->title = $title;
        $post->content = $content;
        $post->save();

        return redirect('/');
    }



    public function saveComment($postId){
        // pridobi podatke iz baze za posmezen post
        $post = Post::find($postId);

        $comment = new Comment;
        $comment->post_id = $postId;
        $comment->name = Request::get('name');
        $comment->body = Request::get('body');

        // shranimo povezavo coment - post preko post_id
        $comment->post_id = $post->id;
        $comment->save();

        return redirect('objava/'.$postId);
    }

    // pregled vseh objav - tabela
    public function allPosts(){
        Carbon::setLocale('sl');
        $posts = Post::all();

        foreach ($posts as $post)
        {
            $date = strtotime($post->date_published);
            $post->date_published = date('d.M.Y', $date);
        }

        $categories = Category::all();
        return view('pages.posts_dashboard', ['posts' => $posts, 'categories' => $categories]);
    }

    // funkcija za dodajanje novih kategorij - na dashbordu
    public function saveCategory(){
        $category = new Category;

        $name = Request::get('category_name');
        $category->name = $name;
        $category->save();

        return redirect(route('dashboard'));
    }
}
