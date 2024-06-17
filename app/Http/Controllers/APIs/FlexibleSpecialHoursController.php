<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\FlexibleSpecialHoursInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlexibleSpecialHoursController extends Controller 
{
    private $FlexibleSpecialHoursRepository;
    public function __construct(FlexibleSpecialHoursInterface $FlexibleSpecialHoursRepository)
    {
        $this->FlexibleSpecialHoursRepository = $FlexibleSpecialHoursRepository;
    }
    ////////// getAll //////////
    public function getAll(Request $request)
    {
        return $this->FlexibleSpecialHoursRepository->getAll();
    }

    ////////// create //////////
    public function create(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        try {
            if (isset($data) > 0) {
                $this->FlexibleSpecialHoursRepository->create($data);
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
                $this->FlexibleSpecialHoursRepository->update($id, $data);
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
            $this->FlexibleSpecialHoursRepository->delete($id);
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return response()->json(["data" => $result]);
    }
   
}
