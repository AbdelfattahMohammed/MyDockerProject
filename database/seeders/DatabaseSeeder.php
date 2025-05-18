<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


DB::table('users')->insert([
    'name' => 'Ahmed Ali',
    'email' => 'ahmed@example.com',
    'password' => Hash::make('password123'), // bcrypt encryption
    'created_at' => now(),
    'updated_at' => now(),
]);
    }
}
