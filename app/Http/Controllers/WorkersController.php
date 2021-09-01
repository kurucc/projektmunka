<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use App\Models\Buyers;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class WorkersController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:employee')->except('logout');
        $this->middleware('guest:buyer')->except('logout');
    }

    public function showRegister(Request $request)
    {
        return view('register');
    }
    public function register(Request $request)
    {
        if($request->has('register'))
        {
            $validator = Validator::make($request->all(), [
                'felhasználónév' => 'required|string|min:6|max:30|unique:buyers,username',
                'jelszó' => 'required|string|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,30}$/',
                'email' => 'required|email|unique:buyers,email|max:30',
                'születésnap' => 'required|date',
                'telefonszám' => 'nullable|string|min:12|max:12',
                'delivery_zip' => 'required|string|min:4|max:4',
                'delivery_address' => 'required|string|max:50',
                'delivery_city' => 'required|string|max:30',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            $buyers = new Buyers;
            $buyers->username = $request->felhasználónév;
            $buyers->password = Hash::make($request->jelszó);
            $buyers->email = $request->email;
            $buyers->birthday = $request->születésnap;
            $buyers->tel = $request->telefonszám;
            $buyers->name = $request->firstname . " " . $request->lastname;
            $buyers->delivery_zip = $request->delivery_zip;
            $buyers->delivery_address = $request->delivery_address;
            $buyers->delivery_city = $request->delivery_city;

            if(!empty($request->invoice_name))
            {
                $buyers->invoice_name = $request->invoice_name;
            }
//////////////////////////////////////
            if(!empty($request->invoice_company))
            {
                $buyers->invoice_company = $request->invoice_company;
            }

////////////////////////////////////
            if(empty($request->invoice_zip))
            {
                $buyers->invoice_zip = $request->delivery_zip;
            }
            else
            {
                $buyers->invoice_zip = $request->invoice_zip;
            }
////////////////////////////////////
            if(empty($request->invoice_city))
            {
                $buyers->invoice_city = $request->delivery_city;
            }
            else
            {
                $buyers->invoice_city = $request->invoice_city;
            }
////////////////////////////////////
            if(empty($request->invoice_address))
            {
                $buyers->invoice_address = $request->delivery_address;
            }
            else
            {
                $buyers->invoice_address = $request->invoice_address;
            }
            $buyerSave = $buyers->save();
            abort_if(!$buyerSave,500,'Nem sikerült menteni az adatbázisba!');

            $users = new Users;
            $users->buyer_id = Buyers::where('username', '=', $request->felhasználónév)->get()[0]->id;

            if($users->save())
            {
                return redirect()->back()->with('siker', 'Sikeres regisztráció, jelentkezz be!');  
            }
            else
            {
                return redirect()->back()->withErrors('Sikertelen regisztráció, próbáld meg újra!');
            }

        }
        else if($request->has('login'))
        {
            $credentials = $request->validate([
                'username' => ['required'],
                'password' => ['required'],
            ]);
            if(Auth::guard('buyer')->attempt($credentials))
            {
                $request->session()->regenerate();
                return redirect('/');
            }
            else
            {
                return redirect()->back()->withErrors("A felhasználónév vagy a jelszó nem megfelelő.");
            }
        }
    }
    function showWorkersLogin()
    {
        return view('worker_login');
    }
    function workersLogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if(Auth::guard('employee')->attempt($credentials))
        {
            $request->session()->regenerate();
            if(Auth::guard('employee')->user()->role === 'admin')
            {
                return redirect('/dashboard/admin');
            }
            else
            {
                return redirect('/dashboard/worker');
            }
        }
        else
        {
            return redirect()->back()->withErrors("A felhasználónév vagy a jelszó nem megfelelő.");
        }
    }
    function logout()
    {
        if(Auth::guard('employee')->check())
        {
            Auth::guard('employee')->logout();
        }
        else if(Auth::guard('buyer')->check())
        {
            Auth::guard('buyer')->logout();
        }
        return redirect('/');
    }
    function passwordReminderShow(Request $request)
    {
        return view('email');
    }
    function passwordReminderSend(Request $request)
    {   
        if(Buyers::where('email', '=', $request->email)->exists())
        {
            $pw = Str::random(6);
            DB::update('update buyers set password = ? where email = ?', [Hash::make($pw),$request->email]);
            Mail::to($request->email)->send(new ForgotPasswordMail(['name' =>Buyers::where('email', '=', $request->email)->get('username'),'pw' => $pw]));
            return redirect()->back()->with('siker', 'Az e-mail sikeresen elküldve!');
        }
        else
        {
            return redirect()->back()->withErrors(['message' => 'Ehhez az email címhez nem tartozik felhasználó.']);
        }
    }
}