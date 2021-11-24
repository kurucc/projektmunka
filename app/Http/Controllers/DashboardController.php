<?php

namespace App\Http\Controllers;

use App\Models\Buyers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function showDashboard()
    {
        if(Auth::guard('employee')->check())
        {
            if(Auth::guard('employee')->user()->role == 'admin')
            {
                return view('dashboard_admin');
            } else {
                return view('dashboard_worker');
            }
        }
        else
        {
            $buyers = Buyers::where('username', '=', Auth::guard('buyer')->user()->username)->get();
            return view('dashboard_login', compact('buyers'));
        }
    }
}
