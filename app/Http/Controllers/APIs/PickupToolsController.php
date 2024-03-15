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
        $deviceTypesList = $this->pickupToolsRepository->createCondition($data);
        return $deviceTypesList;
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
        DB::beginTransaction();
        $id = $request->id;
        $result['status'] = "Success";
        try {
            $this->pickupToolsRepository->delete($id);
            DB::commit();
        } catch (\Exception $ex){
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return json_encode($result);
    }
}
