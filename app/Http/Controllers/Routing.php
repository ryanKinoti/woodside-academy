<?php

namespace App\Http\Controllers;

use App\Charts\ApplicationsChart;
use App\Models\Application;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Routing extends Controller
{
    //this method is mainly for accessing user's respective dashboards and data to be accessed by them
    public function admin()
    {
        $user = auth()->user();
        if ($user == null || $user->user_role != "admin") {
            return redirect("/")->withErrors(['msg' => "unauthorized access denied"]);
        } else {
            //listing all applications based on their role
            $students = Application::all()->where('roles', '=', 'student');
            $lecturers = Application::all()->where('roles', '=', 'lecturer');
            $staff = Application::all()->where('roles', '=', 'staff');

            //obtaining user data to make it more personalized
            $userInfo = User::all()
                ->where('id', '=', session('userID'))->first();


            // Extract data from the users table based on the roles column
            $users = Application::select('roles')->get();

            // Count the number of instances or values for each role
            $roleCount = $users->groupBy('roles')->map(function ($item) {
                return $item->count();
            });

            $chart = new ApplicationsChart;
            $chart->labels($roleCount->keys());
            $chart->title('Applications', '20');
            $chart->dataset('Role Count', 'bar', $roleCount->values())
                ->color('#E7A164')
                ->backgroundColor('#E7A164');
            $chart->options([
                'legend' => [
                    'position' => 'top',
                ],
                'scales' => [
                    'yAxes' => [
                        [
                            'ticks' => [
                                'beginAtZero' => true,
                                'fontColor' => 'black',
                            ],
                            'gridLines' => [
                                'color' => '#ccc',
                            ],
                            'scaleLabel' => [
                                'display' => true,
                                'labelString' => 'Count',
                                'fontColor' => '#333',
                            ],
                        ],
                    ],
                    'xAxes' => [
                        [
                            'gridLines' => [
                                'color' => '#ccc',
                            ],
                            'scaleLabel' => [
                                'display' => true,
                                'labelString' => 'Roles',
                                'fontColor' => 'black',
                            ],
                        ],
                    ],
                ],
                'maintainAspectRatio' => false,
                'responsive' => true,
//                'aspectRatio' => 0.5,
                'width' => 250,
            ]);
            //passing the data to the view
            return view('admin.dashboard',
                [
                    "students" => $students,
                    "lecturers" => $lecturers,
                    "staffs" => $staff,
                    "userInfo" => $userInfo,
                    'chart' => $chart,
                ]);
        }
    }

    public function staff()
    {
        $user = auth()->user();
        if ($user == null || $user->user_role != "staff") {
            return redirect("/")->withErrors(['msg' => "unauthorized access denied"]);
        }
    }

    public function lecturers()
    {
        $user = auth()->user();
        if ($user == null || $user->user_role != "lecturer") {
            return redirect("/")->withErrors(['msg' => "unauthorized access denied"]);
        }
    }

    public function students()
    {
        $user = auth()->user();
        if ($user == null || $user->user_role != "staff") {
            return redirect("/")->withErrors(['msg' => "unauthorized access denied"]);
        }
    }
}
