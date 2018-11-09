<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Challenge Factories
|--------------------------------------------------------------------------
*/

$factory->define(App\Challenge::class, function (Faker $faker) {    
    return [
        'language' => $faker->randomElement(array ('en', 'es')),
        'level' => $faker->randomElement(array (-5, -4, -3, -2, -1, 1, 2, 3, 4, 5, 10, 20, 30, 40, 50)),
    ];
});

/**
 * Estado para personalizar que un reto sea contra un usuario en concreto
 */
$factory->state(App\Challenge::class, 'against_user', function (Faker $faker) { 
    return [
        'opposing_player' => $faker->numberBetween(3, 20),
        'level' => '0', 
    ];
});

/**
 * Estado para personalizar que un reto sea de nivel 0
 */
$factory->state(App\Challenge::class, 'level_0', function (Faker $faker) { 
    return [
        'level' => '0', 
    ];
});