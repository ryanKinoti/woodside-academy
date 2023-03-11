<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'user_role' => 'admin',
            'faculty_id' => 101,
            'department_id' => 201,
            'course_id' => 501,
            'firstName' => 'Ryan',
            'secondName' => 'Kinoti',
            'lastName' => 'Kathurima',
            'id_number' => fake()->numberBetween(1, 10000),
            'phoneNumber' => fake()->phoneNumber(),
            'email' => 'ryan@gmail.com',
//            'email_verified_at' => now(),
            'password' => Hash::make('admin@123'), // password
            'gender' => 'Male',
            'country' => fake()->country(),
            'city' => fake()->city(),
            'remember_token' => Str::random(10),
        ]);

        for ($i = 0; $i < 14; $i++) {
            User::factory()->create();
        }
    }
}
