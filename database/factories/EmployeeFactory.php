<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use App\Company;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'id' => $faker->randomDigit,
        'company_id' => factory(Company::class),
        'full_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address,
        'city' => $faker->city,
        'state' => $faker->state,
        'zip_code' => Str::random(5),
        'country' => $faker->country,
        'position' => Str::random(15),
        'department' => Str::random(10),
        'yearly_salary' => $faker->randomFloat(2),
    ];
});
