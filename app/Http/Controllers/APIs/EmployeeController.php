<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\EmployeeInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    private $employeeRepository;
    public function __construct(EmployeeInterface $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function empList(Request $request){

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

        if(isset($postData['company_id'])){
            $param['company_id'] = $postData['company_id'];
        }


        // Total records
        $totalRecordswithFilter = $totalRecords =$this->employeeRepository->getAll($param)->count();

        // Fetch records
        $records = $this->employeeRepository->paginate($param);

        return [
            "aaData" => $records,
            "draw" => $draw,
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
        ];
    }

    public function employeeDelete(Request $request)
    {
        DB::beginTransaction();
        $result = [];
        $data = $request->all();
        try {
        $update = $this->employeeRepository->update($data['id'],$data);
        $result['status'] = "success";
            DB::commit();
        } catch (\Exception $ex){
            $result['status'] = "failed";
            $result['message'] = $ex;
            DB::rollBack();
        }
        return $result;
    }

    public function findEmpById(Request $request)
    {
        $data = $request->all();
        try {
            $data = $this->employeeRepository->findById($data['id']);
            return $data;
        } catch (\Exception $ex) {
            $result['status'] = 'Failed';
            // $result['message'] = $ex->getMessage();
            return $result;
        }

        // dd($data->leadOrders[0]->orderDetails);

    }
}
