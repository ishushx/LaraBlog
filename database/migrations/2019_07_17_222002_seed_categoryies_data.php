<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoryiesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categories = [
            [
                'name' => '学习',
                'description' => '学习笔记,知识积累',
            ],
            [
                'name'=>'分享',
                'description'=>'分享创造,分享发现',
            ],
            [
                'name'=>'杂谈',
                'description'=>'趣味杂谈,有趣分享'
            ],
            [
                'name'=>'Laravel',
                'description'=>'Laravel 相关,Composer 包分享'
            ]
        ];

        DB::table('categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('categories')->truncate();
    }
}
