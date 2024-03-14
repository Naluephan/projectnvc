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
                'location' => $data['location'],
                'security_patrol' => $data['security_patrol'],
                'security_time' => $data['security_time'],
            ];
            if ($request->file('security_img')) {
                $save_data['security_img'] = save_image($request->file('security_img'), 500, '/product_img/');
            }
            $this->securitySettingRepository->create($save_data);

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
