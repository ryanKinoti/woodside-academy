<?php

namespace App\Http\Controllers;

use App\Mail\LecturerMail;
use App\Mail\StaffMail;
use App\Mail\StudentMail;
use App\Models\ApplicationState;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ApplicationsController extends Controller
{
    //
    public function studentApplications(Request $request)
    {
        //extracting personal mailing information
        $selectEmail = DB::table('applications')->where('id', $request->input('user_id'))->get('email')->first()->email;
        $firstName = DB::table('applications')->where('id', $request->input('user_id'))->get('first_name')->first()->first_name;
        $lastName = DB::table('applications')->where('id', $request->input('user_id'))->get('last_name')->first()->last_name;
        $coursename = $request->input('coursename');
        $selectFacultyID = DB::table('courses')->where('course_name', $coursename)->get('faculty_id')->first()->faculty_id;
        $selectFacultyName = DB::table('faculties')->where('id', $selectFacultyID)->get('faculty_name')->first()->faculty_name;


        //updating the application's state
        $data = $request->all();
        $this->updateStatus($data);

        //passing the mailing information to the boiler templete for mailable
        Mail::to($selectEmail)->send(new StudentMail($firstName, $lastName, $coursename, $selectFacultyName));

        return redirect("/admin")->withErrors(['msg' => "email successfully sent"]);
    }

    public function lecturerApplications(Request $request)
    {
        //extracting personal mailing information
        $selectEmail = DB::table('applications')->where('id', $request->input('user_id'))->get('email')->first()->email;
        $firstName = DB::table('applications')->where('id', $request->input('user_id'))->get('first_name')->first()->first_name;
        $lastName = DB::table('applications')->where('id', $request->input('user_id'))->get('last_name')->first()->last_name;
        $coursename = $request->input('coursename');
        $selectFacultyID = DB::table('courses')->where('course_name', $coursename)->get('faculty_id')->first()->faculty_id;
        $selectFacultyName = DB::table('faculties')->where('id', $selectFacultyID)->get('faculty_name')->first()->faculty_name;

        //passing the mailing information to the boiler templete for mailable
        Mail::to($selectEmail)->send(new LecturerMail($firstName, $lastName, $coursename, $selectFacultyName));
        return redirect("/admin")->withErrors(['msg' => "email successfully sent"]);
    }

    public function staffApplications(Request $request)
    {
        //extracting personal mailing information
        $selectEmail = DB::table('applications')->where('id', $request->input('user_id'))->get('email')->first()->email;
        $firstName = DB::table('applications')->where('id', $request->input('user_id'))->get('first_name')->first()->first_name;
        $lastName = DB::table('applications')->where('id', $request->input('user_id'))->get('last_name')->first()->last_name;
        $facultyID = $request->input('facultyID');
        $selectFacultyName = DB::table('faculties')->where('id', $facultyID)->get('faculty_name')->first()->faculty_name;

        //passing the mailing information to the boiler templete for mailable
        Mail::to($selectEmail)->send(new StaffMail($firstName, $lastName, $selectFacultyName));
        return redirect("/admin")->withErrors(['msg' => "email successfully sent"]);
    }

    public function updateStatus(array $data)
    {
//        return DB::table('application_states')
//            ->where('id', $data['user_id'])
//            ->update(['status' => 'accepted']);
        return ApplicationState::where('id', $data['user_id'])
            ->update(['status' => 'accepted']);
    }
}
