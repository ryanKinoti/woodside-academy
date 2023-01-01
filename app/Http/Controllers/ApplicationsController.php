<?php

namespace App\Http\Controllers;

use App\Mail\LecturerAcceptedMail;
use App\Mail\LecturerAnnulledMail;
use App\Mail\StaffAcceptedMail;
use App\Mail\StaffAnnulledMail;
use App\Mail\StudentAcceptedMail;
use App\Mail\StudentAnnulledMail;
use App\Models\ApplicationState;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ApplicationsController extends Controller
{
    //
    public function studentApplications(Request $request)
    {
        //fetching data
        $email = DB::table('applications')->where('id', $request->input('application_id'))->get('email')->first()->email;
        $firstName = DB::table('applications')->where('id', $request->input('application_id'))->get('first_name')->first()->first_name;
        $lastName = DB::table('applications')->where('id', $request->input('application_id'))->get('last_name')->first()->last_name;
        $courseName = DB::table('courses')->where('id', $request->input('courseID'))->get('course_name')->first()->course_name;
        $application_id = $request->input('application_id');

        //updating the application's state
        $data = $request->all();
        if ($data['status'] == 'accepted') {

            $this->acceptedStatus($data);
            Mail::to($email)->send(new StudentAcceptedMail($firstName, $lastName, $courseName, $application_id));

        } elseif ($data['status'] == 'annulled') {

            $this->annulledStatus($data);
            Mail::to($email)->send(new StudentAnnulledMail($firstName, $lastName, $courseName));
        }
        return redirect("/admin")->withErrors(['msg' => "email successfully sent"]);
    }

    public function lecturerApplications(Request $request)
    {
        //fetching data
        $email = DB::table('applications')->where('id', $request->input('application_id'))->get('email')->first()->email;
        $firstName = DB::table('applications')->where('id', $request->input('application_id'))->get('first_name')->first()->first_name;
        $lastName = DB::table('applications')->where('id', $request->input('application_id'))->get('last_name')->first()->last_name;
        $courseName = DB::table('courses')->where('id', $request->input('courseID'))->get('course_name')->first()->course_name;
        $departmentName = DB::table('departments')->where('id', $request->input('departmentID'))->get('department_name')->first()->department_name;
        $application_id = $request->input('application_id');

        //fetching data
        $data = $request->all();
        if ($data['status'] == 'accepted') {

            $this->acceptedStatus($data);
            Mail::to($email)->send(new LecturerAcceptedMail($firstName, $lastName, $courseName, $departmentName, $application_id));

        } elseif ($data['status'] == 'annulled') {

            $this->annulledStatus($data);
            Mail::to($email)->send(new LecturerAnnulledMail($firstName, $lastName, $courseName, $departmentName));
        }
        return redirect("/admin")->withErrors(['msg' => "email successfully sent"]);
    }

    public function staffApplications(Request $request)
    {
        //fetching data from staff table
        $email = DB::table('applications')->where('id', $request->input('application_id'))->get('email')->first()->email;
        $firstName = DB::table('applications')->where('id', $request->input('application_id'))->get('first_name')->first()->first_name;
        $lastName = DB::table('applications')->where('id', $request->input('application_id'))->get('last_name')->first()->last_name;
        $facultyName = DB::table('faculties')->where('id', $request->input('facultyID'))->get('faculty_name')->first()->faculty_name;
        $departmentName = DB::table('departments')->where('id', $request->input('departmentID'))->get('department_name')->first()->department_name;
        $application_id = $request->input('application_id');

        //updating the application's state
        $data = $request->all();
        if ($data['status'] == 'accepted') {

            $this->acceptedStatus($data);
            Mail::to($email)->send(new StaffAcceptedMail($firstName, $lastName, $facultyName, $departmentName, $application_id));

        } elseif ($data['status'] == 'annulled') {

            $this->annulledStatus($data);
            Mail::to($email)->send(new StaffAnnulledMail($firstName, $lastName, $facultyName, $departmentName));
        }

        return redirect("/admin")->withErrors(['msg' => "email successfully sent"]);
    }

    public function acceptedStatus(array $data)
    {
        return ApplicationState::where('application_id', $data['application_id'])
            ->update(['status' => 'accepted']);
    }

    public function annulledStatus(array $data)
    {
        return ApplicationState::where('application_id', $data['application_id'])
            ->update(['status' => 'annulled']);
    }
}
