<?php

namespace App\Http\Controllers;

use App\Models\Buyers;
use App\Models\Employee;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function getAdminPage()
    {
        $buyers = Buyers::get();
        $employee = Employee::get();
        return view('admin', compact('buyers', 'employee'));
    }

    function getBuyerUpdate(Buyers $buyers)
    {
        return view('buyerUpdate', compact('buyers'));
    }
    function getEmployeeUpdate(Employee $employees)
    {
        return view('employeeUpdate', compact('employees'));
    }

    function getBuyerCreate()
    {
        return view('buyerCreate');
    }
    function getEmployeeCreate()
    {
        return view('employeeCreate');
    }

    function createEmployee(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'felhasználónév' => 'required|string|min:6|max:30|unique:employees,username',
            'jelszó' => 'required|string|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,30}$/',
            'email' => 'required|email|unique:employees,email|max:30',
            'születésnap' => 'required|date',
            'tel' => 'nullable|string|min:12|max:12',
            'adószám' => 'required|unique:employees,tax_num',
            'tajszám' => 'required|unique:employees,SSN',
            'bankszámlaszám' => 'required|unique:employees,bank_account_number',
            'jogkör' => 'required|in:munkás'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        /*$employee = DB::insert([
            'username' => $request->felhasználónév,
            'password' => Hash::make($request->jelszó),
            'email' => $request->email,
            'birthday' => $request->születésnap,
            'tel' => $request->tel,
            'tax_num' => $request->adószám,
            'SSN' => $request->tajszám,
            'bank_account_number' => $request->bankszámlaszám,
            'role' => $request->jogkör
        ]);*/
        $employee = new Employee;
        $employee->username = $request->felhasználónév;
        $employee->password = Hash::make($request->jelszó);
        $employee->email = $request->email;
        $employee->birthday = $request->születésnap;
        $employee->tel = $request->tel;
        $employee->tax_num = $request->adószám;
        $employee->SSN = $request->tajszám;
        $employee->bank_account_number = $request->bankszámlaszám;
        $employee->role = $request->jogkör;

        abort_if(!$employee->save(),500,'Nem sikerült menteni az adatbázisba!');

        $users = new Users;
        $users->employee_id = Employee::where('username', '=', $request->felhasználónév)->get()[0]->id;

        abort_if(!$users->save(),500,'Nem sikerült menteni az adatbázisba!');
        return redirect('dashboard/admin');
    }
    function updateEmployee(Employee $employees, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'felhasználónév' => 'required|string|min:6|max:30',
            'email' => 'required|email|max:30',
            'születésnap' => 'required|date',
            'tel' => 'nullable|string|min:12|max:12',
            'adószám' => 'required',
            'tajszám' => 'required',
            'bankszámlaszám' => 'required',
            'jogkör' => 'required|in:munkás'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $employees->where('id', '=', $request->id)
        ->update([
            'username' => $request->felhasználónév,
            'email' => $request->email,
            'birthday' => $request->születésnap,
            'tel' => $request->tel,
            'tax_num' => $request->adószám,
            'SSN' => $request->tajszám,
            'bank_account_number' => $request->bankszámlaszám,
            'role' => $request->jogkör
        ]);
        return redirect('dashboard/admin');
    }
    function deleteEmployee(Employee $employees)
    {
        $employees->delete();
        return redirect('dashboard/admin');
    }

    function createBuyer(Request $request)
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
            'invoice_zip' => 'required|string|min:4|max:4',
            'invoice_city' => 'required|string|max:30',
            'invoice_address' => 'required|string|max:50',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $buyers = new Buyers;
        $buyers->username = $request->felhasználónév;
        $buyers->password = Hash::make($request->jelszó);
        $buyers->email = $request->email;
        $buyers->birthday = $request->születésnap;
        $buyers->tel = $request->tel;
        $buyers->name = $request->név;
        $buyers->delivery_zip = $request->delivery_zip;
        $buyers->delivery_address = $request->delivery_address;
        $buyers->delivery_city = $request->delivery_city;
        $buyers->invoice_name = $request->invoice_name;
        $buyers->invoice_company = $request->invoice_company;
        $buyers->invoice_tax = $request->invoice_tax;
        $buyers->invoice_zip = $request->invoice_zip;
        $buyers->invoice_city = $request->invoice_city;
        $buyers->invoice_address = $request->invoice_address;

        abort_if(!$buyers->save(),500,'Nem sikerült menteni az adatbázisba!');

        $users = new Users;
        $users->buyer_id = Buyers::where('username', '=', $request->felhasználónév)->get()[0]->id;

        abort_if(!$users->save(),500,'Nem sikerült menteni az adatbázisba!');
        return redirect('/dashboard/admin');
    }
    function updateBuyer(Buyers $buyers, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'felhasználónév' => 'required|string|min:6|max:30',
            'email' => 'required|email|max:30',
            'születésnap' => 'required|date',
            'telefonszám' => 'nullable|string|min:12|max:12',
            'delivery_zip' => 'required|string|min:4|max:4',
            'delivery_address' => 'required|string|max:50',
            'delivery_city' => 'required|string|max:30',
            'invoice_zip' => 'required|string|min:4|max:4',
            'invoice_city' => 'required|string|max:30',
            'invoice_address' => 'required|string|max:50',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $buyers->where('id', '=', $request->id)
        ->update([
            'username' => $request->felhasználónév,
            'email' => $request->email,
            'birthday' => $request->születésnap,
            'tel' => $request->tel,
            'name' => $request->név,
            'delivery_zip' => $request->delivery_zip,
            'delivery_address' => $request->delivery_address,
            'delivery_city' => $request->delivery_city,
            'invoice_name' => $request->invoice_name,
            'invoice_company' => $request->invoice_company,
            'invoice_tax' => $request->invoice_tax,
            'invoice_zip' => $request->invoice_zip,
            'invoice_city' => $request->invoice_city,
            'invoice_address' => $request->invoice_address
        ]);
        return redirect('dashboard/admin');
    }
    function deleteBuyer(Buyers $buyers)
    {
        $buyers->delete();
        return redirect('/dashboard/admin');
    }
}
