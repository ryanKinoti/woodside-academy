<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\DepartmentListing;
use App\Models\Faculty;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DepartmentListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faculties = Faculty::all();
        $departments = Department::all();

        foreach ($faculties as $faculty) {
            foreach ($departments as $department) {
                DepartmentListing::create([
                    'faculty_id' => $faculty->id,
                    'department_id' => $department->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }

    }
}
