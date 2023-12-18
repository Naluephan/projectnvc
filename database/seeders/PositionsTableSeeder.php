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
                'name_th' => 'ผู้ช่วยผู้จัดการฝ่ายบัญชี',
                'name_en' => '',
                'department_id' => '1',
                'company_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name_th' => 'เจ้าหน้าที่ฝ่ายบัญชี',
                'name_en' => '',
                'department_id' => '1',
                'company_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name_th' => 'เจ้าหน้าทีฝ่ายประสานงาน',
                'name_en' => '',
                'department_id' => '2',
                'company_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name_th' => 'เจ้าหน้าทีฝ่ายประสานงานฝ่ายแพ็คเกจ',
                'name_en' => '',
                'department_id' => '2',
                'company_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name_th' => 'เจ้าหน้าทีฝ่ายประสานงานฝ่ายวิจัยและพัฒนา',
                'name_en' => '',
                'department_id' => '2',
                'company_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name_th' => 'ผู้ช่วยผู้จัดการฝ่ายเอกสารบุคคล',
                'name_en' => '',
                'department_id' => '3',
                'company_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name_th' => 'เจ้าหน้าที่ฝ่ายเอกสารบุคคล',
                'name_en' => '',
                'department_id' => '3',
                'company_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name_th' => 'เจ้าหน้าที่ฝ่ายโปรดักชัน',
                'name_en' => '',
                'department_id' => '4',
                'company_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name_th' => 'เจ้าหน้าที่ฝ่ายกราฟิกดีไซน์',
                'name_en' => '',
                'department_id' => '5',
                'company_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name_th' => 'เจ้าหน้าทีฝ่าย IT',
                'name_en' => '',
                'department_id' => '6',
                'company_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name_th' => 'เจ้าหน้าที่ฝ่ายแม่บ้าน',
                'name_en' => '',
                'department_id' => '7',
                'company_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name_th' => 'เจ้าหน้าที่ฝ่ายช่างซ่อมบํารุง',
                'name_en' => '',
                'department_id' => '8',
                'company_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name_th' => 'เจ้าหน้าที่ฝ่ายผลิต',
                'name_en' => '',
                'department_id' => '9',
                'company_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name_th' => 'หัวหน้าฝ่ายประกันคุณภาพ',
                'name_en' => '',
                'department_id' => '11',
                'company_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name_th' => 'หัวหน้าฝ่ายควบคุมคุุณภาพ',
                'name_en' => '',
                'department_id' => '12',
                'company_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name_th' => 'ผู้ช่วยหัวหน้าฝ่ายควบคุมคุุณภาพ',
                'name_en' => '',
                'department_id' => '12',
                'company_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name_th' => 'เจ้าหน้าที่ฝ่ายควบคุมคุุณภาพ',
                'name_en' => '',
                'department_id' => '12',
                'company_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'name_th' => 'ผู้จัดการฝ่ายวิจัยและพัฒนา',
                'name_en' => '',
                'department_id' => '13',
                'company_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'name_th' => 'หัวหน้าฝ่ายวิจัยและพัฒนา',
                'name_en' => '',
                'department_id' => '13',
                'company_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'name_th' => 'ผู้ช่วยฝ่ายวิจัยและพัฒนา',
                'name_en' => '',
                'department_id' => '13',
                'company_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'name_th' => 'เจ้าหน้าที่ฝ่ายวิจัยและพัฒนา',
                'name_en' => '',
                'department_id' => '13',
                'company_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'name_th' => 'เจ้าหน้าที่ฝ่ายขาย',
                'name_en' => '',
                'department_id' => '14',
                'company_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'name_th' => 'เลขานุการ',
                'name_en' => '',
                'department_id' => '15',
                'company_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'name_th' => 'ผู้ช่วยฝ่ายคลังสินค้า',
                'name_en' => '',
                'department_id' => '16',
                'company_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'name_th' => 'เจ้าหน้าที่ฝ่ายคลังสินค้า',
                'name_en' => '',
                'department_id' => '16',
                'company_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'name_th' => 'ผู้จัดการโรงงาน',
                'name_en' => '',
                'department_id' => '10',
                'company_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            )
            ,
            26 => 
            array (
                'id' => 27,
                'name_th' => 'เจ้าหน้าที่ฝ่ายบัญชี',
                'name_en' => '',
                'department_id' => '17',
                'company_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'name_th' => 'เจ้าหน้าทีฝ่ายประสานงาน',
                'name_en' => '',
                'department_id' => '18',
                'company_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'name_th' => 'เจ้าหน้าทีฝ่ายประสานงานฝ่ายวิจัยและพัฒนา',
                'name_en' => '',
                'department_id' => '18',
                'company_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'name_th' => 'รองหัวหน้าฝ่ายเอกสารบุคคล',
                'name_en' => '',
                'department_id' => '19',
                'company_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'name_th' => 'พนักงานขับรถ',
                'name_en' => '',
                'department_id' => '20',
                'company_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'name_th' => 'เจ้าหน้าที่ฝ่ายกราฟิกดีไซน์',
                'name_en' => '',
                'department_id' => '21',
                'company_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'name_th' => 'เจ้าหน้าที่ฝ่ายโปรดักชัน',
                'name_en' => '',
                'department_id' => '22',
                'company_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'name_th' => 'เจ้าหนาที่ฝ่ายเอกสารบุคคล',
                'name_en' => '',
                'department_id' => '19',
                'company_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'name_th' => 'ผู้ช่วยผู้จัดการฝ่าย IT',
                'name_en' => '',
                'department_id' => '23',
                'company_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'name_th' => 'เจ้าหน้าที่ฝ่าย IT',
                'name_en' => '',
                'department_id' => '23',
                'company_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'name_th' => 'เจ้าหน้าที่ฝ่ายแม่บ้าน',
                'name_en' => '',
                'department_id' => '24',
                'company_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'name_th' => 'เจ้าหน้าที่ฝ่ายช่างซ่อมบํารุง',
                'name_en' => '',
                'department_id' => '25',
                'company_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'name_th' => 'เจ้าหน้าที่ฝ่ายผลิต',
                'name_en' => '',
                'department_id' => '26',
                'company_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'name_th' => 'ผู้ช่วยผู้จัดการฝ่ายผลิต',
                'name_en' => '',
                'department_id' => '26',
                'company_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'name_th' => 'เจ้าหน้าทีฝ่ายประสานงานฝ่ายแพ็คเกจ',
                'name_en' => '',
                'department_id' => '18',
                'company_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'name_th' => 'ผู้จัดการโรงงาน',
                'name_en' => '',
                'department_id' => '27',
                'company_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'name_th' => 'ผู้ช่วยผู้จัดการโรงงาน',
                'name_en' => '',
                'department_id' => '27',
                'company_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'name_th' => 'เจ้าหน้าที่ฝ่ายจัดซื้อ',
                'name_en' => '',
                'department_id' => '28',
                'company_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'name_th' => 'หัวหน้าฝ่ายควบคุมคุุณภาพ',
                'name_en' => '',
                'department_id' => '29',
                'company_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'name_th' => 'เจ้าหน้าที่ฝ่ายควบคุมคุุณภาพ',
                'name_en' => '',
                'department_id' => '29',
                'company_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'name_th' => 'ผู้ช่วยหัวหน้าฝ่ายควบคุมคุุณภาพ',
                'name_en' => '',
                'department_id' => '29',
                'company_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'name_th' => 'เจ้าหน้าที่ประสานงานฝ่ายวิจัยและพัฒนา',
                'name_en' => '',
                'department_id' => '18',
                'company_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'name_th' => 'หัวหน้าฝ่ายวิจัยและพัฒนา',
                'name_en' => '',
                'department_id' => '30',
                'company_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'name_th' => 'เจ้าหน้าที่ฝ่ายวิจัยและพัฒนา',
                'name_en' => '',
                'department_id' => '30',
                'company_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
                'name_th' => 'ผู้ช่วยหัวหน้าฝ่ายขาย',
                'name_en' => '',
                'department_id' => '31',
                'company_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
                'name_th' => 'เจ้าหน้าที่ประสานงานฝ่ายขาย',
                'name_en' => '',
                'department_id' => '18',
                'company_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            )
            ,
            52 => 
            array (
                'id' => 53,
                'name_th' => 'เจ้าหน้าที่ฝ่ายขาย',
                'name_en' => '',
                'department_id' => '31',
                'company_id' => '4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 54,
                'name_th' => 'เลขานุการ',
                'name_en' => '',
                'department_id' => '32',
                'company_id' => '4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 55,
                'name_th' => 'เจ้าหน้าที่ฝ่ายคลังสินค้า',
                'name_en' => '',
                'department_id' => '33',
                'company_id' => '4',
                'created_at' => NULL,
                'updated_at' => NULL,
            )
            ,
            55 => 
            array (
                'id' => 56,
                'name_th' => 'เจ้าหน้าที่ฝ่ายผลิต',
                'name_en' => '',
                'department_id' => '35',
                'company_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 57,
                'name_th' => 'เจ้าหน้าทีฝ่ายประสานงาน',
                'name_en' => '',
                'department_id' => '36',
                'company_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 58,
                'name_th' => 'เจ้าหน้าที่ฝ่ายการตลาด',
                'name_en' => '',
                'department_id' => '37',
                'company_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 59,
                'name_th' => 'ผู้จัดการฝ่ายเทเลเซล',
                'name_en' => '',
                'department_id' => '38',
                'company_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 60,
                'name_th' => 'เจ้าหน้าที่ฝ่ายเทเลเซล',
                'name_en' => '',
                'department_id' => '38',
                'company_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 61,
                'name_th' => 'หัวหน้าฝ่ายคลังสินค้า',
                'name_en' => '',
                'department_id' => '34',
                'company_id' => '4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 62,
                'name_th' => 'ผู้ช่วยหัวหน้าฝ่ายคลังสินค้า',
                'name_en' => '',
                'department_id' => '34',
                'company_id' => '4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 63,
                'name_th' => 'เจ้าหน้าที่ฝ่ายคลังสินค้า',
                'name_en' => '',
                'department_id' => '34',
                'company_id' => '4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}