<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    // fetch users id
    $users = App\User::pluck('id')->toArray();
    return [
        'post_author' => $faker->randomElement($users),
        'post_date' => new DateTime(),
        'post_content' => $faker->paragraph(),
        'post_title' => $faker->sentence(),
        'post_name' => $faker->word(),
        'post_type' => 'article',
        'post_status' => $faker->word(),
        'post_category' => $faker->word(),
    ];
});
