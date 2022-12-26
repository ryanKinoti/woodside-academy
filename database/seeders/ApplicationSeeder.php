<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
                'first_name' => 'Alaya',
                'last_name' => 'Elroy',
                'phone_number' => '0799887766',
                'email' => 'alaya@gmail.com',
                'gender' => 'Female',
                'roles' => 'staff',
                'faculty_id' => '10001',
                'course_id' => '70002',
                'created_at' => Carbon::now()
                    ->subMonths(rand(1, 5))
                    ->subDays(rand(2, 20))
                    ->format('Y-m-d H:i:s')
            ],
            [
                'first_name' => 'Vahn',
                'last_name' => 'Mason',
                'phone_number' => '0799887766',
                'email' => 'vahn@gmail.com',
                'gender' => 'Male',
                'roles' => 'lecturer',
                'faculty_id' => '10001',
                'course_id' => '70002',
                'created_at' => Carbon::now()
                    ->subMonths(rand(1, 5))
                    ->subDays(rand(2, 20))
                    ->format('Y-m-d H:i:s')
            ],
            [
                'first_name' => 'Sol',
                'last_name' => 'Luxuria',
                'phone_number' => '0799887766',
                'email' => 'sol@gmail.com',
                'gender' => 'Male',
                'roles' => 'student',
                'faculty_id' => '10001',
                'course_id' => '70002',
                'created_at' => Carbon::now()
                    ->subMonths(rand(1, 5))
                    ->subDays(rand(2, 20))
                    ->format('Y-m-d H:i:s')
            ],
            [
                'first_name' => 'Camelia',
                'last_name' => 'Castias',
                'phone_number' => '0799887766',
                'email' => 'camelia@gmail.com',
                'gender' => 'Female',
                'roles' => 'staff',
                'faculty_id' => '10003',
                'course_id' => '70005',
                'created_at' => Carbon::now()
                    ->subMonths(rand(1, 5))
                    ->subDays(rand(2, 20))
                    ->format('Y-m-d H:i:s')
            ],
            [
                'first_name' => 'Isis',
                'last_name' => 'Anubis',
                'phone_number' => '0799887766',
                'email' => 'isis@gmail.com',
                'gender' => 'Female',
                'roles' => 'lecturer',
                'faculty_id' => '10002',
                'course_id' => '70004',
                'created_at' => Carbon::now()
                    ->subMonths(rand(1, 5))
                    ->subDays(rand(2, 20))
                    ->format('Y-m-d H:i:s')
            ],
            [
                'first_name' => 'Kaiser',
                'last_name' => 'Fafnir',
                'phone_number' => '0799887766',
                'email' => 'kaiser@gmail.com',
                'gender' => 'Male',
                'roles' => 'student',
                'faculty_id' => '10004',
                'course_id' => '70007',
                'created_at' => Carbon::now()
                    ->subMonths(rand(1, 5))
                    ->subDays(rand(2, 20))
                    ->format('Y-m-d H:i:s')
            ],
        ]);

        DB::table('application_states')->insert([
            [
                'application_id' => '90001',
            ],
            [
                'application_id' => '90002',
            ],
            [
                'application_id' => '90003',
            ],
            [
                'application_id' => '90004',
            ],
            [
                'application_id' => '90005',
            ],
            [
                'application_id' => '90006',
            ],
        ]);
    }
}
