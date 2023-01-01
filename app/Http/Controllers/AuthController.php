<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicationState;
use App\Models\Course;
use App\Models\Department;
use App\Models\DepartmentListing;
use App\Models\Faculty;
use App\Models\UserLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $department = '201';
        $departments = Department::all();
        $courses = Course::all();
        return view('lecturers.application', [
            'lecturerRole' => $lecturerRole,
            'departments' => $departments,
            'courses' => $courses,
            'department' => $department,
        ]);
    }

    public function staffChoice()
    {
        $staffRole = "staff";
        $departments = Department::all();
        $faculties = Faculty::all();
        return view('staff.application', [
            'staffRole' => $staffRole,
            'departments' => $departments,
            'faculties' => $faculties,
        ]);
    }

    //login method after account creation
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            //selecting roles, user id and user's name
            $selectRole = DB::table('users')->where('email', $request->input('email'))->get('user_role')->first()->user_role;

            //sidetrack to update user_login table with selected role
            $insert = new UserLogins();
            $insert->user = \auth()->user()->id;
            $insert->role = $selectRole;
            $insert->save();

            //continuation of selecting roles, user id and user's name
            $selectID = DB::table('users')->where('email', $request->input('email'))->get('id')->first()->id;
            $selectfirstName = DB::table('users')->where('email', $request->input('email'))->get('firstName')->first()->firstName;
            $selectlastName = DB::table('users')->where('email', $request->input('email'))->get('lastName')->first()->lastName;

            //creating and storing into session variables
            $request->session()->regenerate();
            $request->session()->put('email', $request->input('email'));
            $request->session()->put('userRole', $selectRole,);
            $request->session()->put('userID', $selectID,);
            $request->session()->put('firstName', $selectfirstName);
            $request->session()->put('lastName', $selectlastName);

            if ($selectRole == 'admin') {
                return redirect()->intended('/admin');
            } elseif ($selectRole == 'staff') {
                return redirect()->intended('/staff');
            } elseif ($selectRole == 'lecturer') {
                return redirect()->intended('/lecturer');
            } elseif ($selectRole == 'student') {
                return redirect()->intended('/student');
            } else {
                return redirect()->intended('/');
            }
        } else {
            return redirect()->intended('login')->withErrors(['msg' => "invalid login credentials"]);
        }
    }

    //logout method
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
