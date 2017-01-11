<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Helper;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StorePostRequest;
use App\Post;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // blog manin page
    public function index(Helper $helper)
    {
        // date time options
        Carbon::setLocale('sl');
        $danes = Carbon::today();

        // posts from  database
        $posts = Post::where('date_published', '<=', $danes)->orderBy('created_at', 'desc')->paginate(3);

        foreach ($posts as $post)
            if(gettype($post->date_published) == "string")
            {
                $post->date_published = $helper->slovenianDate($post->date_published);
            }
            else
            {
                $post->date_published = date('d.M.Y', $post->date_published);
            }

        $newPosts = Post::orderBy('created_at', 'desc')->take(3)->get();
        return view('blog.posts', ['posts' => $posts, 'newPosts' => $newPosts]);
    }
    // write new post
    public function create(){
        $categories = Category::all();
        return view('blog.new_post', ['categories' => $categories]);
    }


    // funkcija saveNewPost shrani novo objavo v bazo podatkov
    public function store(StorePostRequest $request ){
        $userId = Auth::user()->id;
        $post = new Post;
        $datePublished = $request->get('date_published');
        // pretvri tekst v datum 
         $datePublished = strtotime($datePublished);
        $date= date('Y-m-d', $datePublished);
        // shranjevanje podatkov 
        $title = $request->get('title');
        $content = $request->get('content');
        $post->title = $title;
        $post->body = $content;
        $post->date_published = $date;
        $post->user_id = $userId;
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
        return view('blog.post_details', ['post' => $post]);
    }
    // edit post form
    public function edit($id, Helper $helper){
        $post = Post::find($id);
        $categories = Category::all();

        if(($helper->thisUser($post->user_id)) || ($helper->isAdmin($post->user_id)))
        {
            $user = User::find($post->user_id);
            return view('blog.edit_post', ['post' => $post, 'categories' => $categories, 'user' => $user]);
        }

        return redirect()->route('login')->with('status', 'Objave na blogu lahko ureja samo Avtor ali adminstrator.');
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
        $post->body = $content;
        $post->save();
        return redirect(route('posts.show', ['id' => $id]))->with('status', 'Objava: '. $post->title. ' je bila spremenjena');
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
