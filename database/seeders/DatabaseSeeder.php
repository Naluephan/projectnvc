<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(CompanySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(GendersTableSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(employeeLeaveSeeder::class);
        $this->call(EmployeeLeaveTypeSeeder::class);
        $this->call(EmployeePasteCardLogsSeeder::class);
        $this->call(RewardCoinTableSeeder::class);
        $this->call(EmployeeSalaryTableSeederCopy::class);
        //$this->call(EmployeeTimeAttendanceSeeder::class);
        $this->call(EmployeeLeaveQuotasSeeder::class);
        $this->call(SalaryRequestSlipSeeder::class);

        $this->call(EmployeeTimeAttendancesTableSeeder::class);
        //$this->call(EmployeeLeaveQuotasTableSeeder::class);
        $this->call(RewardCoinsTableSeeder::class);
        $this->call(NewsCategoriesSeeder::class);
    }
}
