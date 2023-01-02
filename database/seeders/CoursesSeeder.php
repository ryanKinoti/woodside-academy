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
                    'faculty_id' => '101',
                    'course_name' => 'Bachelor of Informatics and Computer Science',
                    'abbreviation' => 'Bsc. I.C.S',
                    'course_years_duration' => '4',
                    'number_of_semesters' => 2,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'faculty_id' => '101',
                    'course_name' => 'Bachelor of Business and Information Technology',
                    'abbreviation' => 'Bsc. B.B.I.T',
                    'course_years_duration' => '4',
                    'number_of_semesters' => 2,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'faculty_id' => '101',
                    'course_name' => 'Bachelor of Electrical and Engineering Science',
                    'abbreviation' => 'Bsc. E.E.Sc',
                    'course_years_duration' => '4',
                    'number_of_semesters' => 3,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'faculty_id' => '102',
                    'course_name' => 'Bachelor of Laws',
                    'abbreviation' => 'Bsc. Laws',
                    'course_years_duration' => '4',
                    'number_of_semesters' => 3,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'faculty_id' => '103',
                    'course_name' => 'Bachelor of Business Science: Financial Engineering',
                    'abbreviation' => 'Bsc. B.S-F.E',
                    'course_years_duration' => '3',
                    'number_of_semesters' => 2,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'faculty_id' => '103',
                    'course_name' => 'Bachelor of Business Science: Actuarial  Science',
                    'abbreviation' => 'Bsc. B.S-A.S',
                    'course_years_duration' => '5',
                    'number_of_semesters' => 2,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'faculty_id' => '104',
                    'course_name' => 'Bachelor of Pure Mathematics',
                    'abbreviation' => 'Bsc. Pure Math.',
                    'course_years_duration' => '5',
                    'number_of_semesters' => 3,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]);
    }
}
