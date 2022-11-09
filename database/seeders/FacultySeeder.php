<?php

namespace Database\Seeders;

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
                        'faculty_name' => 'Academy Of Computing and Science'
                    ],
                    [
                        'faculty_name' => 'Academy of Law'
                    ],
                    [
                        'faculty_name' => 'Business Academy'
                    ],
                    [
                        'faculty_name'=>'Academy of Mathematical Sciences'
                    ]
                ]);
    }
}
