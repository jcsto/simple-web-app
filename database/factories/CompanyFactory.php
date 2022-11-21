<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'id' => $faker->randomDigit,
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address,
        'city' => $faker->city,
        'state' => $faker->state,
        'zip_code' => Str::random(5),
        'country' => $faker->country,
    ];
});
