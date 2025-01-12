<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialSecurityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hr_social_security_types')->insert([
            [
                'id' => 1,
                'name' => 'เงินสนับสนุน (สงเคราะห์บุตร)',
                'detail' => 'ไม่เกิน 800 บาทต่อเดือน/บุตร 1 คน',
                'company_id' => 1,
                'position_id' => 38,
                'department_id'=>35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ],
            [
                'id' => 2,
                'name' => 'เงินสนับสนุนคลอดบุตร',
                'detail' => 'ค่าคลอดครั้งละ 15,000 บาท ไม่จำกัดจำนวนครั้ง',
                'company_id' => 1,
                'position_id' => 38,
                'department_id'=>35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ],
            [
                'id' => 3,
                'name' => 'ว่างงาน',
                'detail' => 'เงินทดแทน 30% ของค่าจ้างครั้งละไม่เกิน 90 วัน',
                'company_id' => 1,
                'position_id' => 38,
                'department_id'=>35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ],
            [
                'id' => 4,
                'name' => 'เจ็บป่วยฉุกเฉิน/อุบัติเหตุ',
                'detail' => 'ค่ารักษาพยาบาลจะจ่ายให้เท่าที่จ่ายจริงไม่เกิน ครั้งละ 1,000 บาท และจ่ายเพิ่มตามรายการการรักษาที่กําหนด',
                'company_id' => 1,
                'position_id' => 38,
                'department_id'=>35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ],
            [
                'id' => 5,
                'name' => 'ทันตกรรม',
                'detail' => 'รักษาฟันฟรี ปีละ 900 บาท',
                'company_id' => 1,
                'position_id' => 38,
                'department_id'=>35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ],
        ]);
    }
}
