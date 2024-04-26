<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\PickupToolsEmployeeInterface;
use App\Repositories\EmployeeInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PickupTools;
use App\Models\Employee;

class PickupToolsEmployeeController extends Controller
{
    private $pickupToolsEmployeeRepository, $employeeRepository;
    public function __construct(PickupToolsEmployeeInterface $pickupToolsEmployeeRepository, EmployeeInterface $employeeRepository)
    {
        $this->pickupToolsEmployeeRepository = $pickupToolsEmployeeRepository;
        $this->employeeRepository = $employeeRepository;
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
                $query->image = "https://newhr.organicscosme.com/uploads/images/pickuptools/" . $query->image;
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
                $query->image = "https://newhr.organicscosme.com/uploads/images/pickuptools/" . $query->image;
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
                $query->image = "https://newhr.organicscosme.com/uploads/images/pickuptools/" . $query->image;
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
            $employeeData = $this->employeeRepository->findById($data);

            $pickupTools = PickupTools::where('department_id', $employeeData->department_id)->exists();

            $pickupTool = PickupTools::where('number_requested', '>=', $data['number_requested'])
                ->first();

            if ($pickupTools && $pickupTool) {
                $save_data = [
                    'emp_id' => $data['emp_id'],
                    'company_id' => $employeeData['company_id'],
                    'department_id' => $employeeData['department_id'],
                    'pickup_tools_id' => $data['pickup_tools_id'],
                    'number_requested' => $data['number_requested'],
                    'status_repair' => 2,
                    'status_approved' => 0,
                    'request_details' => $data['request_details'],
                ];
                $this->pickupToolsEmployeeRepository->create($save_data);

                $result['status'] = ApiStatus::list_pickup_tools_success_status;
                $result['statusCode'] = ApiStatus::list_pickup_tools_success_statusCode;
            } else {
                $result['status'] = ApiStatus::list_pickup_tools_failed_status;
                $result['errCode'] = ApiStatus::list_pickup_tools_failed_statusCode;
                $result['message'] = 'The maximum number of requests cannot be exceeded.';
            }
        } catch (\Exception $e) {
            $result['status'] = ApiStatus::list_pickup_tools_error_statusCode;
            $result['errCode'] = ApiStatus::list_pickup_tools_error_status;
            $result['errDesc'] = ApiStatus::list_pickup_tools_errDesc;
            $result['message'] = $e->getMessage();
        }
        return $result;
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

            $result['status'] = ApiStatus::list_pickup_tools_success_status;
            $result['statusCode'] = ApiStatus::list_pickup_tools_success_statusCode;
            $result['message'] = 'Transaction approved successfully.';
        } catch (\Exception $e) {
            $result['status'] = ApiStatus::list_pickup_tools_failed_status;
            $result['errCode'] = ApiStatus::list_pickup_tools_failed_statusCode;
            $result['errDesc'] = ApiStatus::list_pickup_tools_failed_Desc;
            $result['message'] = $e->getMessage();
        }
        return $result;
    }
}
