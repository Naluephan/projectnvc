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

    public function create(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $result = [];
        try {
            $search_criteria = [
                'emp_id' => $data['emp_id'],
            ];
            $existing_car = $this->privateCarRepository->findBy($search_criteria);

            if ($existing_car) {
                $update_data = [
                    'car_category_id' => $data['car_category_id'],
                    'car_registration' => $data['car_registration'],
                    'car_brand' => $data['car_brand'],
                    'car_color' => $data['car_color'],
                ];
                if ($request->file('car_image')) {
                    $update_data['car_image'] = save_image($request->file('car_image'), 500, '/images/content/privateCar/');
                }
                $this->privateCarRepository->update($existing_car->id, $update_data);
            } else {
                $save_data = [
                    'emp_id' => $data['emp_id'],
                    'car_category_id' => $data['car_category_id'],
                    'car_registration' => $data['car_registration'],
                    'car_brand' => $data['car_brand'],
                    'car_color' => $data['car_color'],
                ];
                if ($request->file('car_image')) {
                    $save_data['car_image'] = save_image($request->file('car_image'), 500, '/images/content/privateCar/');
                }
                $this->privateCarRepository->create($save_data);
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

    public function deleteUpdate(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $id = $data['id'];
        $result['status'] = "Success";
        try {
            $this->privateCarRepository->update($id, $data);
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return json_encode($result);
    }
}
