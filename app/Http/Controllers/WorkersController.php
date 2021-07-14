<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkersController extends Controller
{
    function showWorkersLogin()
    {
        return view('worker_login');
    }
}
