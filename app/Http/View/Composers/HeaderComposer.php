<?php

namespace App\Http\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class HeaderComposer
{

    protected $categories;


    public function __construct(Category $category)
    {
        $this->categories = $category->getAllCategories();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('categories', $this->categories);
    }
}
