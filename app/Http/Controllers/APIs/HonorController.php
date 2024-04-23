<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\HonorInterface;
use Illuminate\Support\Facades\DB;



class HonorController extends Controller
{
    private $honorRepository;
    public function __construct(HonorInterface $honorRepository)
    {
        $this->honorRepository = $honorRepository;
    }

    public function getHonor(Request $request)
    {
        try {
        $data = $request->all();
        $getHonor = $this->honorRepository->getHonor($data);
        if (count($getHonor) > 0) {
            $result['status'] = ApiStatus::honor_success_status;
            $result['statusCode'] = ApiStatus::honor_success_statusCode;
            $result['data'] = $getHonor;
        } else {
            $result['status'] = ApiStatus::honor_failed_status;
            $result['statusCode'] = ApiStatus::honor_failed_statusCode;
            $result['errDesc'] = ApiStatus::honor_failed_Desc;
        }
    } catch (\Exception $e) {
        $result['status'] = ApiStatus::honor_error_statusCode;
        $result['errCode'] = ApiStatus::honor_error_status;
        $result['errDesc'] = ApiStatus::honor_errDesc;
        $result['message'] = $e->getMessage();
    }
    return $result;
    }

    public function create(Request $request)
    {
        $result = [];
        $data = $request->all();
        try {
            // $search_criteria = [
            //     'emp_id' => $data['emp_id'],
            // ];
            // $this->honorRepository->findBy($search_criteria);
            if ($request->file('honor_img')) {
                $data['honor_img'] = save_image($request->file('honor_img'), 500, '/images/content/honor/');
            }
                $save_data = [
                    'emp_id' => $data['emp_id'],
                    'honor_category_id' => $data['honor_category_id'],
                    'honor_category_type_id' => $data['honor_category_type_id'],
                    'honor_detail' => $data['honor_detail'],
                ];
              
                $this->honorRepository->create($data,$save_data);
                $result['status'] = ApiStatus::honor_success_status;
                $result['statusCode'] = ApiStatus::honor_success_statusCode;
            } catch (\Exception $e) {
                $result['status'] = ApiStatus::honor_error_statusCode;
                $result['errCode'] = ApiStatus::honor_error_status;
                $result['errDesc'] = ApiStatus::honor_errDesc;
                $result['message'] = $e->getMessage();
            }
            return $result;
        }
            
    public function update(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $id = $data['id'];
        try {
            $this->honorRepository->update($id, $data);
            $result['status'] = ApiStatus::honor_success_status;
            $result['statusCode'] = ApiStatus::honor_success_statusCode;
        } catch (\Exception $e) {
            $result['status'] = ApiStatus::honor_error_statusCode;
            $result['errCode'] = ApiStatus::honor_error_status;
            $result['errDesc'] = ApiStatus::honor_errDesc;
            $result['message'] = $e->getMessage();
        }
        return $result;
    }
    public function getById(Request $request)
    {
        $id = $request->emp_id;
        return $this->honorRepository->getHonorById($id);
    
    }
    public function delete(Request $request)
    {
        $id = $request->id;
       
        try {
            $this->honorRepository->delete($id);
            $result['status'] = ApiStatus::group_insurance_success_status;
            $result['statusCode'] = ApiStatus::group_insurance_success_statusCode;
        } catch (\Exception $e) {
            $result['status'] = ApiStatus::group_insurance_error_statusCode;
            $result['errCode'] = ApiStatus::group_insurance_error_status;
            $result['errDesc'] = ApiStatus::group_insurance_errDesc;
            $result['message'] = $e->getMessage();
        }
        return $result;
    }
}
