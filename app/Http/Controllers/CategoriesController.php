<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        $posts=$category->posts()->orderBy('created_at','desc')->paginate('10');
        session()->flash('info',$category->description);
        return view('posts.index',compact('posts'));
    }
}
