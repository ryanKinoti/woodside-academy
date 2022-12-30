<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
                    'user_role' => 'admin',
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
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'user_role' => 'staff',
                    'firstName' => 'Alaya',
                    'secondName' => 'Marcus',
                    'lastName' => 'Elroy',
                    'id_number' => '5638957',
                    'phoneNumber' => '0799887766',
                    'email' => 'alaya@gmail.com',
                    'password' => Hash::make('alaya@123'),
                    'gender' => 'Female',
                    'country' => 'Florida',
                    'city' => 'USA',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'user_role' => 'lecturer',
                    'firstName' => 'Vahn',
                    'secondName' => 'Aldnari',
                    'lastName' => 'Mason',
                    'id_number' => '799423',
                    'phoneNumber' => '0799887766',
                    'email' => 'vahn@gmail.com',
                    'password' => Hash::make('vahn@123'),
                    'gender' => 'Male',
                    'country' => 'Tokyo',
                    'city' => 'Japan',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'user_role' => 'student',
                    'firstName' => 'Sol',
                    'secondName' => 'Dragona',
                    'lastName' => 'Luxuria',
                    'id_number' => '62423',
                    'phoneNumber' => '0799887766',
                    'email' => 'sol@gmail.com',
                    'password' => Hash::make('sol@123'),
                    'gender' => 'Male',
                    'country' => 'Cairo',
                    'city' => 'Egypt',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]);
    }
}
