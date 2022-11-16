<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                    'first_name'=>'Reece',
                    'last_name'=>'Elroy',
                    'phone_number'=>'0799887766',
                    'email'=>'reece@gmail.com',
                    'gender'=>'Male',
                ],
                [
                    'first_name'=>'Amanda',
                    'last_name'=>'Wyra',
                    'phone_number'=>'0711223344',
                    'email'=>'amanda@gmail.com',
                    'gender'=>'Female',
                ],
            ]);
    }
}
