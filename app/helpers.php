<?php

if (!function_exists('route_class')) {
    function route_class()
    {
        return str_replace('.', '-', Route::currentRouteName());
    }
}

if (!function_exists('make_excerpt')) {
    function make_excerpt($text, $length = 200)
    {
        $excerpt = trim(preg_replace('/\r\n|\r|\n+/', '', strip_tags($text)));
        return \Str::limit($excerpt, $length);
    }
}
if (!function_exists('category_nav_active')) {
    function category_nav_active($category_id)
    {
        return active_class((if_route('categories.show') && if_route_param('category', $category_id)));
    }
}
