<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmployeeLeaveQuotasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('employee_leave_quotas')->delete();
        
        \DB::table('employee_leave_quotas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'emp_id' => 165,
                'leave_type_id' => 1,
                'quota' => 30,
                'year_quota' => 2024,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'emp_id' => 165,
                'leave_type_id' => 2,
                'quota' => 3,
                'year_quota' => 2024,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'emp_id' => 165,
                'leave_type_id' => 3,
                'quota' => 12,
                'year_quota' => 2024,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'emp_id' => 165,
                'leave_type_id' => 4,
                'quota' => 15,
                'year_quota' => 2024,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'emp_id' => 165,
                'leave_type_id' => 5,
                'quota' => 5,
                'year_quota' => 2024,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'emp_id' => 165,
                'leave_type_id' => 6,
                'quota' => 6,
                'year_quota' => 2024,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'emp_id' => 2,
                'leave_type_id' => 1,
                'quota' => 30,
                'year_quota' => 2024,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'emp_id' => 2,
                'leave_type_id' => 2,
                'quota' => 3,
                'year_quota' => 2024,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'emp_id' => 2,
                'leave_type_id' => 3,
                'quota' => 6,
                'year_quota' => 2024,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'emp_id' => 2,
                'leave_type_id' => 4,
                'quota' => 15,
                'year_quota' => 2024,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'emp_id' => 2,
                'leave_type_id' => 5,
                'quota' => 5,
                'year_quota' => 2024,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'emp_id' => 2,
                'leave_type_id' => 6,
                'quota' => 6,
                'year_quota' => 2024,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}