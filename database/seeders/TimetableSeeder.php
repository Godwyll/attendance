<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class TimetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('timetables')->insert([
            'course_code' => 'TST 101',
            'course_name' => 'Test Course I',
            'class' => 'TS1-TEST1',
            'total_students' => '100',
            'room' => 'TST101',
            'date' => '2021-04-12',
            'start_time' => '08:30',
            'end_time' => '10:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('timetables')->insert([
            'course_code' => 'TST 102',
            'course_name' => 'Test Course II',
            'class' => 'TS1-TEST2',
            'total_students' => '100',
            'room' => 'TST102',
            'date' => '2021-04-12',
            'start_time' => '12:15',
            'end_time' => '14:25',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('timetables')->insert([
            'course_code' => 'DMY 201',
            'course_name' => 'Dummy Course I',
            'class' => 'DM2-DMY1',
            'total_students' => '90',
            'room' => 'DMY101',
            'date' => '2021-04-12',
            'start_time' => '16:30',
            'end_time' => '18:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('timetables')->insert([
            'course_code' => 'DMY 202',
            'course_name' => 'Dummy Course II',
            'class' => 'DM2-DMY2',
            'total_students' => '90',
            'room' => 'DMY102',
            'date' => '2021-04-12',
            'start_time' => '18:30',
            'end_time' => '20:30',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
