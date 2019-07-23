<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category,Post $post)
    {
        $posts=$category->posts()->orderBy('created_at','desc')->paginate('10');
        $hot_posts = $post->getHotPosts();
        $tags = Tag::all();
        session()->flash('info',$category->description);
        return view('posts.index',compact('posts','hot_posts','tags'));
    }
}
