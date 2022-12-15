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
                ],
                [
                    'user_role' => 'admin',
                    'firstName' => 'Alaya',
                    'secondName' => 'Marcus',
                    'lastName' => 'Elroy',
                    'id_number' => '5638957',
                    'phoneNumber' => '0799887766',
                    'email' => 'alaya@gmail.com',
                    'password' => Hash::make('alaya@123'),
                    'gender' => 'Female',
                    'country' => 'Britain',
                    'city' => 'London',
                ],
            ]);
    }
}
