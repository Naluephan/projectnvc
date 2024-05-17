<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\PickupToolsEmployeeInterface;
use App\Repositories\EmployeeInterface;
use App\Repositories\PickupToolsInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\PickupToolsDeviceTypeInterface;

class PickupToolsEmployeeController extends Controller
{
    private $pickupToolsEmployeeRepository, $employeeRepository, $pickupToolsRepository, $pickupToolsDeviceTypeRepository;
    public function __construct(PickupToolsEmployeeInterface $pickupToolsEmployeeRepository, EmployeeInterface $employeeRepository, PickupToolsInterface $pickupToolsRepository, PickupToolsDeviceTypeInterface $pickupToolsDeviceTypeRepository)
    {
        $this->pickupToolsEmployeeRepository = $pickupToolsEmployeeRepository;
        $this->employeeRepository = $employeeRepository;
        $this->pickupToolsRepository = $pickupToolsRepository;
        $this->pickupToolsDeviceTypeRepository = $pickupToolsDeviceTypeRepository;
    }

    public function option(Request $request)
    {
        $data = $request->all();
        return $this->pickupToolsEmployeeRepository->option($data);
    }

    public function pickupToolsListEmployee(Request $request)
    {
        try {

            $querys = $this->pickupToolsEmployeeRepository->pickupToolsList($request);
            foreach ($querys as $query) {
                $query->image = "https://newhr.organicscosme.com/uploads/images/setting/pickuptools/" . $query->image;
            }

            if (count($querys) > 0) {
                $result['status'] = ApiStatus::list_pickup_tools_success_status;
                $result['statusCode'] = ApiStatus::list_pickup_tools_success_statusCode;
                $result['data'] = $querys;
            } else {
                $result['status'] = ApiStatus::list_pickup_tools_failed_status;
                $result['errCode'] = ApiStatus::list_pickup_tools_failed_statusCode;
                $result['errDesc'] = ApiStatus::list_pickup_tools_failed_Desc;
                $result['message'] = $querys;
                DB::rollBack();
            }
        } catch (\Exception $ex) {
            $result['status'] = ApiStatus::list_pickup_tools_error_statusCode;
            $result['errCode'] = ApiStatus::list_pickup_tools_error_status;
            $result['errDesc'] = ApiStatus::list_pickup_tools_errDesc;
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return $result;
    }

    public function myPickupToolsList(Request $request)
    {
        try {

            $querys = $this->pickupToolsEmployeeRepository->myPickupToolsList($request);
            foreach ($querys as $query) {
                $query->image = "https://newhr.organicscosme.com/uploads/images/setting/pickuptools/" . $query->image;
            }

            if (count($querys) > 0) {
                $result['status'] = ApiStatus::list_pickup_tools_success_status;
                $result['statusCode'] = ApiStatus::list_pickup_tools_success_statusCode;
                $result['data'] = $querys;
            } else {
                $result['status'] = ApiStatus::list_pickup_tools_failed_status;
                $result['errCode'] = ApiStatus::list_pickup_tools_failed_statusCode;
                $result['errDesc'] = ApiStatus::list_pickup_tools_failed_Desc;
                $result['message'] = $querys;
                DB::rollBack();
            }
        } catch (\Exception $ex) {
            $result['status'] = ApiStatus::list_pickup_tools_error_statusCode;
            $result['errCode'] = ApiStatus::list_pickup_tools_error_status;
            $result['errDesc'] = ApiStatus::list_pickup_tools_errDesc;
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return $result;
    }

    public function historyPickupToolsList(Request $request)
    {
        try {
            $querys = $this->pickupToolsEmployeeRepository->allMyPickupToolsList($request);
            foreach ($querys as $query) {
                $query->image = "https://newhr.organicscosme.com/uploads/images/setting/pickuptools/" . $query->image;
            }
            if (count($querys) > 0) {
                $result['status'] = ApiStatus::list_pickup_tools_success_status;
                $result['statusCode'] = ApiStatus::list_pickup_tools_success_statusCode;
                $result['data'] = $querys;
            } else {
                $result['status'] = ApiStatus::list_pickup_tools_failed_status;
                $result['errCode'] = ApiStatus::list_pickup_tools_failed_statusCode;
                $result['errDesc'] = ApiStatus::list_pickup_tools_failed_Desc;
                $result['message'] = $querys;
            }
        } catch (\Exception $ex) {
            $result['status'] = ApiStatus::list_pickup_tools_error_statusCode;
            $result['errCode'] = ApiStatus::list_pickup_tools_error_status;
            $result['errDesc'] = ApiStatus::list_pickup_tools_errDesc;
            $result['message'] = $ex->getMessage();
        }
        return $result;
    }

    public function create(Request $request)
    {
        $data = $request->all();
        try {
            $employeeData = $this->employeeRepository->find($data['emp_id']);

            $deviceTypes = $this->pickupToolsDeviceTypeRepository->find($data['pickup_tools_id']);

            $pickup_tools = $this->pickupToolsRepository->find($data['pickup_tools_id']);

            if ($data['number_requested'] <= $pickup_tools->number_requested) {
                $save_data = [
                    'emp_id' => $data['emp_id'],
                    'company_id' => $employeeData->company_id,
                    'department_id' => $employeeData->department_id,
                    'pickup_tools_id' => $data['pickup_tools_id'],
                    'number_requested' => $data['number_requested'],
                    'type_device' => $deviceTypes->type_device,
                    'status_approved' => 0,
                    'request_details' => $data['request_details'],
                ];

                if ($deviceTypes->type_device == 2 || $deviceTypes->type_device == 3) {
                    $save_data['status_repair'] = 2;
                }

                $create = $this->pickupToolsEmployeeRepository->create($save_data);

                return [
                    'status' => ApiStatus::list_pickup_tools_success_status,
                    'statusCode' => ApiStatus::list_pickup_tools_success_statusCode,
                ];
            } else {
                return [
                    'status' => ApiStatus::list_pickup_tools_failed_status,
                    'errCode' => ApiStatus::list_pickup_tools_failed_statusCode,
                    'message' => 'Save failed due to invalid pickup tools or request details.',
                ];
            }
        } catch (\Exception $e) {
            return [
                'status' => ApiStatus::list_pickup_tools_error_statusCode,
                'errCode' => ApiStatus::list_pickup_tools_error_status,
                'errDesc' => ApiStatus::list_pickup_tools_errDesc,
                'message' => $e->getMessage(),
            ];
        }
    }





    public function approve(Request $request)
    {
        try {
            $data = $request->all();
            $id = $request->id;

            $data_save = [
                'status_approved' => $data['status_approved']
            ];
            $this->pickupToolsEmployeeRepository->update($id, $data_save);

            if ($data_save['status_approved'] == 2) {
                $pickup_tools_employees = $this->pickupToolsEmployeeRepository->find($id);
                $pickup_tools = $this->pickupToolsRepository->find($pickup_tools_employees->pickup_tools_id);
                $pickup_tools->decrement('number_requested', $pickup_tools_employees->number_requested);

                $result = [
                    'status' => ApiStatus::list_pickup_tools_success_status,
                    'statusCode' => ApiStatus::list_pickup_tools_success_statusCode,
                    'message' => 'Transaction approved successfully.'
                ];
            }
            if ($data_save['status_approved'] == 4) {
                $pickup_tools_employees = $this->pickupToolsEmployeeRepository->find($id);
                $pickup_tools = $this->pickupToolsRepository->find($pickup_tools_employees->pickup_tools_id);
                $pickup_tools->increment('number_requested', $pickup_tools_employees->number_requested);

                $result = [
                    'status' => ApiStatus::list_pickup_tools_success_status,
                    'statusCode' => ApiStatus::list_pickup_tools_success_statusCode,
                    'message' => 'Transaction return successfully.'
                ];
            }
        } catch (\Exception $e) {
            $result['status'] = ApiStatus::list_pickup_tools_failed_status;
            $result['errCode'] = ApiStatus::list_pickup_tools_failed_statusCode;
            $result['errDesc'] = ApiStatus::list_pickup_tools_failed_Desc;
            $result['message'] = $e->getMessage();
        }
        return $result;
    }


    public function pickupToolsType(Request $request)
    {
        try {
            $querys = $this->pickupToolsDeviceTypeRepository->all($request);
            foreach ($querys as $query) {
                $query->image = "https://newhr.organicscosme.com/uploads/images/setting/pickuptools/" . $query->image;
            }
            if (count($querys) > 0) {
                $result['status'] = ApiStatus::list_pickup_tools_success_status;
                $result['statusCode'] = ApiStatus::list_pickup_tools_success_statusCode;
                $result['data'] = $querys;
            } else {
                $result['status'] = ApiStatus::list_pickup_tools_failed_status;
                $result['errCode'] = ApiStatus::list_pickup_tools_failed_statusCode;
                $result['errDesc'] = ApiStatus::list_pickup_tools_failed_Desc;
                $result['message'] = $querys;
            }
        } catch (\Exception $ex) {
            $result['status'] = ApiStatus::list_pickup_tools_error_statusCode;
            $result['errCode'] = ApiStatus::list_pickup_tools_error_status;
            $result['errDesc'] = ApiStatus::list_pickup_tools_errDesc;
            $result['message'] = $ex->getMessage();
        }
        return $result;
    }
}
