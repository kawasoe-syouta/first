<?php

use App\Models\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'user_id'        => $faker->randomDigit(),
        'name'           => $faker->name(),
        'message'        => $faker->text(),
        'created_at'     => $faker->datetime,
        'updated_at'     => $faker->datetime,
    ];
});
