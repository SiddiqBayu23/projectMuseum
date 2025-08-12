<?php

namespace App\Http\Controllers;
use Illuminate\Facades\Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        //logika untuk ke halaman admin atau user
        if($user->role ==='admin'){
            return view('dashboard.login');
        }
        return view ('dashboard.user');
    }
}
