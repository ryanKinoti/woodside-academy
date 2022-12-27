<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //methods to accomodate user settings
    public function imageSettings()
    {
        return view('image-settings');
    }

    public function addImage(Request $request)
    {
        $userID = $request->input('userID');
        $user = auth()->user();
        if($user->user_role == "admin"){
            if ($request->file('image')) {
                //extract the file from the form
                $file = $request->file('image')->store('public/images/profile_photos');

                //pass the file data to method that uploads and saves the file
                $this->updateImageDB($file, $userID);
                return redirect("/admin")->withErrors(['msg' => "profile added successfully"]);

            } else {
                return redirect("/admin")->withErrors(['msg' => "kindly select a file"]);
            }
        }elseif ($user->user_role == "staff"){
            if ($request->file('image')) {
                //extract the file from the form
                $file = $request->file('image')->store('public/images/profile_photos');

                //pass the file data to method that uploads and saves the file
                $this->updateImageDB($file, $userID);
                return redirect("/staff")->withErrors(['msg' => "profile added successfully"]);

            } else {
                return redirect("/staff")->withErrors(['msg' => "kindly select a file"]);
            }

        }elseif ($user->user_role == "lecturer"){

            if ($request->file('image')) {
                //extract the file from the form
                $file = $request->file('image')->store('public/images/profile_photos');

                //pass the file data to method that uploads and saves the file
                $this->updateImageDB($file, $userID);
                return redirect("/lecturer")->withErrors(['msg' => "profile added successfully"]);

            } else {
                return redirect("/lecturer")->withErrors(['msg' => "kindly select a file"]);
            }

        }elseif ($user->user_role == "student"){

            if ($request->file('image')) {
                //extract the file from the form
                $file = $request->file('image')->store('public/images/profile_photos');

                //pass the file data to method that uploads and saves the file
                $this->updateImageDB($file, $userID);
                return redirect("/student")->withErrors(['msg' => "profile added successfully"]);

            } else {
                return redirect("/student")->withErrors(['msg' => "kindly select a file"]);
            }

        }else{
            return redirect("/login")->withErrors(['msg' => "kindly login"]);
        }
    }

    public function updateImageDB($image, $id)
    {
        return DB::table('users')->where('id', $id)->update(['profile_photo' => $image]);
    }
}
