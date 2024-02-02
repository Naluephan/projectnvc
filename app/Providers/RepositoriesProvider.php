<?php

namespace App\Providers;

use App\Repositories\BaseInterface;
use App\Repositories\CompanyInterface;
use App\Repositories\DepartmentInterface;
use App\Repositories\EmployeeInterface;
use App\Repositories\EmployeeLeaveInterface;
use App\Repositories\EmployeePasteCardLogInterface;
use App\Repositories\EmployeeSalaryInterface;
use App\Repositories\EmployeeTimeAttendanceInterface;
use App\Repositories\HolidayInterface;
use App\Repositories\Impl\BaseRepository;
use App\Repositories\Impl\CompanyRepository;
use App\Repositories\Impl\DepartmentRepository;
use App\Repositories\Impl\EmployeeLeaveRepository;
use App\Repositories\Impl\EmployeePasteCardLogRepository;
use App\Repositories\Impl\EmployeeRepository;
use App\Repositories\Impl\EmployeeSalaryRepository;
use App\Repositories\Impl\EmployeeTimeAttendanceRepository;
use App\Repositories\Impl\HolidayRepository;
use App\Repositories\Impl\LevelRepository;
use App\Repositories\Impl\MasterRepository;
use App\Repositories\Impl\PositionRepository;
use App\Repositories\Impl\RewardCoinRepository;
use App\Repositories\Impl\SalaryTemplateDetailRepository;
use App\Repositories\Impl\SalaryTemplateRepository;
use App\Repositories\Impl\TasEmployeeRepository;
use App\Repositories\Impl\TraningAndSeminarRepository;
use App\Repositories\LevelInterface;
use App\Repositories\MasterInterface;
use App\Repositories\PositionInterface;
use App\Repositories\RewardCoinInterface;
use App\Repositories\SalaryTemplateDetailInterface;
use App\Repositories\SalaryTemplateInterface;
use App\Repositories\TasEmployeeInterface;
use App\Repositories\TraningAndSeminarInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseInterface::class, BaseRepository::class);
        $this->app->bind(MasterInterface::class, MasterRepository::class);
        $this->app->bind(CompanyInterface::class, CompanyRepository::class);
        $this->app->bind(DepartmentInterface::class, DepartmentRepository::class);
        $this->app->bind(PositionInterface::class, PositionRepository::class);
        $this->app->bind(LevelInterface::class, LevelRepository::class);
        $this->app->bind(EmployeeInterface::class, EmployeeRepository::class);
        $this->app->bind(HolidayInterface::class, HolidayRepository::class);
        $this->app->bind(TraningAndSeminarInterface::class, TraningAndSeminarRepository::class);
        $this->app->bind(TasEmployeeInterface::class, TasEmployeeRepository::class);
        $this->app->bind(SalaryTemplateDetailInterface::class, SalaryTemplateDetailRepository::class);
        $this->app->bind(SalaryTemplateInterface::class, SalaryTemplateRepository::class);
        $this->app->bind(EmployeePasteCardLogInterface::class, EmployeePasteCardLogRepository::class);
        $this->app->bind(EmployeeLeaveInterface::class, EmployeeLeaveRepository::class);
        $this->app->bind(RewardCoinInterface::class, RewardCoinRepository::class);
        $this->app->bind(EmployeeSalaryInterface::class, EmployeeSalaryRepository::class);
        $this->app->bind(EmployeeTimeAttendanceInterface::class, EmployeeTimeAttendanceRepository::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
