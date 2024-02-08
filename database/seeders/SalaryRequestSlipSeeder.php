<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SalaryRequestSlipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('salary_request_slips')->insert([
            [
                'emp_id' => 1,
                'month_request' => '1,2,3,4,5,6,7,8,9,10,11,12',
                'reason_request' => 'Apply for credit card, Apply for credit card, Apply for credit card, Apply for credit card, Apply for credit card',
                'request_approve' => 1
            ],
            [
                'emp_id' => 2,
                'month_request' => '4,5,6',
                'reason_request' => 'Apply for credit card222',
                'request_approve' => 1
            ],
            [
                'emp_id' => 3,
                'month_request' => '7,8,9',
                'reason_request' => 'Apply for credit card333',
                'request_approve' => 0
            ],
            [
                'emp_id' => 4,
                'month_request' => '10,11,12',
                'reason_request' => 'Apply for credit card333',
                'request_approve' => 0
            ]
        ]);
    }
}
