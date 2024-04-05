<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\PickupToolsEmployeeInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PickupTools;


class PickupToolsEmployeeController extends Controller
{
    private $pickupToolsEmployeeRepository;
    public function __construct(PickupToolsEmployeeInterface $pickupToolsEmployeeRepository)
    {
        $this->pickupToolsEmployeeRepository = $pickupToolsEmployeeRepository;
    }

    public function pickupToolsListEmployee(Request $request)
    {
        try {
            $data = $request->all();
            $pickupToolsList = $this->pickupToolsEmployeeRepository->pickupToolsList($data);

            if (count($pickupToolsList) > 0) {
                $result['status'] = ApiStatus::list_pickup_tools_success_status;
                $result['statusCode'] = ApiStatus::list_pickup_tools_success_statusCode;
                $result['pickupToolsList'] = $pickupToolsList;
            } else {
                $result['status'] = ApiStatus::list_pickup_tools_failed_status;
                $result['errCode'] = ApiStatus::list_pickup_tools_failed_statusCode;
                $result['errDesc'] = ApiStatus::list_pickup_tools_failed_Desc;
                $result['message'] = $pickupToolsList;
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

    public function create(Request $request)
    {
        $data = $request->all();
        try {
            $search_criteria = [
                'emp_id' => $data['emp_id'],
                'department_id' => $data['department_id'],
            ];
            $this->pickupToolsEmployeeRepository->findBy($search_criteria);

            // foreach ($data['pickup_tools_employees'] as $pickuptools_data) {
            //     $pickuptools_data['emp_id'] = $data['emp_id'];
            //     $pickuptools_data['pickup_tools_id'] = $pickuptools_data['pickup_tools_id'];
            //     $pickuptools_data['number_requested'] =  $pickuptools_data['number_requested'];
            //     $pickuptools_data['status_repair'] =  $pickuptools_data['status_repair'];
            //     $pickuptools_data['status_requested'] =  $pickuptools_data['status_requested'];
            //     $pickuptools_data['request_details'] =  $pickuptools_data['request_details'];
            //     $pickuptools_data['approve_at'] =  $pickuptools_data['approve_at'];
            //     $pickuptools_data['not_approved_at'] =  $pickuptools_data['not_approved_at'];
            //     $pickuptools_data['cancel_at'] =  $pickuptools_data['cancel_at'];

            //     $this->pickupToolsEmployeeRepository->createCondition($pickuptools_data);
            // }
            $departmentId = $data['department_id'];
            $pickupTools = PickupTools::where('department_id', $departmentId)->exists();

            if ($pickupTools) {
                $save_data = [
                    'emp_id' => $data['emp_id'],
                    'department_id' => $data['department_id'],
                    'pickup_tools_id' => $data['pickup_tools_id'],
                    'number_requested' => $data['number_requested'],
                    'status_repair' => $data['status_repair'],
                    'status_requested' => $data['status_requested'],
                    'request_details' => $data['request_details'],
                    'approve_at' => $data['approve_at'],
                    'not_approved_at' => $data['not_approved_at'],
                    'cancel_at' => $data['cancel_at'],
                ];
                $this->pickupToolsEmployeeRepository->createCondition($save_data);

                $result['status'] = ApiStatus::list_pickup_tools_success_status;
                $result['statusCode'] = ApiStatus::list_pickup_tools_success_statusCode;
                $result['listPrivateCar'] = 'Save Successfully.';
            } else {
                $result['status'] = ApiStatus::list_pickup_tools_failed_status;
                $result['errCode'] = ApiStatus::list_pickup_tools_failed_statusCode;
                $result['errDesc'] = ApiStatus::list_pickup_tools_failed_Desc;
                $result['message'] = 'Save failed!!';
            }
        } catch (\Exception $e) {
            $result['status'] = ApiStatus::list_pickup_tools_error_statusCode;
            $result['errCode'] = ApiStatus::list_pickup_tools_error_status;
            $result['errDesc'] = ApiStatus::list_pickup_tools_errDesc;
            $result['message'] = $e->getMessage();
        }
        return $result;
    }
}
