<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Instructor;
use App\Models\Department;
use App\Models\Course;

class InstructorSeeder extends Seeder
{
    public function run()
    {
        // Ensure departments and courses exist before seeding instructors
        if (Department::count() == 0) {
            Department::factory()->count(5)->create();
        }

        if (Course::count() == 0) {
            Course::factory()->count(10)->create();
        }

        // Create 20 instructors
        Instructor::factory()->count(20)->create();
    }
}

