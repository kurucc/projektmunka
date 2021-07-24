<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TechnicianController extends Controller
{
    function showTechnicians()
    {
        return view('technicians');
    }
}
