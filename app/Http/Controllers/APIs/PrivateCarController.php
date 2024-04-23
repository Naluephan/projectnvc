<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\PrivateCarInterface;
use Illuminate\Support\Facades\DB;



class PrivateCarController extends Controller
{
    private $privateCarRepository;
    public function __construct(PrivateCarInterface $privateCarRepository)
    {
        $this->privateCarRepository = $privateCarRepository;
    }

    public function create(Request $request)
    {
        $data = $request->all();
        try {
            $search_criteria = [
                'emp_id' => $data['emp_id'],
            ];
            $existing_car = $this->privateCarRepository->findBy($search_criteria);

            if ($existing_car) {
                if ($request->file('car_image')) {
                    $data['car_image'] = save_image($request->file('car_image'), 500, '/images/content/privateCar/');
                }
                $this->privateCarRepository->update($existing_car->id, $data);
            } else {
                $save_data = [
                    'emp_id' => $data['emp_id'],
                    'company_id' => $data['company_id'],
                    'department_id' => $data['department_id'],
                    'car_category_id' => $data['car_category_id'],
                    'car_registration' => $data['car_registration'],
                    'car_brand' => $data['car_brand'],
                    'car_color' => $data['car_color'],
                    'record_status' => 2,
                    // 'car_image' => $data['car_image'],
                ];
                if ($request->file('car_image')) {
                    $save_data['car_image'] = save_image($request->file('car_image'), 500, '/images/content/privateCar/');
                }
                $this->privateCarRepository->create($save_data);
            }

            $result['status'] = ApiStatus::list_private_car_success_status;
            $result['statusCode'] = ApiStatus::list_private_car_success_statusCode;
            $result['listPrivateCar'] = 'Save Successfully.';
        } catch (\Exception $e) {
            $result['status'] = ApiStatus::list_private_car_error_statusCode;
            $result['errCode'] = ApiStatus::list_private_car_error_status;
            $result['errDesc'] = ApiStatus::list_private_car_errDesc;
            $result['message'] = $e->getMessage();
        }
        return $result;
    }

    public function update(Request $request)
    {
        $data = $request->all();
        try {

            if ($request->file('car_image')) {
                $data['car_image'] = save_image($request->file('car_image'), 500, '/images/content/privateCar/');
            }
            $this->privateCarRepository->update($data['id'], $data);

            $result['status'] = ApiStatus::list_private_car_success_status;
            $result['statusCode'] = ApiStatus::list_private_car_success_statusCode;
            $result['listPrivateCar'] = 'Update Successfully.';
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
        // $data = $request->all();
        $id = $request->id;
        // $id = $data['id'];
        try {
            // $save_data = [
            //     'record_status' => 0
            // ];
            // $this->privateCarRepository->update($id, $save_data);
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

    // public function approve(Request $request)
    // {
    //     $data = $request->all();
    //     $id = $data['id'];
    //     try {
    //         $this->privateCarRepository->update($id, $data);
    //         $result['status'] = ApiStatus::list_private_car_success_status;
    //         $result['statusCode'] = ApiStatus::list_private_car_success_statusCode;
    //         $result['message'] = 'Transaction approved successfully.';
    //     } catch (\Exception $e) {
    //         $result['status'] = ApiStatus::list_private_car_failed_status;
    //         $result['errCode'] = ApiStatus::list_private_car_failed_statusCode;
    //         $result['errDesc'] = ApiStatus::list_private_car_failed_Desc;
    //         $result['message'] = $e->getMessage();
    //     }
    //     return $result;
    // }
}
