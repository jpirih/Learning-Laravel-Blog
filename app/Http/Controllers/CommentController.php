<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\StoreCommenttRequest;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class CommentController extends Controller
{
    public function store( StoreCommenttRequest $request, $postId){
        // pridobi podatke iz baze za posmezen post
        $post = Post::find($postId);

        $comment = new Comment;
        $comment->post_id = $postId;
        $comment->name = $request->get('name');
        $comment->body = $request->get('body');

        // shranimo povezavo coment - post preko post_id
        $comment->post_id = $post->id;
        $comment->save();

        return redirect(route('posts.show', ['id' => $postId]))->with('status', 'Komentar je bil usepšno shranjen');
    }
}
