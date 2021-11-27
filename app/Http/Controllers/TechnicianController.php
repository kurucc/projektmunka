<?php

namespace App\Http\Controllers;

use App\Models\Cities;
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
        $sortBy = $request->get('sortBy', 'county');
        $orderBy = $request->get('orderBy', 'asc');

        $counties = Technician::query()->distinct()->pluck('county');
        $cities = Cities::query()
            ->distinct()
            ->pluck('city_name');
        $query = Technician::query()
            ->join('cities', 'cities.zip_code', 'technicians.zip_code');

        if (!empty($county)) {
            if ($county != 'Összes') {
                $query->where('county', '=', $county);
            }
        }
        if (!empty($city)) {
            if ($city != 'Összes') {
                $query->where('cities.city_name', '=', $city);
            }
        }
        if (!empty($type)) {
            if ($type != 'Összes') {
                $query->where('technicians.type', '=', $type);
            }
        }
        $techs = $query->orderBy($sortBy, $orderBy)->paginate($pageSize);
        return view('technicians', compact('techs', 'counties', 'cities'));
    }
}
