<?php

namespace App\Http\Controllers;

use App\Models\AdminMessage;
use Illuminate\Http\Request;

class MessagingController extends Controller
{
    //
    public function facultyMessage(Request $request)
    {
        // Retrieve the form input data
        $data = $request->all();
        $adminMessage = new AdminMessage();

        $adminMessage->from_user_id = $data['from_user_id'];
        $adminMessage->to_faculty_id = $data['to_faculty_id'];
        $adminMessage->title = $data['title'];
        $adminMessage->message_content = $data['message_content'];

        $adminMessage->save();

        return redirect("/admin")->withErrors(['msg' => "message sent successfully"]);
    }

    public function courseMessage(Request $request)
    {
        // Retrieve the form input data
        $data = $request->all();
        $adminMessage = new AdminMessage();

        $adminMessage->from_user_id = $data['from_user_id'];
        $adminMessage->to_course_id = $data['to_course_id'];
        $adminMessage->title = $data['title'];
        $adminMessage->message_content = $data['message_content'];

        $adminMessage->save();

        return redirect("/admin")->withErrors(['msg' => "message sent successfully"]);
    }
}
