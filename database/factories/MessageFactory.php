<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Message;
use Faker\Generator as Faker;


$factory->define(Message::class, function (Faker $faker) {
    return [
        'channel_id' => 4,
        'author_username' => $faker->name,
        'message' => $faker->paragraph,
    ];
});