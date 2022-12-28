<?php

namespace App\Http\Controllers;

//this is me learning api(s)
use App\Models\Course;
use Illuminate\Http\Request;

class learningAPI extends Controller
{
    //
    function getData()
    {
        return [
            'name' => 'ryan',
            'email' => 'ryan@gmail.com'
        ];
    }

    function listCourses($id = null)
    {
        return $id ? Course::find($id) : Course::all();
    }

    function addCourse(Request $request)
    {
        $course = new Course();
        $course->faculty_id = $request->faculty_id;
        $course->course_name = $request->name;
        $result = $course->save();

        if ($result) {
            return [
                'result' => 'added properly'
            ];
        } else {
            return [
                'result' => 'there is an issue mate'
            ];
        }
    }

    function updateCourse(Request $request)
    {

        $selectCourse = Course::find($request->id);
        $selectCourse->course_name = $request->name;
        $selectCourse->faculty_id = $request->faculty_id;
        $result = $selectCourse->save();

        if ($result) {
            return [
                'result' => 'updated properly'
            ];
        } else {
            return [
                'result' => 'there is an issue mate'
            ];
        }
    }

    function search($name){
        return Course::where('course_name','like','%'.$name.'%')->get();
    }
}
