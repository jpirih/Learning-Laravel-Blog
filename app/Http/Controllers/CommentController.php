<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\StoreCommenttRequest;
use App\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // list of all comments
    public function comments()
    {
        $comments = Comment::orderBy('created_at', 'desc')->get();

        return view('blog.comments', ['comments' => $comments]);
    }

    // save comment to dadabase
    public function store( StoreCommenttRequest $request, $postId){
        $userId = Auth::user()->id;
        // pridobi podatke iz baze za posmezen post
        $post = Post::find($postId);

        $comment = new Comment;
        $comment->post_id = $postId;
        $comment->name = $request->get('name');
        $comment->body = $request->get('body');
        $comment->user_id = $userId;
        // shranimo povezavo coment - post preko post_id
        $comment->post_id = $post->id;
        $comment->save();

        return redirect(route('posts.show', ['id' => $postId]))->with('status', 'Komentar je bil usepšno shranjen');
    }

}
