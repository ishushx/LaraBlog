<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource('categories', 'CategoriesController');
    $router->resource('posts', 'PostsController');
    $router->resource('replies', 'RepliesController');
    $router->resource('tags', 'TagsController');
});
