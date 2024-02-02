<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class EmployeeTimeAttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 10) as $index) {
            $empId = rand(165, 170);
            DB::table('employee_time_attendance')->insert([
                'emp_id' => $empId,
                'month' => mt_rand(1, 12),
                'year' => 2024,
                'status' =>  mt_rand(0, 2), 
            ]);
        }
    }
}
