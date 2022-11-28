<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class RestrictedAreasController extends Controller
{
    //
    public function admin(){
        $user = auth()->user();
        if ($user == null || $user->user_role != "admin") {
            return redirect("/")->withErrors(['msg' => "Unauthorized Access Denied"]);
        }else{
            $students = Application::all()->where('roles','=','student');
            $lecturers = Application::all()->where('roles','=','lecturer');
            $staff = Application::all()->where('roles','=','staff');
            return view('admin.dashboard',
            [
                "students"=>$students,
                "lecturers"=>$lecturers,
                "staff"=>$staff,
            ]);
        }
    }
}
