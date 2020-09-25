<?php

namespace Database\Factories;

use App\Models\Notification;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Notification Factories
|--------------------------------------------------------------------------
*/

class NotificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Notification::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'state' => $this->faker->randomElement(array ('unread', 'read', 'delete')),
            'type' => $this->faker->randomElement(array ('info', 'warning', 'important')),
            'notification' => $this->faker->text,
        ];
    }
}

