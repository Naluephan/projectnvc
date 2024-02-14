<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class EmployeeLeaveQuotasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('employee_leave_quotas')->insert([
            [
                'leave_type_id' => 1,
                'emp_id' => 165,
                'quota' => 30,
                'year_quota' => 2024,
            ],
            [
                'leave_type_id' => 2,
                'emp_id' => 165,
                'quota' => 3,
                'year_quota' => 2024,
            ],
            [
                'leave_type_id' => 3,
                'emp_id' => 165,
                'quota' => 6,
                'year_quota' => 2024,
            ],
            [
                'leave_type_id' => 4,
                'emp_id' => 165,
                'quota' => 98,
                'year_quota' => 2024,
            ],
            [
                'leave_type_id' => 5,
                'emp_id' => 165,
                'quota' => 60,
                'year_quota' => 2024,
            ],
            [
                'leave_type_id' => 6,
                'emp_id' => 165,
                'quota' => 30,
                'year_quota' => 2024,
            ],
            [
                'leave_type_id' => 1,
                'emp_id' => 2,
                'quota' => 30,
                'year_quota' => 2024,
            ],
            [
                'leave_type_id' => 2,
                'emp_id' => 2,
                'quota' => 3,
                'year_quota' => 2024,
            ],
            [
                'leave_type_id' => 3,
                'emp_id' => 2,
                'quota' => 2,
                'year_quota' => 2024,
            ],
            [
                'leave_type_id' => 4,
                'emp_id' => 2,
                'quota' => 98,
                'year_quota' => 2024,
            ],
            [
                'leave_type_id' => 5,
                'emp_id' => 2,
                'quota' => 60,
                'year_quota' => 2024,
            ],
            [
                'leave_type_id' => 6,
                'emp_id' => 2,
                'quota' => 30,
                'year_quota' => 2024,
            ],
        ]);
    }
}
