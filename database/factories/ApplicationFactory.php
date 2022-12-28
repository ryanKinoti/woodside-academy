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
            'faculty_id' => $this->faker->randomElement([10001, 10002, 10003, 10004]),
            'course_id' => $this->faker->randomElement([70001, 70002, 70003, 70004, 70005, 70006, 70007]),
            'created_at' => Carbon::now()
                ->subMonths(rand(1, 5))
                ->subDays(rand(2, 20))
                ->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()
                ->subMonths(rand(1, 5))
                ->subDays(rand(2, 20))
                ->format('Y-m-d H:i:s')
        ];
    }
}
