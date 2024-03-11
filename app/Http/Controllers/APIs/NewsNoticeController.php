<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\NewsNoticeInterface;
use App\Repositories\EmployeeInterface;
use App\Repositories\NewsNoticeEmployeeInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        if ($data['news_notice_description'] === null) {
            $data['news_notice_description'] = '-';
        }

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
}
