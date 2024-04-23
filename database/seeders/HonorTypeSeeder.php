<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HonorTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('honor_types')->insert([
            [
                'id' => 1,
                'name' => 'การอบรมมาตรฐานการให้บริการ',
                'record_status'=>1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ],
            [
                'id' => 2,
                'name' => 'การอบรมมาตรฐานในฐานะผู้ควบคุมและใช้ข้อมูล (DPO)',
                'record_status'=>1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ],
            [
                'id' => 3,
                'name' => 'การอบรมความรู้เกี่ยวกับการบริหารบุคคลเบื้องต้น',
                'record_status'=>1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ],
            [
                'id' => 4,
                'name' => 'การอบรมความรู้เกียวกับการบริหารบุคคลขั้นสูง',
                'record_status'=>1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ],
            [
                'id' => 5,
                'name' => 'การอบรมมาตรฐานการให้บริการ',
                'record_status'=>1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ],
        ]);
    }
}
