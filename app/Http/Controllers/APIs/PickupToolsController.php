<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\PickupToolsInterface;
use App\Repositories\PickupToolsDeviceTypeInterface;
use App\Repositories\DepartmentInterface;
use Illuminate\Support\Facades\DB;
use App\Models\PickupTools;
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


    public function getAll(Request $request)
    {
        $data = $request->all();
        $showDetail = $this->pickupToolsRepository->allList($data);

        return $showDetail;
    }

    public function create(Request $request)
    {
        DB::beginTransaction();
        $result = [];
        try {
            $data = $request->all();
            foreach ($data['pickuptool'] as $pickuptools_data) {
                $pickuptools_data['department_id'] = $data['department_id'];
                $pickuptools_data['device_types_id'] = $pickuptools_data['device_types_id'];
                $pickuptools_data['number_requested'] =  $pickuptools_data['number_requested'];
                $this->pickupToolsRepository->createCondition($pickuptools_data);
            }
            $result['status'] = "success";

            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return $result;
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        $result = [];
        $data = $request->all();
        try {

            // $pickupTool = $this->pickupToolsRepository->update($data['id'], $data);

            $devicetypes_ids = array_column(array_filter($data['pickuptool'], function ($pickup_tools) {
                return !empty($pickup_tools['pickupTools_id']);
            }), 'pickupTools_id');

            $this->pickupToolsRepository->deleteNotIn($devicetypes_ids, $data['department_id']);

            foreach ($data['pickuptool'] as $pickuptools_data) {
                if ($pickuptools_data['pickupTools_id'] == null) {
                    $pickuptools_data['department_id'] = $data['department_id'];
                    $pickuptools_data['device_types_id'] = $pickuptools_data['device_types_id'];
                    $pickuptools_data['number_requested'] =  $pickuptools_data['number_requested'];
                    $this->pickupToolsRepository->createCondition($pickuptools_data);
                } else {
                    $this->pickupToolsRepository->update($pickuptools_data['pickupTools_id'], $pickuptools_data);
                }
            }

            $result['status'] = "success";
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return $result;
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
}
