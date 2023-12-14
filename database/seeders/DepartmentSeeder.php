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
                'name_th' => 'คนขับรถ',
                'name_en' => 'Driver',
            ),
            1 => 
            array (
                'id' => 2,
                'name_th' => 'คลังสินค้า',
                'name_en' => 'Warehouse',
            ),
            2 => 
            array (
                'id' => 3,
                'name_th' => 'บัญชี',
                'name_en' => 'Account',
            ),
            3 => 
            array ( 
                'id' => 4,
                'name_th' => 'ประสานงาน',
                'name_en' => 'coordinate',
            ),
            4 => 
            array (
                'id' => 5,
                'name_th' => 'ไอที',
                'name_en' => 'IT',
            ),
            5 => 
            array (
                'id' => 6,
                'name_th' => 'เอกสารบุคคล',
                'name_en' => 'HR',
            ),
            6 => 
            array (
                'id' => 7,
                'name_th' => 'ควบคุมคุุณภาพ',
                'name_en' => 'QC',
            ),
            7 => 
            array (
                'id' => 8,
                'name_th' => 'ผลิต',
                'name_en' => 'Manufacture',
            ),
            8 => 
            array (
                'id' => 9,
                'name_th' => 'วิจัยและพัฒนา',
                'name_en' => 'RD',
            ),
            9 => 
            array (
                'id' => 10,
                'name_th' => 'ฝ่ายขาย',
                'name_en' => 'Sales',
            ),
            10 => 
            array (
                'id' => 11,
                'name_th' => 'กราฟิกดีไซน์',
                'name_en' => 'Graphic Design',
            ),
            11 => 
            array (
                'id' => 12,
                'name_th' => 'โปรดักชัน',
                'name_en' => 'Production',
            ),
            12 => 
            array (
                'id' => 13,
                'name_th' => 'เลขานุการ',
                'name_en' => 'Secretary',
            ),
            13 => 
            array (
                'id' => 14,
                'name_th' => 'แม่บ้าน',
                'name_en' => 'Maid',
            ),
            14 => 
            array (
                'id' => 15,
                'name_th' => 'ช่างซ่อมบำรุง',
                'name_en' => 'Maintenance Technician',
            ),
            15 => 
            array (
                'id' => 16,
                'name_th' => 'ฝ่ายจัดซื้อ',
                'name_en' => 'Procurement',
            ),
            16 => 
            array (
                'id' => 17,
                'name_th' => 'ประกันคุณภาพ',
                'name_en' => 'QA',
            ),
            17 => 
            array (
                'id' => 18,
                'name_th' => 'เทเลเซล',
                'name_en' => 'Telesale',
            ),
            18 => 
            array (
                'id' => 19,
                'name_th' => 'การตลาด',
                'name_en' => 'Marketing',
            ),
            19 => 
            array (
                'id' => 20,
                'name_th' => 'ผู้จัดการ',
                'name_en' => 'Manager',
            ),
        ));
    }
}
