<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\SecuritySettingInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SecuritySettingController extends Controller
{
    private $securitySettingRepository;

    public function __construct(
        SecuritySettingInterface $securitySettingRepository

    ) {
        $this->securitySettingRepository = $securitySettingRepository;
    }

    public function securityList(Request $request)
    {
        $postData = $request->all();
        $result = [];

        try {
            $param = [];


            $securityList = $this->securitySettingRepository->getAll($param);


            $result['status'] = "success";
            $result['data'] = $securityList;
        } catch (\Exception $ex) {
            $result['status'] = "failed";
            $result['message'] = $ex->getMessage();
        }

        return $result;
    }

    public function create(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $result = [];
        try {
            $save_data = [
                'name' => $data['name'],
                'locations_id' => $data['locations_id'],
                'security_patrol' => $data['security_patrol'],
                'security_time' => $data['security_time'],
            ];
            if ($request->file('security_img')) {
                $save_data['security_img'] = save_image($request->file('security_img'), 500, '/images/setting/security/');
            }
            $this->securitySettingRepository->create($save_data);

            $result['status'] = "success";
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return $result;
    }

    public function getSecurityById(Request $request)
    {
        $postData = $request->all();
        $result = [];

        try {
            $securityList = $this->securitySettingRepository->find($postData['id']);
            $result['status'] = "success";
            $result['data'] = $securityList;
        } catch (\Exception $ex) {
            $result['status'] = "failed";
            $result['message'] = $ex->getMessage();
        }

        return $result;
    }

    public function securityUpdate(Request $request)
    {
        DB::beginTransaction();
        $result = [];
        $data = $request->all();
        try {
            if ($request->file('security_img')) {
                $data['security_img'] = save_image($request->file('security_img'), 500, '/images/setting/security/');
            }
            $update = $this->securitySettingRepository->update($data['id'], $data);
            $result['status'] = "success";
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "failed";
            $result['message'] = $ex;
            DB::rollBack();
        }
        return $result;
    }
}
