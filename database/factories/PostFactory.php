<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {

    return [
        'image' => '../../assets/img/advogados%20sobre%20nos-min.png',
        'title' => $faker->text(50),
        'text' => $faker->paragraphs(10, true),
        'datapost'=> $faker->date('Y-m-d','now'),
        'ativado' => $faker->boolean,
    ];
});
