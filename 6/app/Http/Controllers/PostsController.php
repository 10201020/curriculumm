<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Follower;

class PostsController extends Controller
{
    public function index(Post $post, Follower $follower)
    {
        $user = auth()->user();
        $follow_ids = $follower->followingIds($user->id);
        // followed_idだけ抜き出す
        $following_ids = $follow_ids->pluck('followed_id')->toArray();

        $timelines = $post->getTimelines($user->id, $following_ids);

        return view('posts.index', [
            'user'      => $user,
            'timelines' => $timelines
        ]);
    }
    public function show(Post $post, Comment $comment)
    {
        $user = auth()->user();
        $post = $post->getPost($post->id);
        $comments = $comment->getComments($post->id);

        return view('posts.show', [
            'user'     => $user,
            'post' => $post,
            'comments' => $comments
        ]);
    }

    public function create()
    {
        $user = auth()->user();

        return view('posts.create', [
            'user' => $user
        ]);
    }
    public function store(Request $request, Post $post)
    {
        $user = auth()->user();
        $data = $request->all();
        $validator = Validator::make($data, [
            'body' => ['required', 'string', 'max:140']
        ]);

        $validator->validate();
        $post->postStore($user->id, $data);

        return redirect('posts');
    }
    public function edit(Post $post)
    {
        $user = auth()->user();
        $posts = $post->getEditPost($user->id, $post->id);

        if (!isset($posts)) {
            return redirect('posts');
        }

        return view('posts.edit', [
            'user'   => $user,
            'posts' => $posts
        ]);
    }
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'body' => ['required', 'string', 'max:140']
        ]);

        $validator->validate();
        $post->postUpdate($post->id, $data);

        return redirect('posts');
    }
    public function destroy(Post $post)
    {
        $user = auth()->user();
        $post->postDestroy($user->id, $post->id);

        return back();
    }
}