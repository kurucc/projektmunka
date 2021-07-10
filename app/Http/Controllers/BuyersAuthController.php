<?php

namespace App\Http\Controllers;

use App\Models\Buyers;
use Illuminate\Http\Request;
use App\Http\Requests\BuyersRegisterRequest;
use Illuminate\Support\Facades\Hash;

class BuyersAuthController extends Controller
{
    public function showRegister()
    {
        return view('register');
    }
    public function register(BuyersRegisterRequest $request)
    {
        $buyers = new Buyers;
        $buyers->username = $request->felhasználónév;
        $buyers->password = Hash::make($request->password);
        $buyers->email = $request->email;
        $buyers->birthday = $request->birthday;
        $buyers->tel = $request->tel;
        $buyers->name = $request->nev;
        $buyers->delivery_zip = $request->delivery_zip;
        $buyers->delivery_address = $request->delivery_address;
        $buyers->delivery_city = $request->delivery_city;
        $buyers->invoice_name = $request->invoice_name;
        $buyers->invoice_company = $request->invoice_company;
        $buyers->invoice_tax = $request->invoice_tax;
        $buyers->invoice_zip = $request->invoice_zip;
        $buyers->invoice_city = $request->invoice_city;
        $buyers->invoice_address = $request->invoice_address;
        try {
            if($buyers->save())
            {
                return redirect('login');
            }
        } catch (\Throwable $th) {
           return $th;
        }
    }
}