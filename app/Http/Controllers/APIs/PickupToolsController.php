<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\PickupToolsInterface;
use App\Repositories\PickupToolsDeviceTypeInterface;
use App\Repositories\DepartmentInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PickupToolsController extends Controller
{
    private $pickupToolsRepository, $pickupToolsDeviceTypeRepository, $departmentRepository;
    public function __construct(PickupToolsInterface $pickupToolsRepository, PickupToolsDeviceTypeInterface $pickupToolsDeviceTypeRepository, DepartmentInterface $departmentRepository)
    {
        $this->pickupToolsRepository = $pickupToolsRepository;
        $this->pickupToolsDeviceTypeRepository = $pickupToolsDeviceTypeRepository;
        $this->departmentRepository = $departmentRepository;
    }

    public function showDetailBydepartmentById(Request $request)
    {
        $data = $request->all();
        $showDetail = $this->pickupToolsRepository->showDetailBydepartment($data);

        return $showDetail;
    }

    public function allList(Request $request)
    {
        $data = $request->all();
        $showDetail = $this->pickupToolsRepository->allList($data);

        return $showDetail;
    }

    public function createCondition(Request $request)
    {
        $data = $request->all();
        $result = [];

        try {
            foreach ($data['arr_order'] as $row) {
                $params = [
                    'department_id' => $data['department_id'],
                    'device_types_id' => $row['device_types_id'],
                    'number_requested' => $row['number_requested'],
                ];
                $this->pickupToolsRepository->createCondition($params); // เรียกใช้ฟังก์ชั่น createCondition() ที่ถูกสร้างขึ้นก่อนหน้านี้
            }
            $result['status'] = "success";
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return $result;
    }

    public function deviceTypesList(Request $request)
    {
        $data = $request->all();
        $deviceTypesList = $this->pickupToolsDeviceTypeRepository->getAll($data);
        return $deviceTypesList;
    }

    public function departmentList(Request $request)
    {
        $data = $request->all();
        $departmentList = $this->departmentRepository->all($data);
        return $departmentList;
    }

    public function delete(Request $request)
    {
        try {
            $data = $request->all();
            $deleteCondition = $this->pickupToolsRepository->deleteCondition($data);

            if ($deleteCondition) {
                return response()->json(['message' => 'Delete Successfully'], 200);
            } else {
                return response()->json(['message' => 'Delete Failed'], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function detailDepartmentById(Request $request)
    {
        try {
            $data = $request->all();
            $deviceTypesList = $this->pickupToolsRepository->detailDepartmentById($data);
            return $deviceTypesList;
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $department_id = $data['department_id'];
        $result['status'] = "Success";
        try {
            $this->pickupToolsRepository->update($department_id,$data);
            DB::commit();
        } catch (\Exception $ex){
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return json_encode($result);
    }
}
