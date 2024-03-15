<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('departments')->delete();

        \DB::table('departments')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name_th' => 'บัญชี',
                'name_en' => 'Account',
                'company_id' => '2',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            1 =>
            array (
                'id' => 2,
                'name_th' => 'ประสานงาน',
                'name_en' => 'coordinate',
                'company_id' => '2',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            2 =>
            array (
                'id' => 3,
                'name_th' => 'เอกสารบุคคล',
                'name_en' => 'HR',
                'company_id' => '2',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            3 =>
            array (
                'id' => 4,
                'name_th' => 'โปรดักชัน',
                'name_en' => 'Production',
                'company_id' => '2',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            4 =>
            array (
                'id' => 5,
                'name_th' => 'กราฟิกดีไซน์',
                'name_en' => 'Graphic Design',
                'company_id' => '2',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            5 =>
            array (
                'id' => 6,
                'name_th' => 'ไอที',
                'name_en' => 'IT',
                'company_id' => '2',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            6 =>
            array (
                'id' => 7,
                'name_th' => 'แม่บ้าน',
                'name_en' => 'Maid',
                'company_id' => '2',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            7 =>
            array (
                'id' => 8,
                'name_th' => 'ช่างซ่อมบำรุง',
                'name_en' => 'Maintenance Technician',
                'company_id' => '2',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            8 =>
            array (
                'id' => 9,
                'name_th' => 'ผลิต',
                'name_en' => 'Manufacture',
                'company_id' => '2',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            9 =>
            array (
                'id' => 10,
                'name_th' => 'ผู้จัดการ',
                'name_en' => 'Manager',
                'company_id' => '2',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            10 =>
            array (
                'id' => 11,
                'name_th' => 'ประกันคุณภาพ',
                'name_en' => 'QA',
                'company_id' => '2',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            11 =>
            array (
                'id' => 12,
                'name_th' => 'ควบคุมคุุณภาพ',
                'name_en' => 'QC',
                'company_id' => '2',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            12 =>
            array (
                'id' => 13,
                'name_th' => 'วิจัยและพัฒนา',
                'name_en' => 'RD',
                'company_id' => '2',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            13 =>
            array (
                'id' => 14,
                'name_th' => 'ฝ่ายขาย',
                'name_en' => 'Sales',
                'company_id' => '2',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            14 =>
            array (
                'id' => 15,
                'name_th' => 'เลขานุการ',
                'name_en' => 'Secretary',
                'company_id' => '2',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            15 =>
            array (
                'id' => 16,
                'name_th' => 'คลังสินค้า',
                'name_en' => 'Warehouse',
                'company_id' => '2',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            16 =>
            array (
                'id' => 17,
                'name_th' => 'บัญชี',
                'name_en' => 'Account',
                'company_id' => '3',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            17 =>
            array (
                'id' => 18,
                'name_th' => 'ประสานงาน',
                'name_en' => 'coordinate',
                'company_id' => '3',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            18 =>
            array (
                'id' => 19,
                'name_th' => 'เอกสารบุคคล',
                'name_en' => 'HR',
                'company_id' => '3',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            19 =>
            array (
                'id' => 20,
                'name_th' => 'คนขับรถ',
                'name_en' => 'Driver',
                'company_id' => '3',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            20 =>
            array (
                'id' => 21,
                'name_th' => 'กราฟิกดีไซน์',
                'name_en' => 'Graphic Design',
                'company_id' => '3',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            21 =>
            array (
                'id' => 22,
                'name_th' => 'โปรดักชัน',
                'name_en' => 'Production',
                'company_id' => '3',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            22 =>
            array (
                'id' => 23,
                'name_th' => 'ไอที',
                'name_en' => 'IT',
                'company_id' => '3',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            23 =>
            array (
                'id' => 24,
                'name_th' => 'แม่บ้าน',
                'name_en' => 'Maid',
                'company_id' => '3',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            24 =>
            array (
                'id' => 25,
                'name_th' => 'ช่างซ่อมบำรุง',
                'name_en' => 'Maintenance Technician',
                'company_id' => '3',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            25 =>
            array (
                'id' => 26,
                'name_th' => 'ผลิต',
                'name_en' => 'Manufacture',
                'company_id' => '3',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            26 =>
            array (
                'id' => 27,
                'name_th' => 'ผู้จัดการ',
                'name_en' => 'Manager',
                'company_id' => '3',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            27 =>
            array (
                'id' => 28,
                'name_th' => 'ฝ่ายจัดซื้อ',
                'name_en' => 'Procurement',
                'company_id' => '3',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            28 =>
            array (
                'id' => 29,
                'name_th' => 'ควบคุมคุุณภาพ',
                'name_en' => 'QC',
                'company_id' => '3',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            29 =>
            array (
                'id' => 30,
                'name_th' => 'วิจัยและพัฒนา',
                'name_en' => 'RD',
                'company_id' => '3',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            30 =>
            array (
                'id' => 31,
                'name_th' => 'ฝ่ายขาย',
                'name_en' => 'Sales',
                'company_id' => '3',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            31 =>
            array (
                'id' => 32,
                'name_th' => 'เลขานุการ',
                'name_en' => 'Secretary',
                'company_id' => '3',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            32 =>
            array (
                'id' => 33,
                'name_th' => 'คลังสินค้า',
                'name_en' => 'Warehouse',
                'company_id' => '3',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            33 =>
            array (
                'id' => 34,
                'name_th' => 'คลังสินค้า',
                'name_en' => 'Warehouse',
                'company_id' => '4',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            34 =>
            array (
                'id' => 35,
                'name_th' => 'ผลิต',
                'name_en' => 'Manufacture',
                'company_id' => '1',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            35 =>
            array (
                'id' => 36,
                'name_th' => 'ประสานงาน',
                'name_en' => 'coordinate',
                'company_id' => '1',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            36 =>
            array (
                'id' => 37,
                'name_th' => 'การตลาด',
                'name_en' => 'Marketing',
                'company_id' => '1',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),
            37 =>
            array (
                'id' => 38,
                'name_th' => 'เทเลเซล',
                'name_en' => 'Telesale',
                'company_id' => '1',
                'image_departments' => 'https://img2.pic.in.th/pic/imaged88d4a64660eee9f.png'
            ),

        ));
    }
}
