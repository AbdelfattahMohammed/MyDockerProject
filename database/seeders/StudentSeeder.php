<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Department;
use App\Models\Course;

class StudentSeeder extends Seeder
{
    public function run()
    {
        // Ensure departments and courses exist before seeding students
        if (Department::count() == 0) {
            Department::factory()->count(5)->create();
        }

        if (Course::count() == 0) {
            Course::factory()->count(10)->create();
        }

        // Create 50 students
        Student::factory()->count(50)->create();
    }
}

