<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function imageSettings()
    {
        return view('image-settings');
    }

    public function addImage(Request $request)
    {
        $userID = $request->input('userID');

        if ($request->file('image')) {
            //extract the file from the form
            $file = $request->file('image')->store('public/images/profile_photos');

            //pass the file data to method that uploads and saves the file
            $this->updateImageDB($file, $userID);
            return redirect("/")->withErrors(['msg' => "profile added successfully"]);

        } else {
            return redirect("/")->withErrors(['msg' => "kindly select a file"]);
        }
    }

    public function updateImageDB($image, $id)
    {
        return DB::table('users')->where('id', $id)->update(['profile_photo' => $image]);
    }
}
