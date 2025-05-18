<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attendance;
use App\Models\Student;
use App\Models\Course;

class AttendanceSeeder extends Seeder
{
    public function run()
    {
        // Ensure students and courses exist before seeding attendances
        if (Student::count() == 0) {
            Student::factory()->count(50)->create();
        }

        if (Course::count() == 0) {
            Course::factory()->count(10)->create();
        }

        // Create 100 attendance records
        Attendance::factory()->count(100)->create();
    }
}

