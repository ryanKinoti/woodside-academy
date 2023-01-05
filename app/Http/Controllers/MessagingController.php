<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\MessageLogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
use mysql_xdevapi\Result;

class MessagingController extends Controller
{
    //
    //API versions
    public function departmentAPI(Request $request)
    {
        $data = $request->all();
        $department = new Message();

        try {
            $department->from_user_id = $data['from_user_id'];
            $department->to_department_id = $data['to_department_id'];
            $department->title = $data['title'];
            $department->message_content = $data['message_content'];

            if ($department->save()) {
                $logs = new MessageLogs();
                $lastID = DB::getPdo()->lastInsertId();
                $message_entry = DB::table('messages')->find($lastID);

                $logs->message_id = $message_entry->id;

                $logs->save();
                //redirect to named route here
                return redirect('/admin')->withErrors(['msg' => "message sent successfully"]);
            }
        } catch (\Exception $exception) {

            // Return an error response
            $errors = new MessageBag(['error' => 'Error creating resource']);
            return redirect('/admin')->withErrors($errors);
        }
    }

    public function facultyAPI(Request $request)
    {

        // Retrieve the form input data
        $data = $request->all();
        $adminMessage = new Message();

        $adminMessage->from_user_id = $data['from_user_id'];
        $adminMessage->to_faculty_id = $data['to_faculty_id'];
        $adminMessage->title = $data['title'];
        $adminMessage->message_content = $data['message_content'];

        if ($adminMessage->save()) {
            $logs = new MessageLogs();
            $lastID = DB::getPdo()->lastInsertId();
            $message_entry = DB::table('messages')->find($lastID);

            $logs->message_id = $message_entry->id;

            $logs->save();
            return redirect("/admin")->withErrors(['msg' => "message sent successfully"]);
        }

    }

    public function courseAPI(Request $request)
    {
        // Retrieve the form input data
        $data = $request->all();
        $adminMessage = new Message();

        $adminMessage->from_user_id = $data['from_user_id'];
        $adminMessage->to_course_id = $data['to_course_id'];
        $adminMessage->title = $data['title'];
        $adminMessage->message_content = $data['message_content'];

        if ($adminMessage->save()) {
            $logs = new MessageLogs();
            $lastID = DB::getPdo()->lastInsertId();
            $message_entry = DB::table('messages')->find($lastID);

            $logs->message_id = $message_entry->id;

            $logs->save();
            return redirect("/admin")->withErrors(['msg' => "message sent successfully"]);
        }
    }

    public function allStaffAPI(Request $request)
    {
        // Retrieve the form input data
        $data = $request->all();
        $adminMessage = new Message();

        $adminMessage->from_user_id = $data['from_user_id'];
        $adminMessage->to_department_id = $data['to_department_id'];
        $adminMessage->title = $data['title'];
        $adminMessage->message_content = $data['message_content'];
        $adminMessage->bulk_send = 'yes';
        $adminMessage->intended_user_role = $data['intended_user_role'];

        if ($adminMessage->save()) {
            $lastID = DB::getPdo()->lastInsertId();
            $selectUsers = DB::table('users')->where('user_role', '=', 'staff')->get();

            foreach ($selectUsers as $user) {
                DB::table('users')
                    ->where('id', $user->id)
                    ->where('department_id', '=', $data['to_department_id'])
                    ->update(['message_id' => $lastID]);
            }

            $logs = new MessageLogs();
            $message_entry = DB::table('messages')->find($lastID);
            $logs->message_id = $message_entry->id;
            $logs->bulk_send = 'yes';

            $logs->save();
            return redirect("/admin")->withErrors(['msg' => "message sent successfully"]);
        }

    }

    public function allLecturersAPI(Request $request)
    {
        // Retrieve the form input data
        $data = $request->all();
        $adminMessage = new Message();

        $adminMessage->from_user_id = $data['from_user_id'];
        $adminMessage->to_course_id = $data['to_course_id'];
        $adminMessage->title = $data['title'];
        $adminMessage->message_content = $data['message_content'];
        $adminMessage->bulk_send = 'yes';
        $adminMessage->intended_user_role = $data['intended_user_role'];

        if ($adminMessage->save()) {
            $lastID = DB::getPdo()->lastInsertId();
            $selectUsers = DB::table('users')->where('user_role', '=', 'lecturer')->get();

            foreach ($selectUsers as $user) {
                DB::table('users')
                    ->where('id', $user->id)
                    ->where('course_id', '=', $data['to_course_id'])
                    ->update(['message_id' => $lastID]);
            }

            $logs = new MessageLogs();
            $message_entry = DB::table('messages')->find($lastID);
            $logs->message_id = $message_entry->id;
            $logs->bulk_send = 'yes';

            $logs->save();
            return redirect("/admin")->withErrors(['msg' => "message sent successfully"]);
        }
    }

    public function allStudentsAPI(Request $request)
    {
        // Retrieve the form input data
        $data = $request->all();
        $adminMessage = new Message();

        $adminMessage->from_user_id = $data['from_user_id'];
        $adminMessage->to_course_id = $data['to_course_id'];
        $adminMessage->title = $data['title'];
        $adminMessage->message_content = $data['message_content'];
        $adminMessage->bulk_send = 'yes';
        $adminMessage->intended_user_role = $data['intended_user_role'];

        if ($adminMessage->save()) {
            $lastID = DB::getPdo()->lastInsertId();
            $selectUsers = DB::table('users')->where('user_role', '=', 'student')->get();

            foreach ($selectUsers as $user) {
                DB::table('users')
                    ->where('id', $user->id)
                    ->where('course_id', '=', $data['to_course_id'])
                    ->update(['message_id' => $lastID]);
            }

            $logs = new MessageLogs();
            $message_entry = DB::table('messages')->find($lastID);
            $logs->message_id = $message_entry->id;
            $logs->bulk_send = 'yes';

            $logs->save();
            return redirect("/admin")->withErrors(['msg' => "message sent successfully"]);
        }
    }
}
