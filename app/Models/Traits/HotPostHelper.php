<?php

namespace App\Models\Traits;

use App\Models\Reply;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;

trait HotPostHelper
{
    /**
     * 临时存放文章数据
     * @var array
     */
    protected $posts = [];

    /**
     * 浏览数权重
     * @var int
     */
    protected $view_weight = 2;
    /**
     * 回复数权重
     * @var int
     */
    protected $reply_weight = 1;
    /**
     * 选取过去几天内的数据
     * @var int
     */
    protected $pass_days = 7;
    /**
     * 选取文章条数
     * @var int
     */
    protected $post_number = 8;

    /**
     * 缓存 key
     * @var string
     */
    protected $cache_key = 'blog_hot_posts';
    /**
     * 缓存过期时间
     * @var float|int
     */
    protected $cache_expire_in_seconds = 65 * 60;

    /**
     * 获取热门文章
     * @return mixed
     */
    public function getHotPosts()
    {
        return \Cache::remember($this->cache_key, $this->cache_expire_in_seconds, function () {
            return $this->calculateHotPosts();
        });
    }

    /**
     *获取热门文章并加以缓存,用于计划任务
     */
    public function calculateAndCacheHotPosts()
    {
        $hot_posts = $this->calculateHotPosts();

        $this->cacheHotPosts($hot_posts);
    }

    /**
     * 计算热门文章
     * @return \Illuminate\Support\Collection
     */
    public function calculateHotPosts()
    {
        $this->calculateViewScore();
        $this->calculateReplyScore();

        $posts = \Arr::sort($this->posts, function ($post) {
            return $post['score'];
        });

        $posts = array_reverse($posts, true);

        $posts = array_slice($posts, 0, $this->post_number, true);

        $hot_posts = collect();
        foreach ($posts as $post_id => $post) {
            $post = $this->find($post_id);
            if ($post) {
                $hot_posts->push($post);
            }
        }

        return $hot_posts;
    }

    /**
     *计算阅览分数
     */
    public function calculateViewScore()
    {
        $redis = Redis::connection('laravel-visits');
        $max = \DB::table('posts')->max('id');
        $view_posts = $redis->zrevrangebyscore('laravel_blog_database_visits:posts_visits', $max, 1, array('withscores' => true));

        foreach ($view_posts as $post_id => $post_view_count) {
            $view_score = $post_view_count * $this->view_weight;
            $this->posts[$post_id]['score'] = $view_score;
        };
    }

    /**
     *计算回复分数
     */
    public function calculateReplyScore()
    {
        $reply_posts = Reply::query()->select(\DB::raw('post_id, count(*) as reply_count'))
            ->where('created_at', '>', Carbon::now()->subDays($this->pass_days))
            ->groupBy('post_id')
            ->get();

        foreach ($reply_posts as $value) {
            $reply_score = $value->reply_count * $this->reply_weight;
            if (isset($this->posts[$value->post_id])) {
                $this->posts[$value->post_id]['score'] += $reply_score;
            } else {
                $this->posts[$value->post_id]['score'] = $reply_score;
            }
        }
    }

    /**
     * 缓存热门文章
     * @param $hot_posts
     */
    public function cacheHotPosts($hot_posts)
    {
        \Cache::put($this->cache_key, $hot_posts, $this->cache_expire_in_seconds);
    }

}
