<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'firstname' => 'Godwyll',
            'lastname' => 'Agyare',
            'username' => 'godwyll',
            'email' => 'a.godwyll@gmail.com',
            'password' => Hash::make('godwyll@123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'firstname' => 'COE',
            'lastname' => 'Admin',
            'username' => 'coe-admin',
            'email' => 'coe@knust.edu.gh',
            'password' => Hash::make('coe@dmin'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'firstname' => 'UITS',
            'lastname' => 'Admin',
            'username' => 'uits-admin',
            'email' => 'uits@knust.edu.gh',
            'password' => Hash::make('uits@dmin21'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        
    }
}
