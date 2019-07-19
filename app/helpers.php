<?php

if (!function_exists('route_class')) {
    function route_class()
    {
        return str_replace('.', '-', Route::currentRouteName());
    }
}

if (!function_exists('make_excerpt')) {
    function make_excerpt($text,$length=200)
    {
        $excerpt=trim(preg_replace('/\r\n|\r|\n+/','',strip_tags($text)));
        return \Str::limit($excerpt,$length);
    }
}
