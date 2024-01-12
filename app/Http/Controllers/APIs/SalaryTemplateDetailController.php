<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\SalaryTemplateDetailInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaryTemplateDetailController extends Controller
{
    private $salarytemplatedetailRepository;
    public function __construct(SalaryTemplateDetailInterface $salarytemplatedetailRepository)
    {
        $this->salarytemplatedetailRepository = $salarytemplatedetailRepository;
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
        $totalRecordswithFilter = $totalRecords = $this->salarytemplatedetailRepository->getAll($param)->count();

        if (strlen($searchValue) > 0) {
            $totalRecordswithFilter = $this->salarytemplatedetailRepository->getAll($param)->count();
        }

        // Fetch records
        $records = $this->salarytemplatedetailRepository->paginate($param);

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
        $templateLists = $request->all();
        try {
            foreach($templateLists["data"] as $templateList){
                $list = [
                    'id'=>$templateList["id"],
                    'template_id' => 1,
                    'detail' => $templateList["detail"],
                    'position' => $templateList["position"],
                    'type' => $templateList["type"],
                ];
                $tmpId = $templateList["id"];
                $data_update = [
                    'template_id' => 1,
                    'detail' => $templateList["detail"],
                    'position' => $templateList["position"],
                    'type' => $templateList["type"],
                ];
                $check = $this->salarytemplatedetailRepository->checkListTemplateDetail($tmpId);
                if(isset($check)){
                    $update = $this->salarytemplatedetailRepository->updateListTemplateDetail($tmpId,$data_update);
                   if($update){
                        $result['data'] = $update;
                       return $result;
                   }
                }else{
                    $create = $this->salarytemplatedetailRepository->create($list);
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

    public function getByTemplateId(Request $request)
    {
        $id = $request->id;
        //return $id;
        return $this->salarytemplatedetailRepository->getByTemplateId($id);
    }
}
