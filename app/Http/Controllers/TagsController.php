<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index($id, Post $post)
    {
        $posts = Tag::findorFail($id)->posts()->orderBy('created_at','desc')->paginate('10');
        $hot_posts = $post->getHotPosts();
        $tags = Tag::all();
        return view('posts.index', compact('posts', 'hot_posts', 'tags'));
    }
}
