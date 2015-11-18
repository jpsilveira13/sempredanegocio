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

$factory->define(sempredanegocio\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'city' => $faker->city,
        'state' => $faker->word,
        'zipcode' => $faker->postcode


    ];
});


$factory->define(sempredanegocio\Models\Category::class, function (Faker\Generator $faker) {
    return[

        'name' => $faker->word
    ];
});

$factory->define(sempredanegocio\Models\SubCategory::class, function (Faker\Generator $faker) {
    return[

        'name' => $faker->word
    ];
});




