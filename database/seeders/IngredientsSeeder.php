<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ingredients')->insert([
            ['name' => 'Amul', 'list_type' => 'list_one'],
            ['name' => 'Whipped Topping', 'list_type' => 'list_one'],
            ['name' => 'Dairy Cream', 'list_type' => 'list_one'],
            ['name' => 'Milk', 'list_type' => 'list_one'],

            ['name' => 'Morde CO D15', 'list_type' => 'list_two'],
            ['name' => 'Morde CO D16', 'list_type' => 'list_two'],
            ['name' => '2 M', 'list_type' => 'list_two'],
            ['name' => 'Goodrich', 'list_type' => 'list_two'],
            ['name' => 'Van Houten', 'list_type' => 'list_two'],
            ['name' => 'Barry Callebaut', 'list_type' => 'list_two'],
            ['name' => 'Others', 'list_type' => 'list_two'],
        ]);
    
    }
}
