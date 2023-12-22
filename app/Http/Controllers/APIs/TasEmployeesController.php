<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\TasEmployeeInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TasEmployeesController extends Controller
{
    private $tasemployeesRepository;
    public function __construct(TasEmployeeInterface $tasemployeesRepository)
    {
        $this->tasemployeesRepository = $tasemployeesRepository;
    }

    public function getAll(Request $request){
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
        if(isset($postData['tas_id'])){
            $param['tas_id'] = $postData['tas_id'];
        }


        // Total records
        $totalRecordswithFilter = $totalRecords = $this->tasemployeesRepository->getAll($param)->count();

        if (strlen($searchValue) > 0) {
            $totalRecordswithFilter = $this->tasemployeesRepository->getAll($param)->count();
        }

        // Fetch records
        $records = $this->tasemployeesRepository->paginate($param);

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
        $emplists = $request->all();
        try {
            foreach($emplists as $emplist){
                $data = [
                    'emp_id' => $emplist['emp_id'],
                    'tas_id' => $emplist['tas_id'],
                    'participate_status' => 0,
                    'cert_status' => 0,
                    'remark1' => $emplist['remark1'],
                    'remark2' => $emplist['remark2'],
                    'remark3' => $emplist['remark3'],
                ];
                $emp_id = $data['emp_id'];
                $tas_id = $data['tas_id'];
                $check = $emplist['check'];
                $data_update = [
                    'remark1' => $data['remark1'],
                    'remark2' => $data['remark2'],
                    'remark3' => $data['remark3'],
                ];
                if($check == 1){
                    $check_ = $this->tasemployeesRepository->checkListEmployees($emp_id,$tas_id);
                    //return $check_;
                    if(isset($check_)){
                         $update = $this->tasemployeesRepository->updateListEmployees($emp_id,$tas_id,$data_update);
                        if($update){
                             $result['data'] = $update;
                            return $result;
                        }
                    }else{
                         $create = $this->tasemployeesRepository->create($data);
                    }
                }
            }
            $result['status'] = "Success";
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
            $this->tasemployeesRepository->delete($id);
            DB::commit();
        } catch (\Exception $ex){
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return json_encode($result);
    }

}
