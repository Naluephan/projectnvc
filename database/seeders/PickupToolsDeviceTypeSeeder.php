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
            ],
            [
                'name_category' => 'ปากกาไวท์บอร์ด',
                'unit' => 'แท่ง',
            ],
            [
                'name_category' => 'หมึกสำหรับตรายาง',
                'unit' => 'ตลับ',
            ]
        ]);
    }
}
