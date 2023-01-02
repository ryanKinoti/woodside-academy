<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Unit;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    //
    public function addUnit(Request $request)
    {
        //retrieving all data
        $data = $request->all();
        $newUnit = new Unit();

        $newUnit->course_id = $data['course_id'];
        $newUnit->unit_name = $data['unit_name'];
        $newUnit->unit_year = $data['unit_year'];
        $newUnit->unit_semester = $data['unit_semester'];

        $newUnit->save();

        return redirect("/admin")->withErrors(['msg' => "new unit added successfully"]);
    }

    public function addCourse(Request $request)
    {
        //retrieving all data
        $data = $request->all();
        $newCourse = new Course();

        $newCourse->faculty_id = $data['faculty_id'];
        $newCourse->course_name = $data['course_name'];
        $newCourse->abbreviation = $data['course_abbreviation'];
        $newCourse->course_years_duration = $data['course_years_duration'];
        $newCourse->number_of_semesters = $data['number_of_semesters'];

        $newCourse->save();
        return redirect("/admin")->withErrors(['msg' => "new course added successfully"]);
    }

    public function openStatus(Request $request)
    {
        $data = $request->all();

        if ($data['type'] == "course") {
            $unitStatus = Course::find($data['id']);

            $unitStatus->course_status = 'open';

            $unitStatus->update();

            return redirect("/admin")->withErrors(['msg' => "course status changed successfully"]);
        } elseif ($data['type'] == "unit") {

            $unitStatus = Unit::find($data['id']);

            $unitStatus->unit_status = 'available';

            $unitStatus->update();

            return redirect("/admin")->withErrors(['msg' => "unit status changed successfully"]);
        }

        return redirect("/admin")->withErrors(['msg' => "no such action available"]);
    }

    public function closeStatus(Request $request)
    {
        $data = $request->all();

        if ($data['type'] == "course") {
            $unitStatus = Course::find($data['id']);

            $unitStatus->course_status = 'closed';

            $unitStatus->update();

            return redirect("/admin")->withErrors(['msg' => "course status changed successfully"]);
        } elseif ($data['type'] == "unit") {

            $unitStatus = Unit::find($data['id']);

            $unitStatus->unit_status = 'closed';

            $unitStatus->update();

            return redirect("/admin")->withErrors(['msg' => "unit status changed successfully"]);
        }

        return redirect("/admin")->withErrors(['msg' => "no such action available"]);
    }
}
