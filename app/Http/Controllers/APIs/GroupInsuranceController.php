<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Repositories\GroupInsuranceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Ignition\Solutions\OpenAi\OpenAiPromptViewModel;

class GroupInsuranceController extends Controller
{
    private $groupinsuranceRepository;
    public function __construct(GroupInsuranceInterface $groupinsuranceRepository)
    {
        $this->groupinsuranceRepository = $groupinsuranceRepository;
    }

    public function getGroupInsurance(Request $request)
    {
        try{
        $data = $request->all();
        $getgroup_insurance = $this->groupinsuranceRepository->getGroupInsurance($data);
        if (count($getgroup_insurance) > 0) {
            $result['status'] = ApiStatus::group_insurance_success_status;
            $result['statusCode'] = ApiStatus::group_insurance_success_statusCode;
            $result['data'] = $getgroup_insurance;
        } else {
            $result['status'] = ApiStatus::group_insurance_failed_status;
            $result['statusCode'] = ApiStatus::group_insurance_failed_statusCode;
            $result['errDesc'] = ApiStatus::group_insurance_failed_Desc;
        }
    } catch (\Exception $e) {
        $result['status'] = ApiStatus::group_insurance_error_statusCode;
        $result['errCode'] = ApiStatus::group_insurance_error_status;
        $result['errDesc'] = ApiStatus::group_insurance_errDesc;
        $result['message'] = $e->getMessage();
    }
    return $result;
    }
    public function create(Request $request)
    {
        $data = $request->all();
        try {
            $search_criteria = [
                'emp_id' => $data['emp_id'],
            ];
            $this->groupinsuranceRepository->findBy($search_criteria);
            $emp = Employee::find($data['emp_id']);
                $save_data = [
                    'emp_id' => $data['emp_id'],
                    'position_id' => $emp->position_id,
                    'company_id' => $emp->company_id,
                    'department_id' => $emp->department_id,
                ];
                if ($request->file('group_insurance_img')) {
                    $save_data['group_insurance_img'] = save_image($request->file('group_insurance_img'), 500, '/images/content/insurance/');
                }
                $this->groupinsuranceRepository->create($save_data);

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

    public function update(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        try {
            if ($request->file('group_insurance_img')) {
                $save_data['group_insurance_img'] = save_image($request->file('group_insurance_img'), 500, '/images/content/insurance/');
            }
            $this->groupinsuranceRepository->update($id, $data);
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
    public function delete(Request $request)
    {
        $id = $request->id;

        try {
            $this->groupinsuranceRepository->delete($id);
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
    public function getById(Request $request)
    {
        $id = $request->emp_id;
        return $this->groupinsuranceRepository->getInsuranceById($id);

    }

    public function getGroupInsuranceByFilter(Request $request)
    {
        $postData = $request->all();
        $result = [];

        try {

        if (isset($postData['company_id'])) {
            $param['company_id'] = $postData['company_id'];
        }
        if (isset($postData['position_id'])) {
            $param['position_id'] = $postData['position_id'];
        }
        if (isset($postData['department_id'])) {
            $param['department_id'] = $postData['department_id'];
        }
            $departments = $this->groupinsuranceRepository->getGroupInsuranceByFilter($param);

            $result['status'] = "success";
            $result['data'] = $departments;
        } catch (\Exception $ex) {
            $result['status'] = "failed";
            $result['message'] = $ex->getMessage();
        }

        return $result;
    }
}
