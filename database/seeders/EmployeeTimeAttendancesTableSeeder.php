<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmployeeTimeAttendancesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('employee_time_attendances')->delete();
        
        \DB::table('employee_time_attendances')->insert(array (
            0 => 
            array (
                'id' => 1,
                'emp_id' => '165',
                'month' => 1,
                'year' => 2024,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'emp_id' => '165',
                'month' => 2,
                'year' => 2024,
                'status' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'emp_id' => '165',
                'month' => 3,
                'year' => 2024,
                'status' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'emp_id' => '165',
                'month' => 4,
                'year' => 2024,
                'status' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'emp_id' => '165',
                'month' => 5,
                'year' => 2024,
                'status' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'emp_id' => '165',
                'month' => 6,
                'year' => 2024,
                'status' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'emp_id' => '165',
                'month' => 7,
                'year' => 2024,
                'status' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'emp_id' => '165',
                'month' => 8,
                'year' => 2024,
                'status' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'emp_id' => '165',
                'month' => 9,
                'year' => 2024,
                'status' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'emp_id' => '165',
                'month' => 10,
                'year' => 2024,
                'status' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'emp_id' => '165',
                'month' => 11,
                'year' => 2024,
                'status' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'emp_id' => '165',
                'month' => 12,
                'year' => 2024,
                'status' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}