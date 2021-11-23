<?php

namespace App\Http\Controllers;

use App\Models\Buyers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function showDashboard()
    {
        $buyers = [];
        if(Auth::guard('buyer')->check()) {
            $buyers = Buyers::where('username', '=', Auth::guard('buyer')->user()->username)->get();
        }
        return view('dashboard_login', compact('buyers'));
    }
}
