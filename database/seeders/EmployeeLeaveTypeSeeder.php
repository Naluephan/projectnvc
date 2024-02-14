<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeLeaveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('emp_leave_type')->delete();

        DB::table('emp_leave_type')->insert(array (
            0 =>
            array (
                'id' => 1,
                'leave_type_name' => 'ลาป่วย',
            ),
            1 =>
            array (
                'id' => 2,
                'leave_type_name' => 'ลากิจ',
            ),
            2 =>
            array (
                'id' => 3,
                'leave_type_name' => 'ลาพักร้อน',
            ),
            3 =>
            array (
                'id' => 4,
                'leave_type_name' => 'ลาคลอด',
            ),
            4 =>
            array (
                'id' => 5,
                'leave_type_name' => 'ลาปฏิบัติหน้าที่เกณฑ์ทหาร',
            ),
            5 =>
            array (
                'id' => 6,
                'leave_type_name' => 'ลาบวช',
            ),
        ));
    }
}
