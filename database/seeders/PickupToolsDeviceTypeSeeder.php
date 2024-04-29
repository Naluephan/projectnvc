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
                'type_device' => 1,
                'registration_number' => 'null'
            ],
            [
                'device_types_name' => 'ปากกาไวท์บอร์ด',
                'unit' => 'แท่ง',
                'image' => 'whiteboard_pen.jpg',
                'type_device' => 1,
                'registration_number' => 'null'
            ],
            [
                'device_types_name' => 'หมึกสำหรับตรายาง',
                'unit' => 'ตลับ',
                'image' => 'Ink_for_rubber_stamps.jpg',
                'type_device' => 1,
                'registration_number' => 'null'
            ],
            [
                'device_types_name' => 'คอมพิวเตอร์',
                'unit' => 'เครื่อง',
                'image' => 'notebook.jpg',
                'type_device' => 2,
                'registration_number' => 'COM0001'
            ],
            [
                'device_types_name' => 'โทรศัพท์',
                'unit' => 'เครื่อง',
                'image' => 'iphone.jpg',
                'type_device' => 3,
                'registration_number' => 'PHONE0001'
            ]
        ]);
    }
}
