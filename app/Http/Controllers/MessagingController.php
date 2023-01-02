<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\MessageLogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessagingController extends Controller
{
    //
    public function departmentMessage(Request $request)
    {
        // Retrieve the form input data
        $data = $request->all();
        $adminMessage = new Message();

        $adminMessage->from_user_id = $data['from_user_id'];
        $adminMessage->to_department_id = $data['to_department_id'];
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
    public function facultyMessage(Request $request)
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

    public function courseMessage(Request $request)
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

    public function allStaffMessage(Request $request)
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

    public function allLecturersMessage(Request $request)
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

    public function allStudentsMessage(Request $request)
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
