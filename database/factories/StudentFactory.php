<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;
use App\Models\Department;
use App\Models\Course;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition()
    {
        return [
            'enroll_year' => $this->faker->year(),
            'gpa' => $this->faker->randomFloat(2, 0, 4), // GPA between 0.00 - 4.00
            'attendance_rate' => $this->faker->randomFloat(2, 50, 100), // Attendance between 50% - 100%
            'department_id' => Department::inRandomOrder()->first()->department_id ?? Department::factory(),
            'course_id' => Course::inRandomOrder()->first()->course_id ?? Course::factory(),
        ];
    }
}
