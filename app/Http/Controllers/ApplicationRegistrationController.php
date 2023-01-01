<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicationState;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ApplicationRegistrationController extends Controller
{
    //inserting application data to database
    public function choiceApplication(Request $request)
    {
        $data = $request->all();
        $newUser = new Application();

        if ($data['faculty'] == '0' && $data['department'] == '0') {

            $newUser->first_name = $data['firstName'];
            $newUser->last_name = $data['lastName'];
            $newUser->phone_number = $data['phoneNo'];
            $newUser->email = $data['email'];
            $newUser->gender = $data['gender'];
            $newUser->roles = $data['role'];
            $newUser->course_id = $data['course'];

            //simultaneously updating the state of the application
            if ($newUser->save()) {
                $state = new ApplicationState();
                $lastID = DB::getPdo()->lastInsertId();
                $application = DB::table('applications')->find($lastID);

                $state->application_id = $application->id;

                $state->save();
                return redirect("/")->withErrors(['msg' => "Application Placed Successfully"]);
            }
        } elseif ($data['course'] == '0') {
            $newUser->first_name = $data['firstName'];
            $newUser->last_name = $data['lastName'];
            $newUser->phone_number = $data['phoneNo'];
            $newUser->email = $data['email'];
            $newUser->gender = $data['gender'];
            $newUser->roles = $data['role'];
            $newUser->faculty_id = $data['faculty'];
            $newUser->department_id = $data['department'];


            //simultaneously updating the state of the application
            if ($newUser->save()) {
                $state = new ApplicationState();
                $lastID = DB::getPdo()->lastInsertId();
                $application = DB::table('applications')->find($lastID);

                $state->application_id = $application->id;

                $state->save();
                return redirect("/")->withErrors(['msg' => "Application Placed Successfully"]);
            }
        } elseif ($data['faculty'] == '0') {
            $newUser->first_name = $data['firstName'];
            $newUser->last_name = $data['lastName'];
            $newUser->phone_number = $data['phoneNo'];
            $newUser->email = $data['email'];
            $newUser->gender = $data['gender'];
            $newUser->roles = $data['role'];
            $newUser->course_id = $data['course'];
            $newUser->department_id = $data['department'];


            //simultaneously updating the state of the application
            if ($newUser->save()) {
                $state = new ApplicationState();
                $lastID = DB::getPdo()->lastInsertId();
                $application = DB::table('applications')->find($lastID);

                $state->application_id = $application->id;

                $state->save();
                return redirect("/")->withErrors(['msg' => "Application Placed Successfully"]);
            }
        }
    }


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


        if ($selectFacultyID == null) {

            $facultyID = DB::table('courses')
                ->where('id', '=', $selectCourseID)
                ->get('faculty_id')
                ->first()->faculty_id;

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
                    'faculty_id' => $facultyID,
                    'course_id' => $selectCourseID,
                    'current_year' => 'first',
                ]
            );
        } else {
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
}
