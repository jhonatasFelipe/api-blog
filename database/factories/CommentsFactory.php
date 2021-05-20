<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'name'=> $faker->name,
        'email' => $faker->email,
        'body' => $faker->text(200),
        'liberado'=> $faker->boolean,
    ];
});
