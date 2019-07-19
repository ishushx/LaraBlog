<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        $posts=$category->posts->paginate('10');
        return view('categories.show',compact('posts'));
    }
}
