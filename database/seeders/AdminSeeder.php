<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'username' => 'admin',
            'password' => Hash::make('projektmunka2'),
            'email' => '-',
            'birthday' => '2021-01-01',
            'tax_num' => '0',
            'SSN' => '0',
            'bank_account_number' => '0',
            'role' => 'admin'
        ]);
    }
}
