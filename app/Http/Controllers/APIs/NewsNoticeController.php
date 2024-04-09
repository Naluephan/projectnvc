<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\NewsNoticeInterface;
use App\Repositories\EmployeeInterface;
use App\Repositories\NewsNoticeEmployeeInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class NewsNoticeController extends Controller
{
    private $newsNoticeRepository;
    private $employeeRepository;
    private $newsNoticeEmployeeRepository;
    public function __construct(NewsNoticeInterface $newsNoticeRepository, EmployeeInterface $employeeRepository, NewsNoticeEmployeeInterface $newsNoticeEmployeeRepository)
    {
        $this->newsNoticeRepository = $newsNoticeRepository;
        $this->employeeRepository = $employeeRepository;
        $this->newsNoticeEmployeeRepository = $newsNoticeEmployeeRepository;
    }

    public function news_notice_employee_lists(Request $request)
    {
        $postData = $request->all();
        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page

        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value

        $param = [
            "columnName" => $columnName,
            "columnSortOrder" => $columnSortOrder,
            "searchValue" => $searchValue,
            "start" => $start,
            "rowperpage" => $rowperpage,
        ];

        // Total records
        $totalRecordswithFilter = $totalRecords = $this->newsNoticeRepository->news_notice_employee_getAll($param)->count();

        // Fetch records
        $records = $this->newsNoticeRepository->news_notice_employee_paginate($param);

        return [
            "aaData" => $records,
            "draw" => $draw,
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
        ];
    }

    public function create(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $result['status'] = "Create Success";

        try {
            $newsNoticeId = $this->newsNoticeRepository->create($data);

            if ($newsNoticeId) {

                $employees = $this->employeeRepository->getAll($data);
                if ($employees) {
                    foreach ($employees as $employee) {

                        $employeeData = [
                            'news_notice_id' => $newsNoticeId->id,
                            'emp_id' => $employee->id,
                        ];

                        $this->newsNoticeEmployeeRepository->create($employeeData);
                    }
                }
            }

            DB::commit();
            $noti_data = [
                // 'device_key' => 'ez-Yt8l2RLWU1nZ8wrqnCm:APA91bGsV9aAa0gLNr5CHv2am3SO3x7OaYvZW1kNc811GCEL_CgO4ZLAV2B6RjntEmynW2yttQICaS49eTgVvO4yBZYaht6T1kBsP41RHb354jXhfiM7dnUKxgd668lshkpGEnWn48kK',
                'title' => $data['news_notice_name'],
                'body' => $data['news_notice_description'],
            ];
            $this->notify($noti_data);
        } catch (\Exception $ex) {
            $result['status'] = "Create Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }

        return $result;
    }

    public function delete(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $id = $data['id'];
        $result['status'] = "Delete Success";

        try {

            $this->newsNoticeRepository->update($id, ['record_status' => 0]);

            $this->newsNoticeEmployeeRepository->deleteAll($id);

            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "Delete Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return json_encode($result);
    }

    public function getById(Request $request)
    {
        $id = $request->id;
        return $this->newsNoticeRepository->find($id);
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $id = $data['id'];
        $result['status'] = "Update Success";
        try {
            $this->newsNoticeRepository->update($id, $data);
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "Update Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return json_encode($result);
    }

    public function searchNewsById(Request $request)
    {
        try {
            $data = $request->all();
            $searchNewsById = $this->newsNoticeRepository->searchNewsById($data);

            if (count($searchNewsById) > 0) {
                $result['status'] = ApiStatus::search_news_by_id_success_status;
                $result['statusCode'] = ApiStatus::search_news_by_id_success_statusCode;
                $result['searchNewsById'] = $searchNewsById;
            } else {
                $result['status'] = ApiStatus::search_news_by_id_failed_status;
                $result['errCode'] = ApiStatus::search_news_by_id_failed_statusCode;
                $result['errDesc'] = ApiStatus::search_news_by_id_failed_Desc;
                $result['message'] = $searchNewsById;
                DB::rollBack();
            }
        } catch (\Exception $ex) {
            $result['status'] = ApiStatus::search_news_by_id_error_statusCode;
            $result['errCode'] = ApiStatus::search_news_by_id_error_status;
            $result['errDesc'] = ApiStatus::search_news_by_id_errDesc;
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return $result;
    }

    public function news_list(Request $request)
    {
        try {
            $data = $request->all();
            $news_list = $this->newsNoticeRepository->getAll($data);
            if ($news_list != null) {
                $result['status'] = ApiStatus::news_list_success_status;
                $result['statusCode'] = ApiStatus::news_list_success_statusCode;
                $result['news_list'] = $news_list;
            } else {
                $result['status'] = ApiStatus::news_list_failed_status;
                $result['errCode'] = ApiStatus::news_list_failed_statusCode;
                $result['errDesc'] = ApiStatus::news_list_failed_Desc;
                $result['message'] = $news_list;
                DB::rollBack();
            }
        } catch (\Exception $ex) {
            $result['status'] = ApiStatus::news_list_error_statusCode;
            $result['errCode'] = ApiStatus::news_list_error_status;
            $result['errDesc'] = ApiStatus::news_list_errDesc;
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return $result;
    }

    ////////////////////////////////////////////////////////
    public function notify($data)
    // public function notify(Request $request)
    {
        // $data = $request->all();
        try {

            if (!isset($data['title']) || !isset($data['body'])) {
                throw new \Exception("Missing required parameters");
            }

            // $registrationIds = is_array($data['device_key']) ? $data['device_key'] : [$data['device_key']];

            $dataArr = [
                "click_action" => "FLUTTER_NOTIFICATION_CLICK",
                "status" => "done",
            ];
            $rawFields = [
                "device_key"
            ];
            $key = $this->employeeRepository->getDeviceKey()->pluck('device_key');
            $notificationData = [
                // "registration_ids" => $registrationIds,
                "registration_ids" => $key,
                "notification" => [
                    "title" => $data['title'],
                    "body" => $data['body'],
                    "sound" => 'default',
                ],
                "data" => $dataArr,
                "priority" => "high"
            ];

            $serverKey = "AAAAz_Szn44:APA91bFBHEojfooGrM1xwMWo6_Kh1hpxcy16u66vtbEid4VHhf-T5_HfwyDOytu1libNQrqWZgidtRqgpEdR3MiumB80N_gsvYvzW02XCc4baCx7PSSpnlLkGGbYy0z5hPa9ztXtDqYN";
            $response = Http::withHeaders([
                'Authorization' => 'key =' . $serverKey,
                'Content-Type' => 'application/json',
            ])->post('https://fcm.googleapis.com/fcm/send', $notificationData);
            return $response ;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
