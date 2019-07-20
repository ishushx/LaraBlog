<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Reply;
use Faker\Generator as Faker;

$factory->define(Reply::class, function (Faker $faker) {
    $updated_at=$faker->dateTimeThisMonth();
    $created_at=$faker->dateTimeThisMonth($updated_at);
    $post_ids=\App\Models\Post::all()->pluck('id')->toArray();

    return [
        'name'=>$faker->name,
        'email'=>$faker->safeEmail,
        'content'=>$faker->text,
        'post_id'=>$faker->randomElement($post_ids),
        'created_at'=>$created_at,
        'updated_at'=>$updated_at,
    ];
});
