<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BuildingLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hr_building_locations')->insert([
            [
                'id' => 1,
                'location_name' => 'อาคารบริษัท ออกานิกส์ อินโนเวชั่นส์ จํากัด',
                'location_img' => '',
                'total_floors' => 3,
                'total_rooms' => 3,
                'record_status' => 1
            ],[
                'id' => 2,
                'location_name' => 'อาคารบริษัท ออกานิกคอสเม่ จํากัด',
                'location_img' => '',
                'total_floors' => 1,
                'total_rooms' => 1,
                'record_status' => 1
            ]
        ]);
    }
}
