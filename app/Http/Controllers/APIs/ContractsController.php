<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\ContractsInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContractsController extends Controller
{
    private $contractsRepository;
    public function __construct(ContractsInterface $contractsRepository)
    {
        $this->contractsRepository = $contractsRepository;
    }
    public function getAll(Request $request)
    {
        return $this->contractsRepository->getAll();
    }
    public function create(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        try {
            $whereCon = "contract_category_id = '" . $data['contract_category_id'] . "' AND " . "emp_id = '" . $data['emp_id'] . "'";
            $empExists  = $this->contractsRepository->selectCustomData(null, $whereCon);

            $data = [
                'contract_category_id' => $data['contract_category_id'],
                'emp_id' => $data['emp_id'],
                'contract_details' => $data['contract_details'],
            ];
            if (count($empExists) > 0) {
                $result = [
                    'status' => 'Duplicate information',
                    'statusCode' => '200',
                    'message' => 'This company already exists.'
                ];
            } else {
                if (empty($data['contract_category_id']) || empty($data['emp_id']) || empty($data['contract_details'])) {
                    $result = [
                        'status' => 'Failed',
                        'statusCode' => '03',
                        'message' => 'Data empty. Check the information again.'
                    ];
                } else {
                    if ($request->file('images')) {

                        $data['images'] = save_image($request->file('images'), 500, '/images/setting/contracts/contracts/');

                        $this->contractsRepository->create($data);
                        $result = [
                            'status' => 'Success',
                            'statusCode' => '00'
                        ];
                    }
                }
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
            $existingData = $this->contractsRepository->find($id);
            $data = [
                'contract_category_id' => $data['contract_category_id'],
                'emp_id' => $data['emp_id'],
                'contract_details' => $data['contract_details'],
            ];
            if ($request->file('images')) {

                $data['images'] = save_image($request->file('images'), 500, '/images/setting/contracts/contracts/');
            } else {
                $data['images'] = $existingData->images;
            };
            $this->contractsRepository->update($id, $data);
            $result = [
                'status' => 'Success',
                'statusCode' => '00'
            ];

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
            $query = $this->contractsRepository->delete($id);
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
    // public function getById(Request $request)
    // {
    //     $id = $request->id;
    //     $contracts =  $this->contractsRepository->find($id);

    //     return response()->json([$contracts]);
    // }
    public function getById(Request $request)
    {
        $id = $request->id;
        $contract =  $this->contractsRepository->find($id);

        if ($contract) {
            $contract->images = 'https://newhr.organicscosme.com/' . $contract->images;

            return response()->json([$contract]);
        } else {
            return response()->json(['error' => 'Contract not found'], 404);
        }
    }
    
    public function getEmpIdCon(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        try {
            $whereCom = "emp_id = '" . $data['emp_id'] . "'";
            $orderByCom = ['contract_category_id' => 'asc'];
            $getConId  = $this->contractsRepository->selectCustomData(null, $whereCom, null, $orderByCom);
            if (empty($data['emp_id'])) {
                $result = [
                    'status' => 'Data empty.',
                    'statusCode' => '03',
                    'message' => 'Data empty. Check the information again.'
                ];
            } else {
                if (count($getConId) > 0) {
                    foreach ($getConId as $contract) {
                        $contract->images = 'https://newhr.organicscosme.com/uploads/images/setting/contracts/contracts' . $contract->images;
                        $categories = [
                            '1' => 'สัญญาจ้าง',
                            '2' => 'สัญญายืมทรัพย์สิน',
                            '3' => 'สัญญารักษาความลับ',
                            '4' => 'สัญญาอนุญาติเปิดเผยข้อมูลส่วนบุคคล'
                        ];
                        $contract->contracts_name = $categories[$contract->contract_category_id];
                    };
                    $result = [
                        'status' => 'Success',
                        'statusCode' => '00',
                        'contracts' => $getConId,
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

        return response()->json( $result);
    }
}
