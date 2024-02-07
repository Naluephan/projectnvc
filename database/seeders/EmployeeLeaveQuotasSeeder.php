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
                'quota' => 30,
                'year_quota' => 2024,
            ],
            [
                'leave_type_id' => 2,
                'quota' => 3,
                'year_quota' => 2024,
            ],
            [
                'leave_type_id' => 3,
                'quota' => 12,
                'year_quota' => 2024,
            ],
            [
                'leave_type_id' => 4,
                'quota' => 15,
                'year_quota' => 2024,
            ],
            [
                'leave_type_id' => 5,
                'quota' => 5,
                'year_quota' => 2024,
            ],
            [
                'leave_type_id' => 6,
                'quota' => 6,
                'year_quota' => 2024,
            ],
        ]);
    }
}
