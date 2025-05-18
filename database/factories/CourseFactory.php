<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;
use App\Models\Department;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        return [
            'course_name' => $this->faker->sentence(3), // Generates a random course name
            'department_id' => Department::inRandomOrder()->first()->department_id ?? Department::factory(),
        ];
    }
}
