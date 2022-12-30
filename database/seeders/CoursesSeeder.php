<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
                    'faculty_id' => '10001',
                    'course_name' => 'Bachelor of Informatics and Computer Science',
                    'course_years_duration' => '4',
                    'number_of_semesters' => 2,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'faculty_id' => '10001',
                    'course_name' => 'Bachelor of Business and Information Technology',
                    'course_years_duration' => '4',
                    'number_of_semesters' => 2,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'faculty_id' => '10001',
                    'course_name' => 'Bachelor of Electrical and Engineering Science',
                    'course_years_duration' => '4',
                    'number_of_semesters' => 3,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'faculty_id' => '10002',
                    'course_name' => 'Bachelor of Laws',
                    'course_years_duration' => '4',
                    'number_of_semesters' => 3,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'faculty_id' => '10003',
                    'course_name' => 'Bachelor of Business Science: Financial Engineering',
                    'course_years_duration' => '3',
                    'number_of_semesters' => 2,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'faculty_id' => '10003',
                    'course_name' => 'Bachelor of Business Science: Acturial Science',
                    'course_years_duration' => '5',
                    'number_of_semesters' => 2,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'faculty_id' => '10004',
                    'course_name' => 'Bachelor of Pure Mathematics',
                    'course_years_duration' => '5',
                    'number_of_semesters' => 3,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]);
    }
}
