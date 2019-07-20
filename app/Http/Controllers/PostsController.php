<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts=Post::with('category')->orderBy('created_at','desc')->paginate('10');
        return view('posts.index',compact('posts'));
    }

    public function show(Post $post,Request $request)
    {
        // URL 矫正
        if ( ! empty($post->slug) && $post->slug != $request->slug) {
            return redirect($post->link(), 301);
        }
        //查看次数统计
        $post->visits()->increment();
        //
        $replies=$post->replies()->orderBy('created_at','desc')->get();
        return view('posts.show',compact('post','replies'));
    }
}