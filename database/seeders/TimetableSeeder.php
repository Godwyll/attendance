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
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('timetables')->insert([
            'course_code' => 'TST 102',
            'course_name' => 'Test Course II',
            'class' => 'TS1-TEST2',
            'total_students' => '100',
            'room' => 'TST102',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('timetables')->insert([
            'course_code' => 'DMY 201',
            'course_name' => 'Dummy Course I',
            'class' => 'DM2-DMY1',
            'total_students' => '90',
            'room' => 'DMY101',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('timetables')->insert([
            'course_code' => 'DMY 202',
            'course_name' => 'Dummy Course II',
            'class' => 'DM2-DMY2',
            'total_students' => '90',
            'room' => 'DMY102',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
