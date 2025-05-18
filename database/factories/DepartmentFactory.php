<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Department;

class DepartmentFactory extends Factory
{
    protected $model = Department::class;

    public function definition()
    {
        return [
            'head_of_department' => $this->faker->name(),
        ];
    }
}
