<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\SocialSecurityInterface;
use Illuminate\Support\Facades\DB;



class SocialSecurityController extends Controller
{
    private $socialsecurityRepository;
    public function __construct(SocialSecurityInterface $socialsecurityRepository)
    {
        $this->socialsecurityRepository = $socialsecurityRepository;
    }

    public function getSocialSecurity(Request $request)
    {
        try {
        $data = $request->all();
        $getsocial_security = $this->socialsecurityRepository->getSocialSecurity($data);
        if (count($getsocial_security) > 0) {
            $result['status'] = ApiStatus::social_security_success_status;
            $result['statusCode'] = ApiStatus::social_security_success_statusCode;
            $result['data'] = $getsocial_security;
        } else {
            $result['status'] = ApiStatus::social_security_failed_status;
            $result['statusCode'] = ApiStatus::social_security_failed_statusCode;
            $result['errDesc'] = ApiStatus::social_security_failed_Desc;
        }
    } catch (\Exception $e) {
        $result['status'] = ApiStatus::social_security_error_statusCode;
        $result['errCode'] = ApiStatus::social_security_error_status;
        $result['errDesc'] = ApiStatus::social_security_errDesc;
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
            $this->socialsecurityRepository->findBy($search_criteria);
                $save_data = [
                    'emp_id' => $data['emp_id'],
                    'social_security_type_id' => $data['social_security_type_id'],
                ];
                
                $this->socialsecurityRepository->create($save_data);
                $result['status'] = ApiStatus::social_security_success_status;
                $result['statusCode'] = ApiStatus::social_security_success_statusCode;
            } catch (\Exception $e) {
                $result['status'] = ApiStatus::social_security_error_statusCode;
                $result['errCode'] = ApiStatus::social_security_error_status;
                $result['errDesc'] = ApiStatus::social_security_errDesc;
                $result['message'] = $e->getMessage();
            }
            return $result;
        }

    public function update(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        try {
            $this->socialsecurityRepository->update($id, $data);
            $result['status'] = ApiStatus::social_security_success_status;
            $result['statusCode'] = ApiStatus::social_security_success_statusCode;
        }  catch (\Exception $e) {
            $result['status'] = ApiStatus::social_security_error_statusCode;
            $result['errCode'] = ApiStatus::social_security_error_status;
            $result['errDesc'] = ApiStatus::social_security_errDesc;
            $result['message'] = $e->getMessage();
        }
        return $result;
    }
    public function getById(Request $request)
    {
        $id = $request->id;
        return $this->socialsecurityRepository->find($id);
    }
    public function delete(Request $request)
    {
        $id = $request->id;
       
        try {
            $this->socialsecurityRepository->delete($id);
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
