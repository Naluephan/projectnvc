<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\PrivateCarInterface;
use App\Repositories\EmployeeInterface;
use Illuminate\Support\Facades\DB;

class PrivateCarController extends Controller
{
    private $privateCarRepository, $employeeRepository;
    public function __construct(PrivateCarInterface $privateCarRepository, EmployeeInterface $employeeRepository)
    {
        $this->privateCarRepository = $privateCarRepository;
        $this->employeeRepository = $employeeRepository;
    }

    public function createAndUpdate(Request $request)
    {
        $data = $request->all();
        try {
            $search_criteria = [
                'emp_id' => $data['emp_id'],
            ];
            $existing_car = $this->privateCarRepository->findBy($search_criteria);
            $employeeData = $this->employeeRepository->findById($data);

            if ($existing_car) {
                if ($request->file('car_image')) {
                    $data['car_image'] = 'https://newhr.organicscosme.com/uploads/images/content/privateCar/' . basename(save_image($request->file('car_image'), 500, '/images/content/privateCar/'));
                    $data['status_approved'] = 0;
                }

                $this->privateCarRepository->update($existing_car->id, $data);
            } else {
                $save_data = [
                    'emp_id' => $data['emp_id'],
                    'company_id' => $employeeData['company_id'],
                    'department_id' => $employeeData['department_id'],
                    'car_category_id' => $data['car_category_id'],
                    'car_registration' => $data['car_registration'],
                    'car_brand' => $data['car_brand'],
                    'car_color' => $data['car_color'],
                    'status_approved' => 0,
                ];
                if ($request->file('car_image')) {
                    $save_data['car_image'] = 'https://newhr.organicscosme.com/uploads/images/content/privateCar/' . basename(save_image($request->file('car_image'), 500, '/images/content/privateCar/'));
                }
                $this->privateCarRepository->create($save_data);
            }

            $result['status'] = ApiStatus::list_private_car_success_status;
            $result['statusCode'] = ApiStatus::list_private_car_success_statusCode;
        } catch (\Exception $e) {
            $result['status'] = ApiStatus::list_private_car_error_statusCode;
            $result['errCode'] = ApiStatus::list_private_car_error_status;
            $result['errDesc'] = ApiStatus::list_private_car_errDesc;
            $result['message'] = $e->getMessage();
        }
        return $result;
    }

    public function deleteUpdate(Request $request)
    {
        $id = $request->id;
        try {
            $this->privateCarRepository->delete($id);

            $result['status'] = ApiStatus::list_private_car_success_status;
            $result['statusCode'] = ApiStatus::list_private_car_success_statusCode;
            $result['listPrivateCar'] = 'Delete Successfully.';
        } catch (\Exception $ex) {
            $result['status'] = ApiStatus::list_private_car_error_statusCode;
            $result['errCode'] = ApiStatus::list_private_car_error_status;
            $result['errDesc'] = ApiStatus::list_private_car_errDesc;
            $result['message'] = $ex->getMessage();
        }
        return $result;
    }

    public function getPrivatecarEmployee(Request $request)
    {
        try {
            $data = $request->all();
            $getPrivatecar = $this->privateCarRepository->getPrivatecar($data);

            if (count($getPrivatecar) > 0) {
                $result['status'] = ApiStatus::list_private_car_success_status;
                $result['statusCode'] = ApiStatus::list_private_car_success_statusCode;
                $result['listPrivateCar'] = $getPrivatecar;
            } else {
                $result['status'] = ApiStatus::list_private_car_failed_status;
                $result['errCode'] = ApiStatus::list_private_car_failed_statusCode;
                $result['errDesc'] = ApiStatus::list_private_car_failed_Desc;
                $result['message'] = $getPrivatecar;
                DB::rollBack();
            }
        } catch (\Exception $ex) {
            $result['status'] = ApiStatus::list_private_car_error_statusCode;
            $result['errCode'] = ApiStatus::list_private_car_error_status;
            $result['errDesc'] = ApiStatus::list_private_car_errDesc;
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return $result;
    }

    public function approve(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        try {
            $data = [
                'status_approved' => $data['status_approved']
            ];
            $this->privateCarRepository->update($id, $data);
            $result['status'] = ApiStatus::list_private_car_success_status;
            $result['statusCode'] = ApiStatus::list_private_car_success_statusCode;
            $result['message'] = 'Transaction approved successfully.';
        } catch (\Exception $e) {
            $result['status'] = ApiStatus::list_private_car_failed_status;
            $result['errCode'] = ApiStatus::list_private_car_failed_statusCode;
            $result['errDesc'] = ApiStatus::list_private_car_failed_Desc;
            $result['message'] = $e->getMessage();
        }
        return $result;
    }
}
