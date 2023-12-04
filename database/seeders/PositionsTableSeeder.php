<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('positions')->delete();
        
        \DB::table('positions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name_th' => 'พนักงานผลิต',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name_th' => 'หัวหน้าผลิต',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name_th' => 'พนักงาน QC',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name_th' => 'คลังสินค้า',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name_th' => 'แม่บ้าน',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name_th' => 'เอกสาร',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name_th' => 'ช่างซ่อมบำรุง',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name_th' => 'บัญชี',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name_th' => 'ประกันคุณภาพ',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name_th' => 'R&D',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name_th' => 'กราฟิกโปรดักชั่น',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name_th' => 'กราฟิกดีไซน์',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name_th' => 'พนักงานควบคุมคุณภาพ',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name_th' => 'ประสานงาน PK',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name_th' => 'ประสานงาน',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name_th' => 'Sale',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name_th' => 'IT Support',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'name_th' => 'จัดซื้อ',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'name_th' => 'Manager',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'name_th' => 'ประสานงานบรรจุภัณฑ์',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'name_th' => 'พนักงาน',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'name_th' => 'บุคคล',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'name_th' => 'ผู้จัดการฝ่ายผลิต',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'name_th' => 'หัวหน้าเทเลเซลล์',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'name_th' => 'เทเลเซลล์',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'name_th' => 'รองหัวหน้าคลังสินค้า',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'name_th' => 'พนักงานคลังสินค้า',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'name_th' => 'ผู้ช่วยฝ่ายยานยนต์',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'name_th' => 'ประสานงานทั่วไป',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'name_th' => 'QC RM',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'name_th' => 'ผู้ช่วยRDเสริมอาหาร',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'name_th' => 'ผู้ช่วย QC เสริมอาหาร',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'name_th' => 'ผู้ช่วยหัวหน้าฝ่ายผลิต',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'name_th' => 'ผู้ช่วยฝ่ายผลิตINNO',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'name_th' => 'ฝ่ายควบคุมคุณภาพ',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'name_th' => 'ผู้ช่วยผู้จัดการโรงงานฝ่ายเสริมอาหาร',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'name_th' => 'ฝ่ายเอกสารบุคคล',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'name_th' => 'ฝ่ายผู้ช่วยฝ่ายขาย',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'name_th' => 'ฝ่ายประสานงานลูกค้า',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'name_th' => 'ผู้จัดการฝ่ายเทเลเซล',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'name_th' => 'ประสานงาน R&D',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'name_th' => 'R&D Manager',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'name_th' => 'เอกสารบุคคล',
                'name_en' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}