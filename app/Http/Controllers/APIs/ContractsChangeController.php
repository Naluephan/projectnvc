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
                'emp_id' => $data['emp_id'],
                'contract_category_id' => $data['contract_category_id'],
                'change_details' => $data['change_details'],
            ];
            if (empty($data['emp_id']) || empty($data['contract_category_id']) || empty($data['change_details'])) {
                $result = [
                    'status' => 'Data empty',
                    'statusCode' => '03',
                    'message' => 'Data empty. Check the information again.'
                ];
            } else {
                if ($request->hasFile('images')) {
                    $data['images'] = save_image($request->file('images'), 500, '/images/setting/contracts/contractsChange/');
                }

                $this->contractsChangeRepository->create($data);
                $result = [
                    'status' => 'Success',
                    'statusCode' => '00'
                ];
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
            $data = [
                'emp_id' => $data['emp_id'],
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
    public function getEmpId(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        try {
            $whereCon = "emp_id = '" . $data['emp_id'] . "'";
            $getConId  = $this->contractsChangeRepository->selectCustomData(null, $whereCon);
            if (empty($data['emp_id'])) {
                $result = [
                    'status' => 'Data empty.',
                    'statusCode' => '03',
                    'message' => 'Data empty. Check the information again.'
                ];
            } else {
                if (count($getConId) > 0) {
                    $result = [
                        'status' => 'Success',
                        'statusCode' => '00',
                        'contracts' => $getConId
                    ];
                } else {
                    $result = [
                        'status' => 'Not Exists',
                        'statusCode' => '05',
                    ];
                }
            }
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }

        return response()->json(["data" => $result]);
    }
}
