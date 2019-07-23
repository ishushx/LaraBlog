<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(Post $post)
    {
        $posts = Post::with('category','tags')->orderBy('created_at', 'desc')->paginate('10');
        $hot_posts=$post->getHotPosts();
        $tags=Tag::all();
        return view('posts.index', compact('posts','hot_posts','tags'));
    }

    public function show(Post $post, Request $request)
    {
        // URL 矫正
        if (!empty($post->slug) && $post->slug != $request->slug) {
            return redirect($post->link(), 301);
        }
        //查看次数统计
        $post->visits()->increment();

        //上一篇下一篇
        $id = $post->id;
        $previousID = Post::where('id', '<', $id)->max('id');
        $nextID = Post::where('id', '>', $id)->min('id');

        $replies = $post->replies()->orderBy('created_at', 'desc')->get();
        return view('posts.show', compact('post', 'replies', 'previousID', 'nextID'));
    }

    public function search(Request $request)
    {
        $keyword=$request->input('keyword');
        $posts=Post::search($keyword)->paginate(8);
        return view('posts.search',compact('posts','keyword'));
    }
}
