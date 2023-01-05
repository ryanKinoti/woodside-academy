<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_role' => fake()->randomElement(['admin', 'staff', 'lecturer', 'student']),
            'faculty_id' => fake()->randomElement([101, 102, 103, 104]),
            'department_id' => fake()->randomElement([201, 202, 203, 204, 205, 206, 207]),
            'course_id' => fake()->randomElement([501, 502, 503, 504, 505, 506, 507]),
            'current_year' => fake()->randomElement(['first', 'second', 'third', 'fourth']),
            'firstName' => fake()->firstName(),
            'secondName' => fake()->name(),
            'lastName' => fake()->lastName(),
            'id_number' => fake()->numberBetween(1, 10000),
            'phoneNumber' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
//            'email_verified_at' => now(),
            'password' => Hash::make('admin@123'), // password
            'gender' => fake()->randomElement(['Male', 'Female']),
            'country' => fake()->country(),
            'city' => fake()->city(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
