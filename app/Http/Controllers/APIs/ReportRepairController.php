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
        DB::beginTransaction();
        $data = $request->all();
        try {
            $data = [
                'comments_id' => $data['comments_id'],
                'comments_details' => $data['comments_details'],
            ];
            if (isset($data) > 0) {
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
                'comments_id' => $data['comments_id'],
                'comments_details' => $data['comments_details'],
            ];
            if (isset($data) > 0) {
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
        $result['status'] = "Success";
        try {
            $this->reportRepairRepository->delete($id);
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
