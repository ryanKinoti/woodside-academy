<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('courses')
            ->insert([
                [
                    'faculty_id' => '20001',
                    'course_name' => 'Bachelor of Informatics and Computer Science',
                ],
                [
                    'faculty_id' => '20001',
                    'course_name' => 'Bachelor of Business and Information Technology',
                ],
                [
                    'faculty_id' => '20001',
                    'course_name' => 'Bachelor of Electrical and Engineering Science',
                ],
                [
                    'faculty_id' => '20002',
                    'course_name' => 'Bachelor of Laws',
                ],
                [
                    'faculty_id' => '20003',
                    'course_name' => 'Bachelor of Business Science: Financial Engineering',
                ],
                [
                    'faculty_id' => '20003',
                    'course_name' => 'Bachelor of Business Science: Acturial Science',
                ],
                [
                    'faculty_id' => '20004',
                    'course_name' => 'Bachelor of Pure Mathematics'
                ],
            ]);
    }
}
