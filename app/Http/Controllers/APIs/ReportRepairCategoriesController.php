<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\ReportRepairInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportRepairCategoriesController extends Controller
{
    private $reportRepairRepository;
    public function __construct(ReportRepairInterface $reportRepairRepository)
    {
        $this->reportRepairRepository = $reportRepairRepository;
    }
    public function getAll(Request $request)
    {
        return $this->reportRepairRepository->getAll();
    }
    public function create(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        try {
            $data = [
                'repair_id' => $data['repair_id'],
                'repair_type' => $data['repair_type'],
                'repair_equipment' => $data['repair_equipment'],
                'repair_detail' => $data['repair_detail'],
                'status' => 0,
            ];
            if ($request->file('images')) {
                $data['images'] = save_image($request->file('images'), 500, '/images/setting/reportRepair/');

                $this->reportRepairRepository->create($data);
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
                'repair_id' => $data['repair_id'],
                'repair_type' => $data['repair_type'],
                'repair_equipment' => $data['repair_equipment'],
                'repair_detail' => $data['repair_detail'],
                'status' => $data['status'],
            ];
            if ($request->file('images')) {
                $data['images'] = save_image($request->file('images'), 500, '/images/setting/reportRepair/');
                $this->reportRepairRepository->update($id, $data);
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
            $query =$this->reportRepairRepository->delete($id);
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
        $contracts =  $this->reportRepairRepository->find($id);

        return response()->json(["data" => $contracts]);
    }
}
