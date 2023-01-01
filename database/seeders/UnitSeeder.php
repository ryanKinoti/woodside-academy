<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('units')->insert([
            [
                'course_id' => '501',
                'unit_name' => 'Data Structures and Algorithms 1',
                'unit_year' => '2',
                'unit_semester' => 'first',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => '501',
                'unit_name' => 'Computer Organization and Architecture',
                'unit_year' => '2',
                'unit_semester' => 'first',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => '501',
                'unit_name' => 'Japanese I',
                'unit_year' => '2',
                'unit_semester' => 'first',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => '501',
                'unit_name' => 'Object Oriented Programming II',
                'unit_year' => '2',
                'unit_semester' => 'first',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => '501',
                'unit_name' => 'Principles of Ethics',
                'unit_year' => '2',
                'unit_semester' => 'first',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => '501',
                'unit_name' => 'Probability Statistics I',
                'unit_year' => '2',
                'unit_semester' => 'first',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => '501',
                'unit_name' => 'Web Application Development	2',
                'unit_year' => '2',
                'unit_semester' => 'first',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => '501',
                'unit_name' => 'Advanced Networking',
                'unit_year' => '2',
                'unit_semester' => 'second',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => '501',
                'unit_name' => 'Digital Logic',
                'unit_year' => '2',
                'unit_semester' => 'second',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => '501',
                'unit_name' => 'Japanese II',
                'unit_year' => '2',
                'unit_semester' => 'second',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => '501',
                'unit_name' => 'Operating Systems',
                'unit_year' => '2',
                'unit_semester' => 'second',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => '501',
                'unit_name' => 'Probability Statistics II',
                'unit_year' => '2',
                'unit_semester' => 'second',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => '501',
                'unit_name' => 'Software Engineering',
                'unit_year' => '2',
                'unit_semester' => 'second',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'course_id' => '501',
                'unit_name' => 'Internet Application Programming',
                'unit_year' => '2',
                'unit_semester' => 'second',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}



