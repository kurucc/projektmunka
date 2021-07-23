<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /*public function __construct()
    {
        $this;
    }*/
    function showDashboard()
    {
        return view('dashboard_login');
    }
}
