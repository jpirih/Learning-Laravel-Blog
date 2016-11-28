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
    // blog manin page
    public function index()
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


        return view('pages.posts', ['posts' => $posts, 'newPosts' => $newPosts]);

    }
    // write new post
    public function create(){
        $categories = Category::all();
        return view('pages.new_post', ['categories' => $categories]);
    }
    

    // funkcija saveNewPost shrani novo objavo v bazo podatkov
    public function store(StorePostRequest $request ){
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
        return redirect(route('blog'))->with('status', 'Objava: '.$post->title.' je bila uspešno shranjena');
    }

    // podrobnosti posamezne objave
    public function show($id){

        $post = Post::find($id);
        Carbon::setLocale( "sl");
        $datum = strtotime($post->date_published);
        $post->date_published = date('d.M.Y', $datum);
        return view('pages.post_details', ['post' => $post]);
    }
    // edit post form
    public function edit($id){
        $post = Post::find($id);
        $categories = Category::all();
        return view('pages.edit_post', ['post' => $post, 'categories' => $categories]);
    }

    // save updated post
    public function update(StorePostRequest $request, $id){
        $post = Post::find($id);
        $title = $request->get('title');
        $content = $request->get('content');
        $categories = $request->get('categories');

        // deletes all categories and adds new ones
        $post->categories()->detach();
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

        return redirect(route('posts.show', ['id' => $id]))->with('status', 'Objava: '. $post->title. ' je bila spremenjena');
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
