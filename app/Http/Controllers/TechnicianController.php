<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use Illuminate\Http\Request;

class TechnicianController extends Controller
{
    function showTechnicians(Request $request)
    {
        $city = $request->get('city');
        $county = $request->get('county');
        $type = $request->get('type');
        $pageSize = $request->get('pageSize', 15);
        $sortBy = $request->get('sortBy','county');
        $orderBy = $request->get('orderBy','asc');

        $query = Technician::query();
       
        if(!empty($county))
        {
            $query->where('county', '=', $county);
        }
        if(!empty($city))
        {
            $query->join('cities', 'cities.zip_code', 'technicians.zip_code')->where('cities.city_name', '=', $city);
        }
        if(!empty($type))
        {
            $query->where('technicians.type', '=', $type);
        }
        $techs = $query->orderBy($sortBy,$orderBy)->paginate($pageSize);
        return view('technicians', compact('techs'));
    }
}
