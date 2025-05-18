<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Attendance;
use App\Models\Student;
use App\Models\Course;

class AttendanceFactory extends Factory
{
    protected $model = Attendance::class;

    public function definition()
    {
        return [
            'student_id' => Student::inRandomOrder()->first()->student_id ?? Student::factory(),
            'course_id' => Course::inRandomOrder()->first()->course_id ?? Course::factory(),
            'date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['Present', 'Absent', 'Late', 'Excused']),
        ];
    }
}
