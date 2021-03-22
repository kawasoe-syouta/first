<?php

use App\Models\DailyReport;
use Faker\Generator as Faker;

$factory->define(DailyReport::class, function (Faker $faker) {
    return [
        'user_id'        => $faker->randomDigit(),
        'title'          => $faker->title(),
        'contents'       => $faker->text(),
        'reporting_time' => $faker->datetime,
        'created_at'     => $faker->datetime,
        'updated_at'     => $faker->datetime,
    ];
});
