<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('companies')->delete();
        
        \DB::table('companies')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name_th' => 'บริษัท ด็อกเตอร์ เจล จํากัด',
                'name_en' => 'Doctor Jel Co., Ltd.',
                'short_name' => 'DR.JEL',
            'address_th' => '87/5 หมู่ 2 ต.บ่อพลับ อ.เมือง จ.นครปฐม 73000 (สำนักงานใหญ่)
78/9 หมู่ 3 ต.บ่อพลับ อ.เมือง จ.นครปฐม 73000 (สำนักงานสาขา)',
                'address_en' => 'english address',
                'contact_number' => '094-519-2222',
                'website' => 'www.drjel.co.th',
                'email' => 'contact@drjel.com',
                'logo' => 'DRJEL.png',
                'order_prefix' => 'DEJEL',
                'record_status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name_th' => 'บริษัท ออกานิกคอสเม่ จํากัด',
                'name_en' => 'ORGANICS COSME Co., Ltd.',
                'short_name' => 'ORGANICSCOSME',
            'address_th' => '87/5 หมู่ 2 ต.บ่อพลับ อ.เมือง จ.นครปฐม 73000 (สำนักงานใหญ่)
78/9 หมู่ 3 ต.บ่อพลับ อ.เมือง จ.นครปฐม 73000 (สำนักงานสาขา)',
                'address_en' => 'english address',
                'contact_number' => '0660977900',
                'website' => 'www.organicscosme.com',
                'email' => 'contact@organicscosme.com',
                'logo' => 'COSME.png',
                'order_prefix' => 'COSME',
                'record_status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name_th' => 'บริษัท ออกานิกส์ อินโนเวชั่นส์ จํากัด',
                'name_en' => 'ORGANICS INNOVATION Co., Ltd.',
                'short_name' => 'ORGANICS INNOVATION',
                'address_th' => '78/9 หมู่ 3 ต.บ่อพลับ อ.เมือง จ.นครปฐม 73000',
                'address_en' => 'english address',
                'contact_number' => '0660977900',
                'website' => 'www.organicscosme.com',
                'email' => 'contact@organicscosme.com',
                'logo' => 'INNO.png',
                'order_prefix' => 'INNO',
                'record_status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name_th' => 'บริษัท ออกานิกส์ กรีนส์ฟาร์ม จํากัด',
                'name_en' => 'ORGANICS GREENS FARM Co., Ltd.',
                'short_name' => 'ORGANICS GREENS FARM',
                'address_th' => '78/9 หมู่ 3 ต.บ่อพลับ อ.เมือง จ.นครปฐม 73000',
                'address_en' => 'english address',
                'contact_number' => '0660977900',
                'website' => 'www.organicscosme.com',
                'email' => 'contact@organicscosme.com',
                'logo' => 'GREEN.png',
                'order_prefix' => 'GF',
                'record_status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name_th' => 'บริษัท กิจโชคคอสเมติก 2001 จํากัด',
                'name_en' => 'Co., Ltd.',
                'short_name' => '',
            'address_th' => '87/5 หมู่ 2 ต.บ่อพลับ อ.เมือง จ.นครปฐม 73000 (สำนักงานใหญ่)
78/9 หมู่ 3 ต.บ่อพลับ อ.เมือง จ.นครปฐม 73000 (สำนักงานสาขา)',
                'address_en' => 'english address',
                'contact_number' => '0660977900',
                'website' => '',
                'email' => '',
                'logo' => 'logo_legen.png',
                'order_prefix' => 'KITCHOK',
                'record_status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}