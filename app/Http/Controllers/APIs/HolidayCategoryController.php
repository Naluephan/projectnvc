<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\HolidayCategoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HolidayCategoryController extends Controller
{
    private $holidaycategoryRepository;
    public function __construct(HolidayCategoryInterface $holidaycategoryRepository)
    {
        $this->holidaycategoryRepository = $holidaycategoryRepository;
    }

    public function getHolidayCategory(Request $request)
    {
        return $this->holidaycategoryRepository->getAll();
    }

    public function create(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        try {
            $whereOr = "holiday_name = '" . $data['holiday_name'] . "' OR " . "holiday_start = '" . $data['holiday_start'] . "' OR " . "holiday_end = '" . $data['holiday_end'] . "'";
            $existingHoliday = $this->holidaycategoryRepository->selectCustomData(null, $whereOr);
            if (count($existingHoliday) > 0) {
                $result = [
                    'status' => 'Duplicate information',
                    'statusCode' => '200',
                    'message' => 'This company already exists.'
                ];
            } else {
                $query = $this->holidaycategoryRepository->create($data);
                $result = [
                    'holiday_name' => $query['holiday_name'],
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
        // return json_encode($result);
        return response()->json(["data" => $result]);
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $id = $data['id'];

        try {
            $whereOr = "holiday_name = '" . $data['holiday_name'] . "' OR " . "holiday_start = '" . $data['holiday_start'] . "' OR " . "holiday_end = '" . $data['holiday_end'] . "'";
            $existingHoliday = $this->holidaycategoryRepository->selectCustomData(null, $whereOr);
            if (count($existingHoliday) > 0) {
                $result = [
                    'status' => 'Duplicate information',
                    'statusCode' => '200',
                    'message' => 'This company already exists.'
                ];
            } else {
                $query = $this->holidaycategoryRepository->update($id, $data);
                $result = [
                    'holiday_name' => $query['holiday_name'],
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

    public function delete(Request $request)
    {
        DB::beginTransaction();
        $id = $request->id;
        $result['status'] = "Success";
        try {
            $this->holidaycategoryRepository->delete($id);
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return response()->json(["data" => $result]);
        // return json_encode($result);
    }

    public function getById(Request $request)
    {
        $id = $request->id;
        return $this->holidaycategoryRepository->find($id);
    }
}
