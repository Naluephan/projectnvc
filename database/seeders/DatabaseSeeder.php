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
        $this->call(EmployeeLeaveQuotasSeeder::class);
        $this->call(SalaryRequestSlipSeeder::class);
        $this->call(EmployeeTimeAttendancesTableSeeder::class);
        $this->call(RewardCoinsTableSeeder::class);
        $this->call(NewsCategoriesSeeder::class);
        $this->call(NewsTypeSeeder::class);
        $this->call(NewsCategoriesSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(RewardCoinHistorySeeder::class);
        $this->call(NewsNoticeSeeder::class);
        $this->call(NewsNoticeEmployeeSeeder::class);
        $this->call(PickupToolsSeeder::class);
        $this->call(PickupToolsDeviceTypeSeeder::class);
        $this->call(administrativeWorkCategoriesSeeder::class);
        $this->call(PrivateCarSeeder::class);
        $this->call(PositionCleanlineSeeder::class);
        $this->call(PickupToolsEmployeeSeeder::class);
        $this->call(OrganicsHeroMissionTypeSeeder::class);
        $this->call(OrganicsHeroMissionCategorySeeder::class);
        $this->call(OrganicsHeroMissionEmployeeSeeder::class);
        $this->call(ContractsCategoriesSeeder::class);
        $this->call(SocialSecurityTypeSeeder::class);
        $this->call(ContractsCategoriesSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(ReportRepair::class);
        $this->call(CommentSeeder::class);
        $this->call(SocialSecurityFileSeeder::class);
        $this->call(SocialSecurityInfoSeeder::class);
        $this->call(SocialSecuritySeeder::class);

    }
}