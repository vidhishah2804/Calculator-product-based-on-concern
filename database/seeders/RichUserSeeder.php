<?php

namespace Database\Seeders;

use App\Models\rich_users;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RichUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rich_users')->insert([
            'email' => 'test@rich.com',
            'password' => 'Rich@123',
        ]);
    }
}
