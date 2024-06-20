<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'Admin@gmail.com',
                'password' => bcrypt('admin123'),
                'role' => 'Admin'
    
            ],
            [
                'name' => 'Operator',
                'email' => 'operator@gmail.com',
                'password' => bcrypt('operator123'),
                'role' => 'operator'
    
            ]
            ]);
    }
}
