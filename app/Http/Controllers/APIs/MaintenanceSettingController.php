<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\MaintenanceSettingInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaintenanceSettingController extends Controller
{
    private $maintenanceSettingRepository;

    public function __construct(
        MaintenanceSettingInterface $maintenanceSettingRepository

    ) {
        $this->maintenanceSettingRepository = $maintenanceSettingRepository;
    }

    public function maintenanceList(Request $request)
    {
        $postData = $request->all();
        $result = [];

        try {
            $param = [];


            $maintenanceList = $this->maintenanceSettingRepository->getAll($param);


            $result['status'] = "success";
            $result['data'] = $maintenanceList;
        } catch (\Exception $ex) {
            $result['status'] = "failed";
            $result['message'] = $ex->getMessage();
        }

        return $result;
    }

    public function create(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $result = [];
        try {
            $save_data = [
                'name' => $data['name'],
                'locations_id' => $data['locations_id'],
                'maintenance_patrol' => $data['maintenance_patrol'],
                'maintenance_time' => $data['maintenance_time'],
                'qr_code' => $data['qr_code'],
                'user_id' => $data['user_id'],
            ];
            if ($request->file('maintenance_img')) {
                $save_data['maintenance_img'] = save_image($request->file('maintenance_img'), 500, '/images/setting/maintenance/');
            }
            $this->maintenanceSettingRepository->create($save_data);

            $result['status'] = "success";
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return $result;
    }

    public function getmaintenanceById(Request $request)
    {
        $postData = $request->all();
        $result = [];

        try {
            $maintenanceList = $this->maintenanceSettingRepository->find($postData['id']);
            $result['status'] = "success";
            $result['data'] = $maintenanceList;
        } catch (\Exception $ex) {
            $result['status'] = "failed";
            $result['message'] = $ex->getMessage();
        }

        return $result;
    }

    public function maintenanceUpdate(Request $request)
    {
        DB::beginTransaction();
        $result = [];
        $data = $request->all();
        try {
            if ($request->file('maintenance_img')) {
                $data['maintenance_img'] = save_image($request->file('maintenance_img'), 500, '/images/setting/maintenance/');
            }
            $update = $this->maintenanceSettingRepository->update($data['id'], $data);
            $result['status'] = "success";
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "failed";
            $result['message'] = $ex;
            DB::rollBack();
        }
        return $result;
    }
}
