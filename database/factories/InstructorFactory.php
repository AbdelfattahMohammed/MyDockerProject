<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Instructor;
use App\Models\Department;
use App\Models\Course;

class InstructorFactory extends Factory
{
    protected $model = Instructor::class;

    public function definition()
    {
        return [
            'full_name' => $this->faker->name(),
            'department_id' => Department::inRandomOrder()->first()->department_id ?? Department::factory(),
            'course_id' => Course::inRandomOrder()->first()->course_id ?? Course::factory(),
        ];
    }
}
