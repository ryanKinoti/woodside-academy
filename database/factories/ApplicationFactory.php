<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.'70002'
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'phone_number' => $this->faker->unique()->phoneNumber('7########'),
            'email' => $this->faker->unique()->email,
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'roles' => $this->faker->randomElement(['staff', 'lecturer', 'student']),
            'faculty_id' => $this->faker->randomElement([101, 102, 103, 104]),
            'department_id' => $this->faker->randomElement([201, 202, 203, 204, 205, 206, 207]),
            'course_id' => $this->faker->randomElement([501, 502, 503, 504, 505, 506, 507]),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
