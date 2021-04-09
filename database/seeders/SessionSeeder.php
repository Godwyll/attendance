<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sessions')->insert([
            'name' => 'Test Session 1',
            'date' => '2021-04-12',
            'start_time' => '08:30',
            'end_time' => '10:30',
            'timetable_id' => '1',
            'user_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'name' => 'Test Session 1',
            'date' => '2021-04-12',
            'start_time' => '12:15',
            'end_time' => '14:25',
            'timetable_id' => '2',
            'user_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'name' => 'Test Session 1',
            'date' => '2021-04-12',
            'start_time' => '16:30',
            'end_time' => '18:30',
            'timetable_id' => '3',
            'user_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'name' => 'Test Session 1',
            'date' => '2021-04-12',
            'start_time' => '18:30',
            'end_time' => '20:30',
            'timetable_id' => '4',
            'user_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
