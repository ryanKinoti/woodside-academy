<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;

class Routing extends Controller
{
    //this class is mainly for accessing user's respective dashboards
    public function admin()
    {
        $user = auth()->user();
        if ($user == null || $user->user_role != "admin") {
            return redirect("/")->withErrors(['msg' => "unauthorized access denied"]);
        } else {
            $students = Application::all()->where('roles', '=', 'student');
            $lecturers = Application::all()->where('roles', '=', 'lecturer');
            $staff = Application::all()->where('roles', '=', 'staff');
            $userInfo = User::all()
                ->where('id', '=', session('userID'))->first();
            return view('admin.dashboard',
                [
                    "students" => $students,
                    "lecturers" => $lecturers,
                    "staffs" => $staff,
                    "userInfo" => $userInfo,
                ]);
        }
    }

    public function staff()
    {
        $user = auth()->user();
        if ($user == null || $user->user_roler != "staff") {
            return redirect("/")->withErrors(['msg' => "unauthorized access denied"]);
        }
    }

    public function lecturers()
    {
        $user = auth()->user();
        if ($user == null || $user->user_roler != "lecturer") {
            return redirect("/")->withErrors(['msg' => "unauthorized access denied"]);
        }
    }

    public function students()
    {
        $user = auth()->user();
        if ($user == null || $user->user_roler != "staff") {
            return redirect("/")->withErrors(['msg' => "unauthorized access denied"]);
        }
    }
}
