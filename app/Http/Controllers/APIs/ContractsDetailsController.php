<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\ContractsDetailsInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContractsDetailsController extends Controller
{
    private $contractsDetailsRepository;
    public function __construct(ContractsDetailsInterface $contractsDetailsRepository)
    {
        $this->contractsDetailsRepository = $contractsDetailsRepository;
    }
    public function getConCategory(Request $request)
    {
        return $this->contractsDetailsRepository->getAll();
    }
    public function create(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        try {
            $data = [
                'contract_type_name' => $data['contract_type_name'],
                'contract_details' => $data['contract_details'],
            ];
            if (empty($data['contract_type_name']) || empty($data['contract_details'])) {
                $result = [
                    'status' => 'Failed',
                    'statusCode' => '03',
                    'message' => 'Data empty. Check the information again.'
                ];
            } else if ($request->file('images')) {

                $data['images'] = save_image($request->file('images'), 500, '/images/setting/contracts/contractsDetails/');

                $this->contractsDetailsRepository->create($data);
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
                'contract_type_name' => $data['contract_type_name'],
                'contract_details' => $data['contract_details'],
                'images' => $data['images'],
            ];
            if ($request->file('images')) {

                $data['images'] = save_image($request->file('images'), 500, '/images/setting/contracts/contractsDetails/');

                $this->contractsDetailsRepository->update($id, $data);
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
            $query = $this->contractsDetailsRepository->delete($id);
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
        $contracts =  $this->contractsDetailsRepository->find($id);

        return response()->json(["data" => $contracts]);
    }
}
