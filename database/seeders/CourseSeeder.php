<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Department;

class CourseSeeder extends Seeder
{
    public function run()
    {
        // Ensure there are departments before seeding courses
        if (Department::count() == 0) {
            Department::factory()->count(5)->create();
        }

        // Create 20 courses
        Course::factory()->count(20)->create();
    }
}

