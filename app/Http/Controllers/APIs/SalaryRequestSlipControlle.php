<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\SalaryRequestSlipInterface;
use Illuminate\Support\Facades\DB;



class SalaryRequestSlipControlle extends Controller
{

    private $salaryRequestSlipRepository;
    public function __construct(SalaryRequestSlipInterface $salaryRequestSlipRepository)
    {
        $this->salaryRequestSlipRepository = $salaryRequestSlipRepository;
    }

    public function getAll(Request $request)
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
        $totalRecordswithFilter = $totalRecords = $this->salaryRequestSlipRepository->getAll($param)->count();

        // Fetch records
        $records = $this->salaryRequestSlipRepository->paginate($param);

        return [
            "aaData" => $records,
            "draw" => $draw,
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
        ];
    }

    public function approve(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $id = $data['id'];
        try {
            $this->salaryRequestSlipRepository->update($id, $data);
            $result['status'] = "Success";
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return json_encode($result);
    }

    public function salary_create_request_slip(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        try {
            $query = $this->salaryRequestSlipRepository->create($data);
            if(isset($query)) {
                $result['status'] = ApiStatus::requestSlip_success_status;
                $result['statusCode'] = ApiStatus::requestSlip_success_statusCode;
                DB::commit();
               }else{
                $result['status'] = ApiStatus::requestSlip_failed_status;
                $result['errCode'] = ApiStatus::requestSlip_failed_statusCode;
                $result['errDesc'] = ApiStatus::requestSlip_failed_Desc;
                DB::rollBack(); 
               }
        } catch (\Exception $ex){
            $result['status'] = ApiStatus::requestSlip_error_statusCode;
            $result['errCode'] = ApiStatus::requestSlip_error_status;
            $result['errDesc'] = ApiStatus::requestSlip_errDesc;
            $result['message'] = $ex->getMessage();
        }
        return $result;
    }
}
