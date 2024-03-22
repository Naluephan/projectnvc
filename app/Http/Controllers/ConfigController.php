<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Repositories\CompanyInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ConfigController extends Controller
{

    private $companyRepository;
  
    public function __construct(
        CompanyInterface $companyRepository
    )
    {
        $this->companyRepository = $companyRepository;
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
        return view('setting.pickuptools');
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
        return view('setting.security');

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
    public function configMaintenance()
    {
        return view('setting.maintenance');
    }

    public function configCleanness()
    {
        return view('setting.cleanness');
    }
}
