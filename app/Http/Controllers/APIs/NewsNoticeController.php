<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\NewsNoticeInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsNoticeController extends Controller
{
    private $newsNoticeRepository;
    public function __construct(NewsNoticeInterface $newsNoticeRepository )
    {
        $this->newsNoticeRepository = $newsNoticeRepository;
    }

    public function news_notice_list(Request $request)
    {
        try{
            $data = $request->all();
            $news_notice_list = $this->newsNoticeRepository->getAll($data);
            if($news_notice_list != null ){
             $result['status'] = ApiStatus::news_notice_list_success_status;
             $result['statusCode'] = ApiStatus::news_notice_list_success_statusCode;
             $result['news_notice_list'] = $news_notice_list;

            }else{
             $result['status'] = ApiStatus::news_notice_list_failed_status;
             $result['errCode'] = ApiStatus::news_notice_list_failed_statusCode;
             $result['errDesc'] = ApiStatus::news_notice_list_failed_Desc;
             $result['message'] = $news_notice_list;
             DB::rollBack();
            }
         } catch (\Exception $ex) {
             $result['status'] = ApiStatus::news_notice_list_error_statusCode;
             $result['errCode'] = ApiStatus::news_notice_list_error_status;
             $result['errDesc'] = ApiStatus::news_notice_list_errDesc;
             $result['message'] = $ex->getMessage();
             DB::rollBack();
         }
         return $result;
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
        $result['status'] = "Success";
        try {
            $this->newsNoticeRepository->create($data);
            DB::commit();
        } catch (\Exception $ex){
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return json_encode($result);
    }

    public function delete(Request $request)
    {
        DB::beginTransaction();
        $id = $request->id;
        $result['status'] = "Success";
        try {
            $this->newsNoticeRepository->delete($id);
            DB::commit();
        } catch (\Exception $ex){
            $result['status'] = "Failed";
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
        $result['status'] = "Success";
        try {
            $this->newsNoticeRepository->update($id,$data);
            DB::commit();
        } catch (\Exception $ex){
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return json_encode($result);
    }
}
