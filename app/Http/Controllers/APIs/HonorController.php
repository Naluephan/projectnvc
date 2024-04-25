<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Models\Employee;
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
        $data = $request->all();
        try {
            $emp = Employee::find($data['emp_id']);
    
            $save_data = [
                'emp_id' => $data['emp_id'],
                'honor_category_id' => $data['honor_category_id'],
                'position_id' => $emp->position_id,
                'company_id' => $emp->company_id,
                'department_id' => $emp->department_id,
                'honor_detail' => $data['honor_detail'],
            ];
            if ($request->file('honor_img')) {
                $save_data['honor_img'] = 'https://newhr.organicscosme.com/uploads/images/content/honor/' . basename(save_image($request->file('honor_img'), 500, '/images/content/honor/'));

            }
            // เพิ่มเงื่อนไขเพื่อตั้งค่า honor_detail_type_id เป็น NULL หาก honor_category_id เท่ากับ 2
            // if ($data['honor_category_id'] == 2) {
            //     $save_data['honor_detail_type_id'] = null;
            // }
    
            $this->honorRepository->create($save_data);
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

    public function approve(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        try {
            $data = [
                'approve_status' => $data['approve_status']
            ];
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
}
