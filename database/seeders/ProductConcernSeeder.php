<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductConcernSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_concerns')->insert([
            ['name' => 'Dairy is getting burnt', 'rate'=>'205','products'=>'Cremagic'],
            ['name' => 'Chocolate cost is increasing', 'rate'=>'220','products'=>'RTB'],
            ['name' => 'Need more variety', 'rate'=>'226','products'=>'RTU Hazelnut'],
            ['name' => 'Dont want to depend on labour', 'rate'=>'277','products'=>'RTU'],
            ['name' => 'Truffle takes a lot of time', 'rate'=>'277','products'=>'RTU'],
            ['name' => 'Want high quality truffle', 'rate'=>'362','products'=>'RTU GS'],
            ['name' => 'Others', 'rate'=>'210','products'=>'Others'],
        ]);
    }
}
