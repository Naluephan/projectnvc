<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrivateCarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('private_cars')->insert([
            [
                'emp_id' => 1,
                'company_id' => 1,
                'department_id' => 1,
                'car_category_id' => 1,
                'car_registration' => '9กย 1234',
                'car_brand' => 'Toyota Yaris ATIV',
                'car_color' => 'ดำ-เทา',
                'car_image' => 'test.png',
                'record_status' => 1,
            ],
        ]);
    }
}
