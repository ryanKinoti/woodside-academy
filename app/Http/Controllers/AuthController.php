<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
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

        $newUser->save();
        return redirect("/")->withErrors(['msg' => "Application Placed Successfully"]);
    }

    public function studentChoice()
    {
        $studentRole = "student";
        return view('students.application', ['studentRole' => $studentRole]);
    }

    public function studentApplication(Request $request)
    {
        $data = $request->all();
    }

    public function lecturerChoice()
    {
        $lecturerRole = "lecturer";
        return view('lecturers.application', ['lecturerRole' => $lecturerRole]);
    }

    public function lecturerApplication(Request $request)
    {
        $data = $request->all();
    }

    public function staffChoice()
    {
        $staffRole = "staff";
        return view('staff.application', ['staffRole' => $staffRole]);
    }

    public function staffApplication(Request $request)
    {
        $data = $request->all();
    }
}
