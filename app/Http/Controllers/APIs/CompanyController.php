<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\CompanyInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    private $companyRepository;
    public function __construct(CompanyInterface $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function getCompanies(Request $request)
    {

        return $this->companyRepository->all();
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
        $totalRecordswithFilter = $totalRecords = $this->companyRepository->getAll($param)->count();

        if (strlen($searchValue) > 0) {
            $totalRecordswithFilter = $this->companyRepository->getAll($param)->count();
        }

        // Fetch records
        $records = $this->companyRepository->paginate($param);

        return [
            "aaData" => $records,
            "draw" => $draw,
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
        ];
    }
    public function getCompanyList(Request $request)
    {
        return $this->companyRepository->getComAll();
    }

    public function create(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        try {
            $whereOr = "name_th = '" . $data['name_th'] . "' OR " . "name_en = '" . $data['name_en'] . "' OR " . "short_name = '" . $data['short_name'] . "' OR " . "order_prefix = '" . $data['order_prefix'] . "'";
            $existingCompany  = $this->companyRepository->selectCustomData(null, $whereOr);
            if (count($existingCompany) > 0) {
                $result = [
                    'status' => 'Duplicate information',
                    'statusCode' => '200',
                    'message' => 'This company already exists.'
                ];
            } else {
                $query = $this->companyRepository->create($data);
                $result = [
                    'name_th' => $query['name_th'],
                    'status' => 'Success',
                    'statusCode' => '00'
                ];
            };
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return response()->json(["data" => $result]);
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $id = $data['id'];
        try {
            $whereOr = "name_th = '" . $data['name_th'] . "' OR " . "name_en = '" . $data['name_en'] . "' OR " . "short_name = '" . $data['short_name'] . "' OR " . "order_prefix = '" . $data['order_prefix'] . "'";
            $existingCompany  = $this->companyRepository->selectCustomData(null, $whereOr);
            if (count($existingCompany) > 0) {
                $result = [
                    'status' => 'Duplicate information',
                    'statusCode' => '200',
                    'message' => 'This company already exists.'
                ];
            } else {
                $query = $this->companyRepository->update($id, $data);
                $result = [
                    'name_th' => $query['name_th'],
                    'status' => 'Success',
                    'statusCode' => '00'
                ];
            };
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return response()->json(["data" => $result]);
    }

    public function delete(Request $request)
    {
        DB::beginTransaction();
        $id = $request->id;
        $result['status'] = "Success";
        try {
            $this->companyRepository->delete($id);
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return response()->json(["data" => $result]);
    }

    public function getById(Request $request)
    {
        $id = $request->id;
        return $this->companyRepository->find($id);
    }
}
