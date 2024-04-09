<?php

namespace App\Providers;

use App\Models\NewsCategory;
use App\Repositories\AssetCategoryInterface;
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
use App\Repositories\Impl\SalaryRequestSlipRepository;
use App\Repositories\LevelInterface;
use App\Repositories\MasterInterface;
use App\Repositories\PositionInterface;
use App\Repositories\RewardCoinInterface;
use App\Repositories\SalaryTemplateDetailInterface;
use App\Repositories\SalaryTemplateInterface;
use App\Repositories\TasEmployeeInterface;
use App\Repositories\TraningAndSeminarInterface;
use App\Repositories\SalaryRequestSlipInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\EmployeeLeaveQuotasInterface;
use App\Repositories\Impl\AssetCategoryRepository;
use App\Repositories\Impl\EmployeeLeaveQuotasRepository;
use App\Repositories\Impl\SupplyCategoryRepository;
use App\Repositories\Impl\NewsTopicCategoryRepository;
use App\Repositories\SupplyCategoryInterface;
use App\Repositories\NewsCategoryInterface;
use App\Repositories\Impl\NewsCategoryRepository;
use App\Repositories\NewsInterface;
use App\Repositories\NewsTopicCategoryInterface;
use App\Repositories\Impl\NewsRepository;
use App\Repositories\Impl\PositionCleanlineRepository;
use App\Repositories\RewardCoinHistoryInterface;
use App\Repositories\Impl\RewardCoinHistoryRepository;
use App\Repositories\PositionCleanlineInterface;
use App\Repositories\NewsNoticeInterface;
use App\Repositories\Impl\NewsNoticeRepository;
use App\Repositories\NewsNoticeEmployeeInterface;
use App\Repositories\Impl\NewsNoticeEmployeeRepository;
use App\Repositories\NewsTypeInterface;
use App\Repositories\Impl\NewsTypeRepository;
use App\Repositories\Impl\SecuritySettingRepository;
use App\Repositories\SecuritySettingInterface;
use App\Repositories\PickupToolsInterface;
use App\Repositories\Impl\PickupToolsRepository;
use App\Repositories\PickupToolsDeviceTypeInterface;
use App\Repositories\Impl\PickupToolsDeviceTypeRepository;
use App\Repositories\Impl\AdministrativeWorkCategoriesRepository;
use App\Repositories\AdministrativeWorkCategoriesInterface;
use App\Repositories\Impl\MaintenanceSettingRepository;
use App\Repositories\Impl\PrivateCarRepository;
use App\Repositories\MaintenanceSettingInterface;
use App\Repositories\PrivateCarInterface;
use App\Repositories\BuildingLocationInterface;
use App\Repositories\HolidayCategoryInterface;
use App\Repositories\HonorInterface;
use App\Repositories\PersonalInformationInterface;
use App\Repositories\Impl\BuildingLocationRepository;
use App\Repositories\Impl\HolidayCategoryRepository;
use App\Repositories\Impl\HonorRepository;
use App\Repositories\Impl\PersonalInformationRepository;
use App\Repositories\Impl\LocationRepository;
use App\Repositories\Impl\SavingMoneyRepository;
use App\Repositories\Impl\TransactionHistoryRepository;
use App\Repositories\Impl\WorktimeRepository;
use App\Repositories\LocationInterface;
use App\Repositories\SavingMoneyInterface;
use App\Repositories\TransactionHistoryInterface;
use App\Repositories\WorktimeInterface;
use App\Repositories\ContractsCategoriesInterface;
use App\Repositories\GroupInsuranceInterface;
use App\Repositories\Impl\ContractsCategoriesRepository;
use App\Repositories\ReportRepairInterface;
use App\Repositories\Impl\ReportRepairRepository;
use App\Repositories\ContractsDetailsInterface;
use App\Repositories\Impl\ContractsDetailsRepository;
use App\Repositories\Impl\ContractsChangeRepository;
use App\Repositories\ContractsChangeInterface;
use App\Repositories\CommentInterface;
use App\Repositories\Impl\CommentRepository;
use App\Repositories\Impl\GroupInsuranceRepository;
use App\Repositories\Impl\SocialSecurityRepository;
use App\Repositories\Impl\ReserveFundRepository;
use App\Repositories\SocialSecurityInterface;
use App\Repositories\ReserveFundInterface;
use App\Repositories\Impl\PickupToolsEmployeeRepository;
use App\Repositories\PickupToolsEmployeeInterface;
use App\Repositories\Impl\OrganicsHeroMissionEmployeeRepository;
use App\Repositories\Impl\SocialSecurityTypeRepository;
use App\Repositories\OrganicsHeroMissionEmployeeInterface;
use App\Repositories\SocialSecurityTypeInterface;

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
        $this->app->bind(HolidayCategoryInterface::class, HolidayCategoryRepository::class);
        $this->app->bind(TraningAndSeminarInterface::class, TraningAndSeminarRepository::class);
        $this->app->bind(TasEmployeeInterface::class, TasEmployeeRepository::class);
        $this->app->bind(SalaryTemplateDetailInterface::class, SalaryTemplateDetailRepository::class);
        $this->app->bind(SalaryTemplateInterface::class, SalaryTemplateRepository::class);
        $this->app->bind(EmployeePasteCardLogInterface::class, EmployeePasteCardLogRepository::class);
        $this->app->bind(EmployeeLeaveInterface::class, EmployeeLeaveRepository::class);
        $this->app->bind(RewardCoinInterface::class, RewardCoinRepository::class);
        $this->app->bind(EmployeeSalaryInterface::class, EmployeeSalaryRepository::class);
        $this->app->bind(EmployeeTimeAttendanceInterface::class, EmployeeTimeAttendanceRepository::class);
        $this->app->bind(EmployeeLeaveQuotasInterface::class, EmployeeLeaveQuotasRepository::class);
        $this->app->bind(SalaryRequestSlipInterface::class, SalaryRequestSlipRepository::class);
        $this->app->bind(SupplyCategoryInterface::class, SupplyCategoryRepository::class);
        $this->app->bind(NewsTopicCategoryInterface::class, NewsTopicCategoryRepository::class);
        $this->app->bind(AssetCategoryInterface::class, AssetCategoryRepository::class);
        // $this->app->bind(NewsCategoryInterface::class, NewsCategoryRepository::class);
        $this->app->bind(NewsInterface::class, NewsRepository::class);
        $this->app->bind(RewardCoinHistoryInterface::class, RewardCoinHistoryRepository::class);
        $this->app->bind(PositionCleanlineInterface::class, PositionCleanlineRepository::class);
        $this->app->bind(NewsNoticeInterface::class, NewsNoticeRepository::class);
        $this->app->bind(NewsNoticeEmployeeInterface::class, NewsNoticeEmployeeRepository::class);
        $this->app->bind(SecuritySettingInterface::class, SecuritySettingRepository::class);
        $this->app->bind(PickupToolsInterface::class, PickupToolsRepository::class);
        $this->app->bind(PickupToolsDeviceTypeInterface::class, PickupToolsDeviceTypeRepository::class);
        $this->app->bind(AdministrativeWorkCategoriesInterface::class, AdministrativeWorkCategoriesRepository::class);
        $this->app->bind(PrivateCarInterface::class, PrivateCarRepository::class);
        $this->app->bind(MaintenanceSettingInterface::class, MaintenanceSettingRepository::class);
        $this->app->bind(BuildingLocationInterface::class, BuildingLocationRepository::class);
        $this->app->bind(WorktimeInterface::class, WorktimeRepository::class);
        $this->app->bind(LocationInterface::class,LocationRepository::class);
        $this->app->bind(HolidayCategoryInterface::class,HolidayCategoryRepository::class);
        $this->app->bind(BuildingLocationInterface::class,BuildingLocationRepository::class);
        $this->app->bind(PersonalInformationInterface::class,PersonalInformationRepository::class);
        $this->app->bind(ContractsCategoriesInterface::class,ContractsCategoriesRepository::class);
        $this->app->bind(ContractsDetailsInterface::class,ContractsDetailsRepository::class);
        $this->app->bind(ContractsChangeInterface::class,ContractsChangeRepository::class);
        $this->app->bind(ReportRepairInterface::class,ReportRepairRepository::class);
        $this->app->bind(CommentInterface::class,CommentRepository::class);
        $this->app->bind(GroupInsuranceInterface::class,GroupInsuranceRepository::class);
        $this->app->bind(SocialSecurityInterface::class,SocialSecurityRepository::class);
        $this->app->bind(HonorInterface::class,HonorRepository::class);
        $this->app->bind(ReserveFundInterface::class,ReserveFundRepository::class);
        $this->app->bind(TransactionHistoryInterface::class,TransactionHistoryRepository::class);
        $this->app->bind(SavingMoneyInterface::class,SavingMoneyRepository::class);
        $this->app->bind(PickupToolsEmployeeInterface::class,PickupToolsEmployeeRepository::class);
        $this->app->bind(OrganicsHeroMissionEmployeeInterface::class,OrganicsHeroMissionEmployeeRepository::class);
        $this->app->bind(SocialSecurityTypeInterface::class,SocialSecurityTypeRepository::class);








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
