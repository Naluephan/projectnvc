<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\LevelInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    private $levelRepository;
    public function __construct(LevelInterface $levelRepository)
    {
        $this->levelRepository = $levelRepository;
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


        // Total records
        $totalRecordswithFilter = $totalRecords = $this->levelRepository->getAll($param)->count();

        if (strlen($searchValue) > 0) {
            $totalRecordswithFilter = $this->levelRepository->getAll($param)->count();
        }

        // Fetch records
        $records = $this->levelRepository->paginate($param);

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
            $this->levelRepository->create($data);
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
            $this->levelRepository->update($id,$data);
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
            $this->levelRepository->delete($id);
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
        return $this->levelRepository->find($id);
    }
}
