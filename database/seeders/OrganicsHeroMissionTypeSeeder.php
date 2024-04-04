<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class OrganicsHeroMissionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organics_hero_mission_types')->insert([
            [
                'mission_type_name' => 'ภารกิจหลัก',
                'record_status' => 1,
            ],
            [
                'mission_type_name' => 'ภารกิจพิเศษ',
                'record_status' => 1,
            ]
        ]);
    }
}
