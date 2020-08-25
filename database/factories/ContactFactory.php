<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'company' => $faker->name,
        'birth_day' => '10-10-2018',
        'user_id' => $faker->uuid
    ];
});
