<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\ContractsChangeInterface;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ContractsChangeController extends Controller
{
    private $contractsChangeRepository;
    public function __construct(ContractsChangeInterface $contractsChangeRepository)
    {
        $this->contractsChangeRepository = $contractsChangeRepository;
    }
    public function getConCategory(Request $request)
    {
        return $this->contractsChangeRepository->getAll();
    }
    public function create(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        try {
            $data = [
                'employee_id' => $data['employee_id'],
                'con_type_name' => $data['con_type_name'],
                'change_details' => $data['change_details'],
            ];
            if ($request->file('images')) {

                $data['images'] = save_image($request->file('images'), 500, '/images/setting/contracts/contractsChange/');

                $this->contractsChangeRepository->create($data);
                $result = [
                    'status' => 'Success',
                    'statusCode' => '00'
                ];
            } else {
                $result = [
                    'status' => 'Failed to save data',
                    'statusCode' => '01'
                ];
            };
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return response()->json(["data" => $result]);
    }
    public function update(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $id = $data['id'];
        try {
            $data = [
                'contract_type_name' => $data['contract_type_name'],
                'contract_details' => $data['contract_details'],
                'images' => $data['images'],
            ];
            if ($request->file('images')) {

                $data['images'] = save_image($request->file('images'), 500, '/images/setting/contracts/contractsChange/');

                $this->contractsChangeRepository->update($id, $data);
                $result = [
                    'status' => 'Success',
                    'statusCode' => '00'
                ];
            } else {
                $result = [
                    'status' => 'Failed to save data',
                    'statusCode' => '01'
                ];
            };
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return response()->json(["data" => $result]);
    }
    public function delete(Request $request)
    {
        DB::beginTransaction();
        $id = $request->id;
        try {
            $this->contractsChangeRepository->delete($id);
            if (isset($query)) {
                $result['status'] = 'Success';
                $result['statusCode'] = '00';
            } else {
                $result['status'] = 'Delete Failed';
                $result['statusCode'] = '01';
                DB::rollBack();
            }
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return response()->json(["data" => $result]);
    }
    public function getById(Request $request)
    {
        $id = $request->id;
        $contracts =  $this->contractsChangeRepository->find($id);

        return response()->json(["data" => $contracts]);
    }
    ////////////////////////////////////////////////////////
    // public function notify(Request $request)
    // {
    //     try {
    //         $data = $request->all();

    //         if (!isset($data['device_key']) || !isset($data['title']) || !isset($data['body'])) {
    //             throw new \Exception("Missing required parameters");
    //         }

    //         $registrationIds = is_array($data['device_key']) ? $data['device_key'] : [$data['device_key']];

    //         $dataArr = [
    //             "click_action" => "FLUTTER_NOTIFICATION_CLICK",
    //             "status" => "done",
    //         ];

    //         $notificationData = [
    //             "registration_ids" => $registrationIds,
    //             "notification" => [
    //                 "title" => $data['title'],
    //                 "body" => $data['body'],
    //                 "sound" => 'default',
    //             ],
    //             "data" => $dataArr,
    //             "priority" => "high"
    //         ];

    //         $serverKey = "AAAAz_Szn44:APA91bFBHEojfooGrM1xwMWo6_Kh1hpxcy16u66vtbEid4VHhf-T5_HfwyDOytu1libNQrqWZgidtRqgpEdR3MiumB80N_gsvYvzW02XCc4baCx7PSSpnlLkGGbYy0z5hPa9ztXtDqYN";
    //         $response = Http::withHeaders([
    //             'Authorization' => 'key =' . $serverKey,
    //             'Content-Type' => 'application/json',
    //         ])->post('https://fcm.googleapis.com/fcm/send', $notificationData);

    //         $jsonData = $response->json();

    //         return $response;
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 400);
    //     }
    // }
}
