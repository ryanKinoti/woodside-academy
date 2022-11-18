<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestrictedAreasController extends Controller
{
    //
    public function admin(){
        $user = auth()->user();
        if ($user == null || $user->user_role != "admin") {
            return view('index');
        }else{
            return view('admin.dashboard');
        }
    }
}
