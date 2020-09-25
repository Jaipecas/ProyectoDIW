<?php

namespace Database\Factories;

use App\Models\Challenge;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Challenge Factories
|--------------------------------------------------------------------------
*/

class ChallengeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Challenge::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'language' => $this->faker->randomElement(array ('en', 'es')),
            'level' => $this->faker->randomElement(array (-5, -4, -3, -2, -1, 1, 2, 3, 4, 5, 10, 20, 30, 40, 50)),
        ];
    }

    /**
     * Estado para personalizar que un reto sea contra un usuario en concreto
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function againstUser()
    {
        return $this->state(function (array $attributes) {
            return [
                'opposing_player' => $this->faker->numberBetween(3, 20),
                'level' => '0', 
            ];
        });
    }

    /**
     * Estado para personalizar que un reto sea de nivel 0
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function level0()
    {
        return $this->state(function (array $attributes) {
            return [
                'level' => '0', 
            ];
        });
    }
}