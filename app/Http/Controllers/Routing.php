<?php

namespace App\Http\Controllers;

use App\Charts\ApplicationsChart;
use App\Models\Application;
use App\Models\Course;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Message;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Routing extends Controller
{
    public function loginRoute()
    {
        $user = auth()->user();
        if ($user == null) {
            return view('login');
        }
        return redirect("/")->withErrors(['msg' => "you are already logged in"]);
    }

    //this method is mainly for accessing user's respective dashboards and data to be accessed by them
    public function admin()
    {
        $user = auth()->user();
        if ($user == null || $user->user_role != "admin") {
            return redirect("/")->withErrors(['msg' => "unauthorized access denied"]);
        } else {
            //fetching all applications based on their role
            $students = Application::all()->where('roles', '=', 'student');
            $lecturers = Application::all()->where('roles', '=', 'lecturer');
            $staff = Application::all()->where('roles', '=', 'staff');

            //fetching tables en-mass
            $faculties = Faculty::all();
            $courses = Course::all();
            $departments = Department::all();
            $units = Unit::all();
            $messages = Message::latest()->take(10)->get();


            //obtaining user data to make it more personalized
            $userInfo = User::all()
                ->where('id', '=', session('userID'))->first();

            //passing the data to the view
            return view('admin.dashboard',
                [
                    "students" => $students,
                    "lecturers" => $lecturers,
                    "staffs" => $staff,
                    "userInfo" => $userInfo,
                    'faculties' => $faculties,
                    'courses' => $courses,
                    'departments' => $departments,
                    'units' => $units,
                    'messages' => $messages,
                ]);
        }
    }

    public function staff()
    {
        $user = auth()->user();
        if ($user == null || $user->user_role != "staff") {
            return redirect("/")->withErrors(['msg' => "unauthorized access denied"]);
        } else {
            //obtaining user data to make it more personalized
            $userInfo = User::all()
                ->where('id', '=', session('userID'))->first();

            //passing the data to the view
            return view('staff.dashboard', [
                "userInfo" => $userInfo,
            ]);
        }
    }

    public function lecturers()
    {
        $user = auth()->user();
        if ($user == null || $user->user_role != "lecturer") {
            return redirect("/")->withErrors(['msg' => "unauthorized access denied"]);
        } else {
            //obtaining user data to make it more personalized
            $userInfo = User::all()
                ->where('id', '=', session('userID'))->first();

            //passing the data to the view
            return view('lecturers.dashboard', [
                "userInfo" => $userInfo,
            ]);
        }
    }

    public function students()
    {
        $user = auth()->user();
        if ($user == null || $user->user_role != "student") {
            return redirect("/")->withErrors(['msg' => "unauthorized access denied"]);
        } else {
            //obtaining user data to make it more personalized
            $userInfo = User::all()
                ->where('id', '=', session('userID'))->first();

            //passing the data to the view
            return view('students.dashboard', [
                "userInfo" => $userInfo,
            ]);
        }
    }
}
