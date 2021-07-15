<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $zips = ["9000", "9233", "9246"];
        $cities = ['Győr', 'Lipót', 'Mosonmagyaróvár'];
        $longs = ["47.6695705", "47.8587464", "47.8436615"];
        $langs = ["17.4657933", "17.4156045", "17.2085012"];
        for ($i=0; $i < count($cities); $i++) { 
            DB::table('cities')->insert([
                'zip_code' => $zips[$i],
                'city_name' => $cities[$i],
                'long_coord' =>$longs[$i],
                'lang_coord' =>$langs[$i],
            ]);
        }
        
    }
}
