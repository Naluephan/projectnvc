<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class OrganicsHeroMissionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organics_hero_mission_categories')->insert([
            [
                'mission_type_id' => '1',
                'mission_category_name' => 'ภารกิจทั่วไป',
                'record_status' => 1,
            ],
            [
                'mission_type_id' => '2',
                'mission_category_name' => 'ภารกิจเพื่อครอบครัว',
                'record_status' => 1,
            ],
            [
                'mission_type_id' => '2',
                'mission_category_name' => 'ภารกิจเพื่อสิ่งแวดล้อม',
                'record_status' => 1,
            ],
            [
                'mission_type_id' => '2',
                'mission_category_name' => 'ภารกิจกอบกู้ Organics',
                'record_status' => 1,
            ]
        ]);
    }
}
