<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\OrganicsHeroMissionEmployeeInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrganicsHeroMissionEmployeeController extends Controller
{

    private $organicsHeroMissionEmployeeRepository;
    public function __construct(OrganicsHeroMissionEmployeeInterface $organicsHeroMissionEmployeeRepository)
    {
        $this->organicsHeroMissionEmployeeRepository = $organicsHeroMissionEmployeeRepository;
    }

    public function getListMissionEmployee(Request $request)
    {
        try {
            $data = $request->all();
            $getListMission = $this->organicsHeroMissionEmployeeRepository->getListMission($data);

            if (count($getListMission) > 0) {
                $result['status'] = ApiStatus::list_organics_hero_mission_success_status;
                $result['statusCode'] = ApiStatus::list_organics_hero_mission_success_statusCode;
                $result['getListMission'] = $getListMission;
            } else {
                $result['status'] = ApiStatus::list_organics_hero_mission_failed_status;
                $result['errCode'] = ApiStatus::list_organics_hero_mission_failed_statusCode;
                $result['errDesc'] = ApiStatus::list_organics_hero_mission_failed_Desc;
                $result['message'] = $getListMission;
                DB::rollBack();
            }
        } catch (\Exception $ex) {
            $result['status'] = ApiStatus::list_organics_hero_mission_error_statusCode;
            $result['errCode'] = ApiStatus::list_organics_hero_mission_error_status;
            $result['errDesc'] = ApiStatus::list_organics_hero_mission_errDesc;
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return $result;
    }
}
