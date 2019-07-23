<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Reply;
use App\Observers\CategoryObserver;
use App\Observers\PostObserver;
use App\Observers\ReplyObserver;
use Encore\Admin\Config\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Category::observe(CategoryObserver::class);
        Post::observe(PostObserver::class);
        Reply::observe(ReplyObserver::class);

        $table=config('admin.extensions.simditor.config.table','admin_config');
        if (Schema::hasTable($table)){
            Config::load();
        }

    }


}
