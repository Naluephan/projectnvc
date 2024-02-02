<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\SalaryTemplateInterface;
use Illuminate\Http\Request;

class SalaryTemplateController extends Controller
{
    private $salarytemplateRepository;
    public function __construct(SalaryTemplateInterface $salarytemplateRepository)
    {
        $this->salarytemplateRepository = $salarytemplateRepository;
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
        $totalRecordswithFilter = $totalRecords = $this->salarytemplateRepository->getAll($param)->count();

        if (strlen($searchValue) > 0) {
            $totalRecordswithFilter = $this->salarytemplateRepository->getAll($param)->count();
        }

        // Fetch records
        $records = $this->salarytemplateRepository->paginate($param);

        return [
            "aaData" => $records,
            "draw" => $draw,
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
        ];
    }
}
