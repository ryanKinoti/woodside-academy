<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function studentChoice(){
        $studentRole = "student";
        return view('students.register',['studentRole'=>$studentRole]);
    }
    public function studentApplication(Request $request){

    }

    public function lecturerChoice(){
        $lecturerRole = "lecturer";
        return view('lecturers.register',['studentRole'=>$lecturerRole]);
    }
    public function lecturerApplication(Request $request){

    }

    public function staffChoice(){
        $staffRole = "staff";
        return view('staff.register',['studentRole'=>$staffRole]);
    }
    public function staffApplication(Request $request){

    }
}
