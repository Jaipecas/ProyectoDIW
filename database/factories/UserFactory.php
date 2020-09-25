<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| User Factories
|--------------------------------------------------------------------------
*/

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => Str::random(10),
            'country' => $this->faker->countryCode,
            'favourite_language' => $this->faker->randomElement(array ('es', 'en')),
            'state' => $this->faker->randomElement(array ('offline', 'online'))
        ];
    }


    /**
    * Estado para personalizar que un usuario esté desactivado
    *
    * @return \Illuminate\Database\Eloquent\Factories\Factory
    */
    public function disabled()
    {
        return $this->state(function (array $attributes) {
            return [
                'state' => 'disable',
            ];
        });
    }
}
