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
            //student application

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
            //staff application

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
            //lecturer application

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


    //registration paths
    public function registrationPath($application_id, $role)
    {
        if ($application_id == null) {

            return redirect("/")->withErrors(['msg' => "unauthorized access denied"]);

        } elseif ($role == 'staff') {

            return view('staff.register', ['application_id' => $application_id]);

        } elseif ($role == 'lecturer') {

            return view('lecturers.register', ['application_id' => $application_id]);

        } elseif ($role == 'student') {

            return view('students.register', ['application_id' => $application_id]);
        }
    }

    //completing application, methods are called after email has been sent
    public function extractData(Request $request)
    {
        $data = $request->all();

        if ($this->createUser($data)) {

            $applicationStatus = ApplicationState::where('application_id', '=', $data['application_id'])->first();
            $applicationStatus->status = 'registered';
            $applicationStatus->update();
        }
        return redirect("/login")->withErrors(['msg' => "registration completed successfully, kindly login"]);
    }

    public function createUser(array $data)
    {

        $facultyID = DB::table('applications')->where('id', $data['application_id'])->get('faculty_id')->first()->faculty_id;
        $courseID = DB::table('applications')->where('id', $data['application_id'])->get('course_id')->first()->course_id;
        $departmentID = DB::table('applications')->where('id', $data['application_id'])->get('department_id')->first()->department_id;

        if ($facultyID == null && $departmentID == null) {
            //student registration

            $newfacultyID = DB::table('courses')
                ->where('id', '=', $courseID)
                ->get('faculty_id')
                ->first()->faculty_id;

            return User::create(
                [
                    'user_role' => $data['user_role'],
                    'faculty_id' => $newfacultyID,
                    'application_id' => $data['application_id'],
                    'course_id' => $courseID,
                    'current_year' => 'first',
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
                ]
            );
        } elseif ($courseID == null) {
            //staff registration

            return User::create(
                [
                    'user_role' => $data['user_role'],
                    'faculty_id' => $facultyID,
                    'department_id' => $departmentID,
                    'application_id' => $data['application_id'],
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
                ]
            );
        } elseif ($facultyID == null) {
            //lecturer registration

            return User::create(
                [
                    'user_role' => $data['user_role'],
                    'course_id' => $courseID,
                    'department_id' => $departmentID,
                    'application_id' => $data['application_id'],
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
                ]
            );
        }
    }
}
