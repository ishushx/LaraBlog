<?php

namespace App\Observers;

use App\Handlers\SlugTranslateHandler;
use App\Jobs\TranslateSlug;
use App\Models\Post;

class PostObserver
{
    public function saving(Post $post)
    {
        $post->excerpt = make_excerpt($post->content);
    }

    public function saved(Post $post)
    {
        // 如 slug 字段无内容，即使用翻译器对 title 进行翻译
        if ( ! $post->slug) {
            dispatch(new TranslateSlug($post));
        }
    }
}
