<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\PickupToolsEmployeeInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
}
