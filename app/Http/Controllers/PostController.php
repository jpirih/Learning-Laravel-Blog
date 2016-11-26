<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StoreCommenttRequest;
use App\Http\Requests\StorePostRequest;
use App\Post;
use Carbon\Carbon;
use Faker\Provider\zh_TW\DateTime;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{

    // blog main page
    /**
     * PostController constructor.
     */


    public function posts()
    {

        Carbon::setLocale('sl');
        $danes = Carbon::today();

        // posts from  database
        $posts = Post::where('date_published', '<=', $danes)->orderBy('created_at', 'desc')->paginate(3);

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

        $newPosts = Post::orderBy('created_at', 'desc')->take(3)->get();


        return view('pages.posts', ['posts' => $posts, 'newPosts' => $newPosts, 'user' => $user]);
    }

    // obrazec za vnos objav
    // zraven posljem podatke o kategorijah, ki jih lahko zbiras
    public function writeNewPost(){
        $categories = Category::all();
        return view('pages.new_post', ['categories' => $categories]);
    }
    

    // funkcija saveNewPost shrani novo objavo v bazo podatkov
    public function saveNewPost(StorePostRequest $request ){
        $post = new Post;
        $datePublished = $request->get('date_published');
        // pretvri tekst v datum 
         $datePublished = strtotime($datePublished);
        $date= date('Y-m-d', $datePublished);
        // shranjevanje podatkov 
        $title = $request->get('title');
        $content = $request->get('content');
        $post->title = $title;
        $post->content = $content;
        $post->date_published = $date;
        $post->save();
        
        // post je treba najprej shraniti da ima svoj id sele potem povezujem kategorije
        $categories = $request->get('categories');
        // preveri ce je kategorija oznacena v spremenljivko sharni id od kategorije ki je oznacena
        if($categories != null){
            for($i = 0; $i < count($categories); $i++){
                $category = Category::find($categories[$i]);
                // poveze oznacene kategorije s tem dolocenim novim postom
                $category->posts()->attach($post->id);
            }
        }
        return redirect('/')->with('status', 'Objava: '.$post->title.' je bila uspešno shranjena');
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
    public function updatePost(StorePostRequest $request, $id){
        $post = Post::find($id);
        $title = $request->get('title');
        $content = $request->get('content');
        $categories = $request->get('categories');

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

        return redirect(route('details', ['id' => $id]))->with('status', 'Objava: '. $post->title. ' je bila spremenjena');
    }


    public function saveComment( StoreCommenttRequest $request, $postId){
        // pridobi podatke iz baze za posmezen post
        $post = Post::find($postId);

        $comment = new Comment;
        $comment->post_id = $postId;
        $comment->name = $request->get('name');
        $comment->body = $request->get('body');

        // shranimo povezavo coment - post preko post_id
        $comment->post_id = $post->id;
        $comment->save();

        return redirect(route('details', ['id' => $postId]))->with('status', 'Komentar je bil usepšno shranjen');
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
    public function saveCategory(StoreCategoryRequest $request){
        $category = new Category;

        $name = $request->get('category_name');
        $category->name = $name;
        $category->save();

        return redirect(route('dashboard'));
    }
}
