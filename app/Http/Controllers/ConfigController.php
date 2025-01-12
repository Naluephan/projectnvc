<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Location;
use App\Repositories\CompanyInterface;
use App\Repositories\DepartmentInterface;
use App\Repositories\PickupToolsDeviceTypeInterface;
use App\Repositories\LocationInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ConfigController extends Controller
{

    private $companyRepository, $departmentRepository, $pickupToolsDeviceTypeRepository, $LocationRepository;

    public function __construct(
        CompanyInterface $companyRepository,
        DepartmentInterface $departmentRepository,
        PickupToolsDeviceTypeInterface $pickupToolsDeviceTypeRepository,
        LocationInterface $LocationRepository
    )
    {
        $this->companyRepository = $companyRepository;
        $this->departmentRepository = $departmentRepository;
        $this->pickupToolsDeviceTypeRepository = $pickupToolsDeviceTypeRepository;
        $this->LocationRepository = $LocationRepository;

    }

    public function configMenu()
    {
        return view('setting_menu');
    }
    public function configTools()
    {
        return view('setting.tools');
    }
    public function configAsset()
    {
        return view('setting.asset');
    }

    public function configDepartment()
    {
        $companies = $this->companyRepository->all();
        return view('setting.department',compact('companies'));
    }

    public function configPickupTools()
    {
        $companies = $this->companyRepository->all();
        $department = $this->departmentRepository->all();
        $pickupToolsType = $this->pickupToolsDeviceTypeRepository->all();
        return view('setting.pickuptools',compact('department', 'pickupToolsType','companies'));
    }

    public function listSupply()
    {
        return view('list_supply_category');
    }

    public function listPositionCleanline()
    {
        return view('list_position_cleanline');
    }
    public function newsTopicCategory()
    {
        return view('setting.news_topic_category');
    }
    public function configSecurity()
    {
        $locations = Location::all();
        return view('setting.security',compact('locations'));

    }
    public function listHoliday()
    {
        return view('list_holiday');
    }
    public function configBuilding()
    {
        return view('setting.building');
    }
    public function configHoliday()
    {
        return view('setting.holiday');
    }
    public function configWorktime()
    {
        $departments = Department::all();
        return view('setting.worktime',compact('departments'));
    }

    public function configItemOrganicsCoins()
    {
        return view('setting.itemOrganicsCoins');
    }

    //////////// Administrative Work Categories ////////////
    public function administCategories()
    {
        return view('setting.administrative_work_categories');
    }
    public function addAdministCategories()
    {
        return view('administrativeWork.add_administrative');
    }

    //////////// company ////////////
    public function companyCreate()
    {
        return view('companies.create');
    }
     //////////// categories holiday ////////////
     public function categoriesHolidayCreate()
     {
         return view('holiday.categories_holiday');
     }

    public function configMaintenance()
    {
        $locations = Location::all();
        return view('setting.maintenance',compact('locations'));
    }

    public function configCleanness()
    {
        return view('setting.cleanness');
    }
}
