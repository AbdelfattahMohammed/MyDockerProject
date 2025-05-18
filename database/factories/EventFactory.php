<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition()
    {
        return [
            'event_name' => $this->faker->sentence(3), // Generates a random event name
            'event_date' => $this->faker->date(), // Generates a random date
            'event_location' => $this->faker->city(), // Generates a random city name
        ];
    }
}
