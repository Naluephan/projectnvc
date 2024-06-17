<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hr_locations')->insert([
            [
                'id' => 1,
                'building_location_id' => 1,
                'place_name' => 'โรงอาหาร',
                'floor' => 1,
            ],[
                'id' => 2,
                'building_location_id' => 1,
                'place_name' => 'ห้อง IT, Production',
                'floor' => 2,
            ],[
                'id' => 3,
                'building_location_id' => 1,
                'place_name' => 'ห้อง Sale, HR',
                'floor' => 3,
            ],[
                'id' => 4,
                'building_location_id' => 2,
                'place_name' => 'ห้องผลิต 1',
                'floor' => 1,
            ]
        ]);
    }
}
