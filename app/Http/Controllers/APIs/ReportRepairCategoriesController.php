<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\ReportRepairCategoriesInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportRepairCategoriesController extends Controller
{
    private $reportRepairCategoriesRepository;
    public function __construct(ReportRepairCategoriesInterface $reportRepairCategoriesRepository)
    {
        $this->reportRepairCategoriesRepository = $reportRepairCategoriesRepository;
    }
    public function getAll(Request $request)
    {
        return $this->reportRepairCategoriesRepository->getAll();
    }
    public function create(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        try {
            $whereRepair = "categories_name = '" . $data['categories_name']."'";
            
            $existingContracts  = $this->reportRepairCategoriesRepository->selectCustomData(null, $whereRepair);
            if (empty($data['categories_name'])) {
                $result = [
                    'status' => 'Failed',
                    'statusCode' => '03',
                    'message' => 'Data empty. Check the information again.'
                ];
            } else {
                if (count($existingContracts) > 0){
                    $result = [
                        'status' => 'Duplicate information',
                        'statusCode' => '200',
                        'message' => 'This contracts already exists.'
                    ];
                    
                }else {
                    $this->reportRepairCategoriesRepository->create($data);
                    $result = [
                        'status' => 'Success',
                        'statusCode' => '00'
                    ];
                };
            } 
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
            $whereRepair = "categories_name = '" . $data['categories_name']."'";
            
            $existingContracts  = $this->reportRepairCategoriesRepository->selectCustomData(null, $whereRepair);
            if (count($existingContracts) > 0) {
                $result = [
                    'status' => 'Duplicate information',
                    'statusCode' => '200',
                    'message' => 'This contracts already exists.'
                ];
            } else {
                $this->reportRepairCategoriesRepository->update($id, $data);
                $result = [
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
            $this->reportRepairCategoriesRepository->delete($id);
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
        $contracts =  $this->reportRepairCategoriesRepository->find($id);

        return response()->json(["data" => $contracts]);

    }
}
