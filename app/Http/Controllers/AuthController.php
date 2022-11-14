<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Faculty;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //user choices
    public function studentChoice()
    {
        $studentRole = "student";
        $courses = Course::all();
        return view('students.application', [
            'studentRole' => $studentRole,
            'courses' => $courses,
        ]);
    }

    public function lecturerChoice()
    {
        $lecturerRole = "lecturer";
        $courses = Course::all();
        return view('lecturers.application', [
            'lecturerRole' => $lecturerRole,
            'courses' => $courses,
        ]);
    }

    public function staffChoice()
    {
        $staffRole = "staff";
        $faculties = Faculty::all();
        return view('staff.application', [
            'staffRole' => $staffRole,
            'faculties' => $faculties,
        ]);
    }

    //inserting application data to database
    public function choiceApplication(Request $request)
    {
        $data = $request->all();
        $newUser = new User();

        $newUser->first_name = $data['firstName'];
        $newUser->last_name = $data['lastName'];
        $newUser->phone_number = $data['phoneNo'];
        $newUser->email = $data['email'];
        $newUser->gender = $data['gender'];
        $newUser->roles = $data['role'];
        $newUser->course_id = $data['course'];

        $newUser->save();
        return redirect("/")->withErrors(['msg' => "Application Placed Successfully"]);
    }

    public function staff_choiceApplication(Request $request)
    {
        $data = $request->all();
        $newUser = new User();

        $newUser->first_name = $data['firstName'];
        $newUser->last_name = $data['lastName'];
        $newUser->phone_number = $data['phoneNo'];
        $newUser->email = $data['email'];
        $newUser->gender = $data['gender'];
        $newUser->roles = $data['role'];
        $newUser->faculty_id = $data['faculty'];

        $newUser->save();
        return redirect("/")->withErrors(['msg' => "Application Placed Successfully"]);
    }

    //completing application, methods are called after email has been sent
    public function studentApplication(Request $request)
    {
        $data = $request->all();
    }


    public function lecturerApplication(Request $request)
    {
        $data = $request->all();
    }


    public function staffApplication(Request $request)
    {
        $data = $request->all();
    }
}
