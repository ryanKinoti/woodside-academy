<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

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
        $newUser = new Application();

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
        $newUser = new Application();

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

    //login method after account creation
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            //selecting roles and user id
            $selectRole = DB::table('users')->where('email', $request->input('email'))->get('user_role')->first()->user_role;
            $selectID = DB::table('users')->where('email', $request->input('email'))->get('id')->first()->id;
            $selectName = DB::table('users')->where('email', $request->input('email'))->get('firstName')->first()->firstName;

            //creating and storing session variables
            $request->session()->regenerate();
            $request->session()->put('email', $request->input('email'));
            $request->session()->put('userRole', $selectRole,);
            $request->session()->put('userID', $selectID,);
            $request->session()->put('userName',$selectName);

            if ($selectRole == 'admin') {
                return redirect()->intended('/admin');
            } else {
                return redirect()->intended('/');
            }
        } else {
            return redirect("/login?window=login")->withErrors(['msg' => "Invalid Login Credentials"]);
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
