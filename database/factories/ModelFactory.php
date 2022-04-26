<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$hasher = app(\Illuminate\Contracts\Hashing\Hasher::class);

$factory->define(Domain\Entities\User::class, function (Faker\Generator $faker) use($hasher){
    return [
        'username' => $faker->username,
        'email' => $faker->email,
        'password' => $hasher->make($faker->password(8,66)),
    ];
});
