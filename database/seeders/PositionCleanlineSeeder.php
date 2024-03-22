<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PositionCleanlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('position_clean_lines')->insert([
            [
                'title' => 'รักษาความสะอาดจุดที่ 1',
                'location' => 'ห้องน้ำชั้นที่ 1',
                'time' => '3',
                'time_start' => '08:00',
                'image_location' => 'cleanness.jpg',
            ],
        ]);
    }
}
