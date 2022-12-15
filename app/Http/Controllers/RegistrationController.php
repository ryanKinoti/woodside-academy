<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    //completing application, methods are called after email has been sent
    public function extractData(Request $request)
    {
        $data = $request->all();
        $this->createUser($data);

        return redirect("/login")->withErrors(['msg' => "registration completed successfully, kindly login"]);
    }

    public function createUser(array $data)
    {
        $selectCourseID = DB::table('applications')->where('email', $data['email'])->get('course_id')->first()->course_id;
        $selectFacultyID = DB::table('applications')->where('email', $data['email'])->get('faculty_id')->first()->faculty_id;
        return User::create(
            [
                'user_role' => $data['user_role'],
                'firstName' => $data['firstName'],
                'secondName' => $data['secondName'],
                'lastName' => $data['lastName'],
                'id_number' => $data['id_number'],
                'phoneNumber' => $data['phoneNumber'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'gender' => $data['gender'],
                'country' => $data['country'],
                'city' => $data['city'],
                'faculty_id' => $selectFacultyID,
                'course_id' => $selectCourseID,
            ]
        );
    }
}
