<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('faculties')
            ->insert(
                [
                    [
                        'faculty_name' => 'Academy of Computing and Science',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'faculty_name' => 'Academy of Law',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'faculty_name' => 'Business Academy',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'faculty_name' => 'Academy of Mathematical Sciences',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]
                ]);
    }
}
