<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\NewsNoticeEmployeeInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsNoticeEmployeeController extends Controller
{
    private $newsNoticeEmployeeRepository;
    public function __construct(NewsNoticeEmployeeInterface $newsNoticeEmployeeRepository)
    {
        $this->newsNoticeEmployeeRepository = $newsNoticeEmployeeRepository;
    }

    public function news_notice_employee(Request $request)
    {
        try {
            $data = $request->all();
            $news_notice_employee = $this->newsNoticeEmployeeRepository->getAll($data);

            if (count($news_notice_employee) > 0) {
                $result['status'] = ApiStatus::news_notice_employee_success_status;
                $result['statusCode'] = ApiStatus::news_notice_employee_success_statusCode;
                $result['news_notice_employee'] = $news_notice_employee;
            } else {
                $result['status'] = ApiStatus::news_notice_employee_failed_status;
                $result['errCode'] = ApiStatus::news_notice_employee_failed_statusCode;
                $result['errDesc'] = ApiStatus::news_notice_employee_failed_Desc;
                $result['message'] = $news_notice_employee;
                DB::rollBack();
            }
        } catch (\Exception $ex) {
            $result['status'] = ApiStatus::news_notice_employee_error_statusCode;
            $result['errCode'] = ApiStatus::news_notice_employee_error_status;
            $result['errDesc'] = ApiStatus::news_notice_employee_errDesc;
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return $result;
    }

    public function updateReadStatus(Request $request)
    {
        $result = [];

        try {
            $data = $request->all();
            DB::beginTransaction();
            $update_read_status = $this->newsNoticeEmployeeRepository->updateReadStatus($data);

            if ($update_read_status) {
                $result['status'] = ApiStatus::update_read_status_success_status;
                $result['statusCode'] = ApiStatus::update_read_status_success_statusCode;
                $result['update_read_status'] = 'Read Update is ' . $update_read_status;
                DB::commit();
            } else {

                $result['status'] = ApiStatus::update_read_status_failed_status;
                $result['errCode'] = ApiStatus::update_read_status_failed_statusCode;
                $result['errDesc'] = ApiStatus::update_read_status_failed_Desc;
                $result['message'] = "Failed to Non updatable status found.";
                DB::rollBack();
            }
        } catch (\Exception $ex) {
            $result['status'] = ApiStatus::update_read_status_error_status;
            $result['errCode'] = ApiStatus::update_read_status_error_statusCode;
            $result['errDesc'] = ApiStatus::update_read_status_errDesc;
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }

        return $result;
    }
}
