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

    // public function create(Request $request)
    // {
    //     DB::beginTransaction();
    //     $data = $request->all();
    //     try {
    //         $existingCompany  = $this->companyRepository->findCompany($data['name_th']);
    //         if ($existingCompany) {
    //             $result = [
    //                 'status' => 'Duplicate information',
    //                 'statusCode' => '200',
    //                 'message' => 'This company already exists.'
    //             ];
    //         } else {
    //             $query = $this->companyRepository->create($data);
    //             $result = [
    //                 'name_th' => $query['name_th'],
    //                 'status' => 'Success',
    //                 'statusCode' => '00'
    //             ];
    //         };
    //         DB::commit();
    //     } catch (\Exception $ex){
    //         $result['status'] = "Failed";
    //         $result['message'] = $ex->getMessage();
    //         DB::rollBack();
    //     }
    //     // return json_encode($result);
    //     return response()->json(["data" => $result]);
    // }
    ////////////// Create for check duplicate ////////////
    private function checkDuplicates(array $data, array $fields): array
    {
        $duplicates = [];
        $nonDuplicates = [];

        foreach ($fields as $field) {
            $fieldValues = array_column($data, $field);
            $uniqueFieldValues = array_unique($fieldValues);

            if (count($fieldValues) !== count($uniqueFieldValues)) {
                $duplicates[] = $field;
            } else {
                $nonDuplicates[] = $field;
            }
        }

        return [
            'duplicates' => $duplicates,
            'nonDuplicates' => $nonDuplicates,
        ];
    }
    public function create(Request $request)
    {
        $data = $request->all();
        try {
            $fieldsToCheck = $this->companyRepository->findCompany($data['name_th'], $data['name_en'],$data['short_name']);
            $checkResult = $this->checkDuplicates($data, $fieldsToCheck);
            $duplicates = $checkResult['duplicates'];
            $nonDuplicates = $checkResult['nonDuplicates'];

            if (isset($duplicates['duplicates'])) {
                $result = [
                    'status' => 'Create Failed',
                    'message' => 'Duplicate data exists.',
                    'duplicates' => $duplicates,
                    'statusCode' => '01',
                ];
            } else if (isset($nonDuplicates)) {
                $query = $this->companyRepository->create($data);
                $result = [
                    'dataNoneDuplicate' => $nonDuplicates,
                    'status' => 'Success',
                    'message' => 'Data created successfully.',
                    'statusCode' => '00',
                ];
            }
        } catch (\Exception $ex) {
            $result = [
                'status' => 'Create Failed',
                'message' => $ex->getMessage(),
                'statusCode' => '02',
            ];
        }
        return response()->json(["data" => $result]);
    }
    //////////////////////////////////////////////////////

    public function update(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $id = $data['id'];
        $result['status'] = "Success";
        try {
            $this->companyRepository->update($id, $data);
            DB::commit();
        } catch (\Exception $ex) {
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
            $this->companyRepository->delete($id);
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return json_encode($result);
    }

    public function getById(Request $request)
    {
        $id = $request->id;
        return $this->companyRepository->find($id);
    }
}
