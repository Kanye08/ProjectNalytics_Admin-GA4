<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{



    public function index()
    {

        $totalAllUsers = User::count();
        $totalUsers = User::where('role_as', '0')->count();
        $totalAdmin = User::where('role_as', '1')->count();

        return view('admin.dashboard', compact('totalAllUsers', 'totalUsers', 'totalAdmin'));
    }
    public function analytic()
    {
        return view('admin.analytic');
    }
}
