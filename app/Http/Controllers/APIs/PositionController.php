<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\PositionInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PositionController extends Controller
{
    private $positionRepository;
    public function __construct(PositionInterface $positionRepository)
    {
        $this->positionRepository = $positionRepository;
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
        if(isset($postData['company_id'])){
            $param['company_id'] = $postData['company_id'];
        }
        if(isset($postData['department_id'])){
            $param['department_id'] = $postData['department_id'];
        }

        // Total records
        $totalRecordswithFilter = $totalRecords = $this->positionRepository->getAll($param)->count();

        if (strlen($searchValue) > 0) {
            $totalRecordswithFilter = $this->positionRepository->getAll($param)->count();
        }

        // Fetch records
        $records = $this->positionRepository->paginate($param);

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
            $this->positionRepository->create($data);
            DB::commit();
        } catch (\Exception $ex){
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return json_encode($result);
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $id = $data['id'];
        $result['status'] = "Success";
        try {
            $this->positionRepository->update($id,$data);
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
            $this->positionRepository->delete($id);
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
        return $this->positionRepository->find($id);
    }

    public function positionFilter(Request $request)
    {
        $postData = $request->all();
        $result = [];

        try {
            if (isset($postData['company_id'])) {
                $param['company_id'] = $postData['company_id'];
            }
            if (isset($postData['department_id'])) {
                $param['department_id'] = $postData['department_id'];
            }
         $departments =   $this->positionRepository->getAll($param);
           
            $result['status'] = "success";
            $result['data'] = $departments;
        } catch (\Exception $ex) {
            $result['status'] = "failed";
            $result['message'] = $ex->getMessage();
        }

        return $result;
    }
}
