<?php

namespace App\Http\Controllers;

use App\Models\Buyers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

class BuyersAuthController extends Controller
{
    public function showRegister()
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
                'email' => 'required|email|unique|max:30',
                'születésnap' => 'required|date',
                'telefonszám' => 'string|min:12|max:12',
                'delivery_zip' => 'required|string|min:4|max:4',
                'delivery_address' => 'required|string|max:50',
                'delivery_city' => 'required|string|max:30',
                'invoice_zip' => 'required|string|min:4|max:4',
                'invoice_city' => 'required|string|max:30',
                'invoice_address' => 'required|string|max:50',
            ]);

            $buyers = new Buyers;
            $buyers->username = $request->felhasználónév;
            $buyers->password = Hash::make($request->password);
            $buyers->email = $request->email;
            $buyers->birthday = $request->birthday;
            $buyers->tel = $request->tel;
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
            
            
            try {
                if($buyers->save())
                {
                    return redirect()->back()->with('siker', 'Sikeres regisztráció, jelentkezz be!');   
                }
            } catch (\Throwable $th) {
                return redirect()->back()->withErrors("Sikertelen regisztráció, próbáld újra!");
            }
        }
        else if($request->has('login'))
        {
            $credentials = $request->validate([
                'username' => ['required'],
                'password' => ['required'],
            ]);
            if(Auth::attempt($credentials))
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
}