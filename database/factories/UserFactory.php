<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| User Factories
|--------------------------------------------------------------------------
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'country' => $faker->countryCode,
        'favourite_language' => $faker->randomElement(array ('es', 'en')),
        'state' => $faker->randomElement(array ('offline', 'online'))
    ];
});

/**
 * Estado para personalizar que un usuario esté desactivado
 */
$factory->state(App\User::class, 'disable', [
    'state' => 'disable',
]);
