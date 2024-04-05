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
                    'child_certificate' => $data['child_certificate'],
                    'saving_passbook' => $data['saving_passbook'],
                    'marriage_certificate' => $data['marriage_certificate'],
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

    public function deleteUpdate(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $id = $data['id'];
        $result['status'] = "Success";
        try {
            $this->socialsecurityRepository->update($id, $data);
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return json_encode($result);
    }
}
