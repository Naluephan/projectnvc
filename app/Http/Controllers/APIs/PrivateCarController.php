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

    public function getPrivatecar(Request $request)
    {
        $data = $request->all();
        $getPrivatecar = $this->privateCarRepository->getPrivatecar($data);
        return $getPrivatecar;
    }

    public function create(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $result = [];
        try {
            $search_criteria = [
                'emp_id' => $data['emp_id'],
                // 'car_category_id' => $data['car_category_id'],
            ];
            $existing_car = $this->privateCarRepository->findBy($search_criteria);

            if ($existing_car) {
                $update_data = [
                    'car_registration' => $data['car_registration'],
                    'car_brand' => $data['car_brand'],
                    'car_color' => $data['car_color'],
                    'record_status' => 2,
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
}
