<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class EmployeeSalaryTableSeederCopy extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1,50) as $index){
            $empId = rand(1, 50);
            $random_salary = rand(10000, 100000); 
            $random_diligence_allowance = 500; 
            $random_overtime = rand(0, 5000);
            $random_fuel_cost = 500;
            $random_bonus = rand(0, 2000);
            $random_interest = rand(0, 1000);
            $random_commission = rand(0, 5000);
            $random_get_orthers = rand(0, 1000);
            $total_earning = ($random_salary + $random_diligence_allowance + $random_overtime + $random_fuel_cost + $random_bonus + $random_interest + $random_commission + $random_get_orthers);
            $calculated_social_security_fund = ($random_salary * 5) / 100;
            $social_security_fund = $calculated_social_security_fund > 750 ? 750 : $calculated_social_security_fund;
            $withholding_tax = 0;
            $deposit = 0;
            $absent_leave_late = rand(0, 10);
            $company_loan = 0;
            $random_deposit_fund = rand(300, 500);
            $random_deduc_others = rand(300, 500);
            $total_deductions = $social_security_fund + $withholding_tax + $deposit + $company_loan + $random_deposit_fund + $random_deduc_others;
            $net_pay = $random_salary - $total_deductions;





            $randomDate = \Carbon\Carbon::createFromDate(2023, 1, 1)->addDays(rand(0, 398));

            DB::table('salary_employees')->insert([
                'emp_id' => $empId,
                'salary' => $random_salary,
                'diligence_allowance' => $random_diligence_allowance,
                'overtime' => $random_overtime,
                'fuel_cost' => $random_fuel_cost,
                'bonus' => $random_bonus,
                'interest' => $random_interest,
                'commission' => $random_commission, 
                'get_orthers' => $random_get_orthers, 
                'total_earning' =>$total_earning, 
                'social_security_fund' => $social_security_fund, 
                'withholding_tax' => $withholding_tax,
                'deposit' => $deposit,
                'absent_leave_late' => $absent_leave_late,
                'company_loan' => $company_loan, 
                'deposit_fund' => $random_deposit_fund , 
                'deduc_others' => $random_deduc_others, 
                'total_deductions' => $total_deductions, 
                'net_pay' => $net_pay, 
                'day' => 0,
                'month' => $randomDate->month,
                'year' => $randomDate->year,
            ]);
        }
            
    }
}
