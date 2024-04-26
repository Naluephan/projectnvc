<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PickupToolsDeviceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pickup_tools_device_types')->insert([
            [
                'device_types_name' => 'กระดาษ A4',
                'unit' => 'รีม',
                'image' => 'A4_paper.jpg',
            ],
            [
                'device_types_name' => 'ปากกาไวท์บอร์ด',
                'unit' => 'แท่ง',
                'image' => 'whiteboard_pen.jpg',
            ],
            [
                'device_types_name' => 'หมึกสำหรับตรายาง',
                'unit' => 'ตลับ',
                'image' => 'Ink_for_rubber_stamps.jpg',
            ]
        ]);
    }
}
