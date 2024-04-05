<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\ContractsCategoriesInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContractsCategoriesController extends Controller
{
    private $contractsCategoriesRepository;
    public function __construct(ContractsCategoriesInterface $contractsCategoriesRepository)
    {
        $this->contractsCategoriesRepository = $contractsCategoriesRepository;
    }
    public function getConCategory(Request $request)
    {
        return $this->contractsCategoriesRepository->getAll();
    }
    public function create(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        // $nameCon = $request->categories_contract_name;
        try {
            $whereCon = "categories_contract_name = '" . $data['categories_contract_name']."'";
            
            $existingContracts  = $this->contractsCategoriesRepository->selectCustomData(null, $whereCon);
            if (count($existingContracts) > 0) {
                $result = [
                    'status' => 'Duplicate information',
                    'statusCode' => '200',
                    'message' => 'This contracts already exists.'
                ];
            } else {
                $this->contractsCategoriesRepository->create($data);
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
    public function update(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $id = $data['id'];
        try {
            $whereCon = "categories_contract_name = '" . $data['categories_contract_name']."'";
            
            $existingContracts  = $this->contractsCategoriesRepository->selectCustomData(null, $whereCon);
            if (count($existingContracts) > 0) {
                $result = [
                    'status' => 'Duplicate information',
                    'statusCode' => '200',
                    'message' => 'This contracts already exists.'
                ];
            } else {
                $this->contractsCategoriesRepository->update($id, $data);
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
            $this->contractsCategoriesRepository->delete($id);
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
        $contracts =  $this->contractsCategoriesRepository->find($id);

        return response()->json(["data" => $contracts]);

    }
}
