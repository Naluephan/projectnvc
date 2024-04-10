<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\ContractsChangeInterface;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ContractsChangeController extends Controller
{
    private $contractsChangeRepository;
    public function __construct(ContractsChangeInterface $contractsChangeRepository)
    {
        $this->contractsChangeRepository = $contractsChangeRepository;
    }
    public function getConCategory(Request $request)
    {
        return $this->contractsChangeRepository->getAll();
    }
    public function create(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        try {
            $data = [
                'employee_id' => $data['employee_id'],
                'con_type_name' => $data['con_type_name'],
                'change_details' => $data['change_details'],
            ];
            if (empty($data['employee_id']) || empty($data['con_type_name']) || empty($data['change_details'])) {
                $result = [
                    'status' => 'Failed',
                    'statusCode' => '03',
                    'message' => 'Data empty. Check the information again.'
                ];
            } else if ($request->file('images')) {

                $data['images'] = save_image($request->file('images'), 500, '/images/setting/contracts/contractsChange/');

                $this->contractsChangeRepository->create($data);
                $result = [
                    'status' => 'Success',
                    'statusCode' => '00'
                ];
            } else {
                $result = [
                    'status' => 'Failed to save data',
                    'statusCode' => '01'
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
            $data = [
                'employee_id' => $data['employee_id'],
                'con_type_name' => $data['con_type_name'],
                'change_details' => $data['change_details'],
            ];
            if ($request->file('images')) {

                $data['images'] = save_image($request->file('images'), 500, '/images/setting/contracts/contractsChange/');

                $this->contractsChangeRepository->update($id, $data);
                $result = [
                    'status' => 'Success',
                    'statusCode' => '00'
                ];
            } else {
                $result = [
                    'status' => 'Failed to save data',
                    'statusCode' => '01'
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
        try {
            $query = $this->contractsChangeRepository->delete($id);
            if (isset($query)) {
                $result['status'] = 'Success';
                $result['statusCode'] = '00';
            } else {
                $result['status'] = 'Delete Failed';
                $result['statusCode'] = '01';
                DB::rollBack();
            }
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
        $contracts =  $this->contractsChangeRepository->find($id);

        return response()->json(["data" => $contracts]);
    }
}
