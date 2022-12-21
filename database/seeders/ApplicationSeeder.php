<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('applications')->insert([
            [
                'first_name' => 'Reece',
                'last_name' => 'Elroy',
                'phone_number' => '0799887766',
                'email' => 'reece@gmail.com',
                'gender' => 'Male',
                'roles' => 'staff',
                'faculty_id' => '10001',
                'course_id' => '60001',
            ],
            [
                'first_name' => 'Alaya',
                'last_name' => 'Elroy',
                'phone_number' => '0799887766',
                'email' => 'alaya@gmail.com',
                'gender' => 'Female',
                'roles' => 'lecturer',
                'faculty_id' => '10001',
                'course_id' => '60002',
            ],
            [
                'first_name' => 'Vahn',
                'last_name' => 'Mason',
                'phone_number' => '0799887766',
                'email' => 'vahn@gmail.com',
                'gender' => 'Male',
                'roles' => 'student',
                'faculty_id' => '10001',
                'course_id' => '60002',
            ],
        ]);

        DB::table('application_states')->insert([
            [
                'application_id' => '80001',
            ],
            [
                'application_id' => '80002',
            ],
            [
                'application_id' => '80003',
            ]
        ]);
    }
}
