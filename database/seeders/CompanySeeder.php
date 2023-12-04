<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('companies')->delete();

        \DB::table('companies')->insert([
            [
                'name_th' => 'บริษัท ด็อกเตอร์ เจล จํากัด',
                'name_en' => 'Doctor Jel Co., Ltd.',
                'email' => 'contact@drjel.com',
                'address_th' => '87/5 หมู่ 2 ต.บ่อพลับ อ.เมือง จ.นครปฐม 73000 (สำนักงานใหญ่)
                    78/9 หมู่ 3 ต.บ่อพลับ อ.เมือง จ.นครปฐม 73000 (สำนักงานสาขา)',
                'address_en' => 'english address',
                'website' => 'www.drjel.co.th',
                'contact_number' => '094-519-2222',
                'logo' => 'logo_drjel.jpg',
                'order_prefix' => 'DR_JEL',
                'short_name' => 'DR.JEL',
                'record_status' => 1,
            ],
            [
                'name_th' => 'บริษัท ออกานิกคอสเม่ จํากัด',
                'name_en' => 'ORGANICS COSME Co., Ltd.',
                'email' => 'contact@organicscosme.com',
                'address_th' => '87/5 หมู่ 2 ต.บ่อพลับ อ.เมือง จ.นครปฐม 73000 (สำนักงานใหญ่)
                    78/9 หมู่ 3 ต.บ่อพลับ อ.เมือง จ.นครปฐม 73000 (สำนักงานสาขา)',
                'address_en' => 'english address',
                'website' => 'www.organicscosme.com',
                'contact_number' => '0660977900',
                'logo' => '',
                'order_prefix' => 'OGN_COSME',
                'short_name' => 'ORGANICSCOSME',
                'record_status' => 1,
            ],
            [
                'name_th' => 'บริษัท ออกานิกส์ อินโนเวชั่นส์ จํากัด',
                'name_en' => 'ORGANICS INNOVATION Co., Ltd.',
                'email' => 'contact@organicscosme.com',
                'address_th' => '78/9 หมู่ 3 ต.บ่อพลับ อ.เมือง จ.นครปฐม 73000',
                'address_en' => 'english address',
                'website' => 'www.organicscosme.com',
                'contact_number' => '0660977900',
                'logo' => '',
                'order_prefix' => 'OGN_INNO',
                'short_name' => 'ORGANICS INNOVATION',
                'record_status' => 1,
            ],
            [
                'name_th' => 'บริษัท ออกานิกส์ กรีนส์ฟาร์ม จํากัด',
                'name_en' => 'ORGANICS GREENS FARM Co., Ltd.',
                'email' => 'contact@organicscosme.com',
                'address_th' => '78/9 หมู่ 3 ต.บ่อพลับ อ.เมือง จ.นครปฐม 73000',
                'address_en' => 'english address',
                'website' => 'www.organicscosme.com',
                'contact_number' => '0660977900',
                'logo' => '',
                'order_prefix' => 'OGN_GREEN',
                'short_name' => 'ORGANICS GREENS FARM',
                'record_status' => 1,
            ],
            [
                'name_th' => 'บริษัท กิจโชคคอสเมติก 2001 จํากัด',
                'name_en' => 'Co., Ltd.',
                'email' => '',
                'address_th' => '87/5 หมู่ 2 ต.บ่อพลับ อ.เมือง จ.นครปฐม 73000 (สำนักงานใหญ่)
                78/9 หมู่ 3 ต.บ่อพลับ อ.เมือง จ.นครปฐม 73000 (สำนักงานสาขา)',
                'address_en' => 'english address',
                'website' => '',
                'contact_number' => '0660977900',
                'logo' => '',
                'order_prefix' => '',
                'short_name' => '',
                'record_status' => 1,
            ]
        ]);
    }
}
