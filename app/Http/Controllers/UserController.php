<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function addImage(Request $request){

        $data = new User();
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $data['image']= $filename;
        }
        $data->save();
    }

    public function userRegistration(Request $request): Redirector|Application|RedirectResponse
    {
        $data = $request->all();
        $this->create($data);
        return redirect("/")->withErrors(['msg' => "Application Made Successfully"]);
    }

    public function create(array $data)
    {
        return User::create([
            'first_name' => $data["firstname"],
            'last_name' => $data["lastname"],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'phone_number' => $data['phonenumber'],
            'course_applied' => $data['courseapplied'],
        ]);
    }
}
