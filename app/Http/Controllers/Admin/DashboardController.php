<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{



    public function index()
    {
        $data = User::select('id', 'created_at')->get()->groupBy(function ($data) {
            return  Carbon::parse($data->created_at)->format('M');
        });

        $month = [];
        $monthCount = [];

        foreach ($data as $monthAbbrev => $values) {
            $month[$monthAbbrev] = $monthAbbrev;
            $monthCount[] = count($values);
        }
        // $chartData = [
        //     'labels' => $month,
        //     'datasets' => [
        //         [
        //             'label' => "Registration",
        //             'backgroundColor' => "rgba(2,117,216,1)",
        //             'borderColor' => "rgba(2,117,216,1)",
        //             'data' => $monthCount,
        //         ]
        //     ]
        // ];

        $totalAllUsers = User::count();
        $totalUsers = User::where('role_as', '0')->count();
        $totalAdmin = User::where('role_as', '1')->count();

        return view('admin.dashboard', compact('totalAllUsers', 'totalUsers', 'totalAdmin', 'data', 'month', 'monthCount'));    //
    }
    public function analytic()
    {
        return view('admin.analytic');
    }
}
