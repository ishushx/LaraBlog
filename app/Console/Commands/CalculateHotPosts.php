<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class CalculateHotPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:calculate-hot-posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '生成热门文章';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Post $post)
    {
        $this->info('开始计算...');
        $post->calculateAndCacheHotPosts();
        $this->info('成功生成');
    }
}
