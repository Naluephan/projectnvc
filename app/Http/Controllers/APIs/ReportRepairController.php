<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\ReportRepairInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportRepairController extends Controller
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
        $data = $request->all();
        try {
            $data = [
                'emp_id' => $data['emp_id'],
                'categories_id' => $data['categories_id'],
                'equipment_name' => $data['equipment_name'],
                'repair_detail' => $data['repair_detail'],
            ];
            if (isset($data) > 0) {
                if (empty($data)) {
                    $result = [
                        'status' => 'Failed',
                        'statusCode' => '03',
                        'message' => 'Data empty. Check the information again.'
                    ];
                } else {
                    if ($request->file('images')) {
                        $data['images'] = save_image($request->file('images'), 500, '/images/setting/reportRepair/');
                    }
                    $this->reportRepairRepository->create($data);
                    $result = [
                        'status' => 'Success',
                        'statusCode' => '00'
                    ];
                }
            } else {

                $result = [
                    'status' => 'Failed to save data',
                    'statusCode' => '01'
                ];
            };
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
        }
        return response()->json(["data" => $result]);
    }
    public function update(Request $request)
    {

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
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
        }
        return response()->json(["data" => $result]);
    }
    public function delete(Request $request)
    {

        $id = $request->id;
        try {
            $query = $this->reportRepairRepository->delete($id);
            if (isset($query)) {
                $result['status'] = 'Success';
                $result['statusCode'] = '00';
            } else {
                $result['status'] = 'Delete Failed';
                $result['statusCode'] = '01';
            }
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
        }
        return response()->json(["data" => $result]);
    }
    public function getReportRepairId(Request $request)
    {
        $data = $request->all();
        if (empty($data['emp_id'])) {
            return response()->json([
                'status' => 'Data empty.',
                'statusCode' => '03',
                'message' => 'Data empty. Check the information again.'
            ]);
        }
        try {
            $whereReport = ['emp_id' => $data['emp_id']];
            $withRelationsCateId = ['categoriesId'];
            $getRepairId  = $this->reportRepairRepository->selectCustomData($whereReport, null, null, null, null, null, $withRelationsCateId);


            if (count($getRepairId) > 0) {
                $resultData = [];
                foreach ($getRepairId as $reportData) {
                    $dataApp = [
                        'emp_id' => $reportData->emp_id,
                        'id_report' => $reportData->id,
                        'equipment_name' => $reportData->equipment_name,
                        'repair_detail' => $reportData->repair_detail,
                        'images' => $reportData->images ? 'https://newhr.organicscosme.com/uploads/images/reportRepair' . $reportData->images : null,
                        'id_categories' => $reportData->categories_id,
                        'categories_name' => $reportData->categoriesId->categories_name,
                        'report_status' => $reportData->report_status,
                    ];
                    $resultData[] = $dataApp;

                    // if ($reportImage['images'] > 0) {
                    //     $reportImage['images'] = 'https://newhr.organicscosme.com/uploads/images/setting/reprotRepair/' . $reportImage['images'];
                    // }else{
                    //     $result = [
                    //         'status' => 'null',
                    //     ];
                    // };
                };
                $result = [
                    'status' => 'Success',
                    'statusCode' => '00',
                    'reportRepair' => $resultData,
                ];
            } else {
                $result = [
                    'status' => 'Not Exists',
                    'statusCode' => '05',
                ];
            }
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
        }

        return response()->json($result);
    }
}
