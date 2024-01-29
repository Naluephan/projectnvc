<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class EmployeeSalaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('salary_employees')->insert([
                'emp_id', 
                'salary' ,
                'diligence_allowance', 
                'overtime', 
                'fuel_cost', 
                'bonus',
                'interest',
                'commission', 
                'get_orthers',  
                'total_earning', 
                'social_security_fund',  
                'withholding_tax', 
                'deposit',
                'absent_leave_late',
                'company_loan', 
                'deposit_fund',  
                'deduc_others', 
                'total_deductions', 
                'net_pay',  
                'day',
                'month',
                'year' 
            ]);
            
    }
}
