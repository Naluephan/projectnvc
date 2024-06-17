<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\FlexibleHoursLogLineInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlexibleHoursLogLineController extends Controller 
{
    private $FlexibleHoursLogLineRepository;
    public function __construct(FlexibleHoursLogLineInterface $FlexibleHoursLogLineRepository)
    {
        $this->FlexibleHoursLogLineRepository = $FlexibleHoursLogLineRepository;
    }
    ////////// getAll //////////
    public function getAll(Request $request)
    {
        return $this->FlexibleHoursLogLineRepository->getAll();
    }

    ////////// create //////////
    public function create(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        try {
            if (isset($data) > 0) {
                $this->FlexibleHoursLogLineRepository->create($data);
                $result = [
                    'status' => 'Success',
                    'statusCode' => '00'
                ];
            } else {
                $result = [
                    'status' => 'unsuccessful',
                    'statusCode' => '01'
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

    ////////// update //////////
    public function update(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $id = $data['id'];

        try {
            if (isset($data) > 0) {
                $this->FlexibleHoursLogLineRepository->update($id, $data);
                $result = [
                    'status' => 'Update Success',
                    'statusCode' => '00'
                ];
            } else {
                $result = [
                    'status' => 'Update unsuccessful',
                    'statusCode' => '01'
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


    ////////// delete //////////
    public function delete(Request $request)
    {
        DB::beginTransaction();
        $id = $request->id;
        $result['status'] = "Success";
        try {
            $this->FlexibleHoursLogLineRepository->delete($id);
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return response()->json(["data" => $result]);
    }
   
}
