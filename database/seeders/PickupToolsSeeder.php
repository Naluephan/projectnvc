<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PickupToolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pickup_tools')->insert([
            [
                'department_id' => 1,
                'device_types_id' => 1,
                'number_requested' => 24,

            ],
            [
                'department_id' => 1,
                'device_types_id' => 2,
                'number_requested' => 5,

            ],
            [
                'department_id' => 1,
                'device_types_id' => 3,
                'number_requested' => 2,

            ],
            [
                'department_id' => 9,
                'device_types_id' => 2,
                'number_requested' => 10,

            ],
            [
                'department_id' => 9,
                'device_types_id' => 1,
                'number_requested' => 2,

            ],
            [
                'department_id' => 6,
                'device_types_id' => 3,
                'number_requested' => 3,

            ]
        ]);
    }
}
