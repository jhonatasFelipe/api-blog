<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'id_post'=> rand(1,8),
        'id_tag' => rand(1,4),
    ];
});
