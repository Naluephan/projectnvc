<?php

namespace App\Providers;

use App\Repositories\BaseInterface;
use App\Repositories\CompanyInterface;
use App\Repositories\DepartmentInterface;
use App\Repositories\EmployeeInterface;
use App\Repositories\EmployeePasteCardLogInterface;
use App\Repositories\Impl\BaseRepository;
use App\Repositories\Impl\CompanyRepository;
use App\Repositories\Impl\DepartmentRepository;
use App\Repositories\Impl\EmployeePasteCardLogRepository;
use App\Repositories\Impl\EmployeeRepository;
use App\Repositories\Impl\LevelRepository;
use App\Repositories\Impl\MasterRepository;
use App\Repositories\Impl\PositionRepository;
use App\Repositories\LevelInterface;
use App\Repositories\MasterInterface;
use App\Repositories\PositionInterface;
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
        $this->app->bind(EmployeePasteCardLogInterface::class, EmployeePasteCardLogRepository::class);

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
