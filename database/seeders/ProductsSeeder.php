<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++) {
            $random = rand(500,5000);
            $random2 = [null, rand(5,25)];
            $types = ['csempe', 'parketta'];
            DB::table('products')->insert([
                'barcode' => rand(11111111111,99999999999),
                'net_price' => $random,
                'gross_price' => $random + ($random*0.27),
                'VAT' => 27,
                'actual_stock' => rand(5,150),
                'type' => $types[rand(0,1)],
                'width' => rand(50,100),
                'thickness' => rand(25,35),
                'unit' => 'db',
                'description' => 'leírás',
                'sale' => $random2[rand(0,1)],
                'picture_path' => '/pics/test.webp',
                'color' => 'fekete',
                'name' => 'valaminév'
            ]);
        }
    }
}
