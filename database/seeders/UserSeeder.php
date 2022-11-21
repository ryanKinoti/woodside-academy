<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        DB::table('users')
            ->insert([
                [
                    'firstName' => 'Reece',
                    'secondName' => 'Octavian',
                    'lastName' => 'Elroy',
                    'id_number' => '7885235',
                    'phoneNumber' => '0799887766',
                    'email' => 'reece@gmail.com',
                    'password' => Hash::make('reece@123'),
                    'gender' => 'Male',
                    'country' => 'Britain',
                    'city' => 'London',
                    'user_role' => 'admin',
                ],
                [
                    'firstName' => 'Amanda',
                    'secondName' => 'Octavian',
                    'lastName' => 'Wyra',
                    'id_number' => '3325689',
                    'phoneNumber' => '0711223344',
                    'email' => 'amanda@gmail.com',
                    'password' => Hash::make('amanda@123'),
                    'gender' => 'Female',
                    'country' => 'Britain',
                    'city' => 'London',
                    'user_role' => 'staff',
                    'faculty_id' => 20001,
                ],
                [
                    'firstName' => 'Kaedehara',
                    'secondName' => 'Kazuha',
                    'lastName' => 'Wyra',
                    'id_number' => '579223',
                    'phoneNumber' => '0744112255',
                    'email' => 'kazuha@gmail.com',
                    'password' => Hash::make('kazuha@123'),
                    'gender' => 'Male',
                    'country' => 'Britain',
                    'city' => 'London',
                    'user_role' => 'lecturer',
                    'course_id' => 30001,
                ],
                [
                    'firstName' => 'Kamisato',
                    'secondName' => 'Ayaka',
                    'lastName' => 'Elroy',
                    'id_number' => '981335',
                    'phoneNumber' => '0755992211',
                    'email' => 'ayaka@gmail.com',
                    'password' => Hash::make('ayaka@123'),
                    'gender' => 'Female',
                    'country' => 'Britain',
                    'city' => 'London',
                    'user_role' => 'student',
                    'course_id' => 30004,
                ],
            ]);
    }
}
