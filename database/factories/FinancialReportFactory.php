<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\FinancialReport;
use App\Models\Event;

class FinancialReportFactory extends Factory
{
    protected $model = FinancialReport::class;

    public function definition()
    {
        return [
            'event_id' => Event::inRandomOrder()->value('event_id') ?? Event::factory(),
            'revenue' => $this->faker->randomFloat(2, 1000, 50000),
            'expenses' => $this->faker->randomFloat(2, 500, 30000),
            'total_budget' => $this->faker->randomFloat(2, 1000, 100000),
            'report_date' => $this->faker->date(),
        ];
    }
}
