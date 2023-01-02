<?php

namespace App\Http\Controllers;

use App\Mail\UnitRegistrationMail;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailingController extends Controller
{
    //
    public function unitRegistration(Request $request)
    {
        $data = $request->all();
        $course_id = $data['course_id'];
        $openUnits = Unit::all()
            ->where('unit_status', '=', 'available')
            ->where('course_id', '=', $course_id);
        $students = User::all()
            ->where('course_id', '=', $course_id)
            ->where('user_role', '=', 'student');

        // create a list of the unit names to include in the email
        $unitList = '';
        foreach ($openUnits as $unit) {
            $unitList .= $unit->unit_name . "\n";
        }

        foreach ($students as $student) {
            $firstName = $student->firstName;
            $lastName = $student->lastName;
            Mail::to($student->email)->send(new UnitRegistrationMail($unitList, $firstName, $lastName));
        }

        return redirect("/admin")->withErrors(['msg' => "emails sent successfully"]);
    }
}
