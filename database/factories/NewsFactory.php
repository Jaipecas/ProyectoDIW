<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

/*
|--------------------------------------------------------------------------
| News Factories
|--------------------------------------------------------------------------
*/

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $created_at = $this->faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now');
        $expires_at = $this->faker->dateTimeBetween($startDate = 'now', $endDate = '2040-12-22')
                ->format('Y-m-d');

        return [
            'header' => $this->faker->sentence($nbWords = 8, $variableNbWords = true),
            'abstract' => $this->faker->text($maxNbChars = 800),
            'url' => $this->faker->url,
            'type' => $this->faker->randomElement(array ('notice', 'info')),
            'expires_at' => $expires_at, 
            'created_at' => $created_at,
            'updated_at' => $created_at
           
        ];
    }
}
