<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Notification Factories
|--------------------------------------------------------------------------
*/

$factory->define(App\Notification::class, function (Faker $faker) {
    return [
        'state' => $faker->randomElement(array ('unread', 'read', 'delete')),
        'type' => $faker->randomElement(array ('info', 'warning', 'important')),
        'notification' => $faker->text,
    ];
});