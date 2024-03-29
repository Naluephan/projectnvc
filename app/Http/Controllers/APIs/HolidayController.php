<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\HolidayInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HolidayController extends Controller
{
    private $holidayRepository;
    public function __construct(HolidayInterface $holidayRepository)
    {
        $this->holidayRepository = $holidayRepository;
    }

    public function getAll(Request $request){
        return $this->holidayRepository->getAll();

    }

    public function create(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $result=[];
        try {
            $check_dup = [
                'holiday_name' => $data['holiday_name'],
                'holiday_start' => $data['holiday_start'],
                'holiday_end' => $data['holiday_end'],
            ];
            $existingBuilding = $this->holidayRepository->findBy($check_dup);
        if ($existingBuilding) {
            $result['status'] = "Failed";
            $result['duplicate'] = "duplicate";
            return $result;
        }
            $this->holidayRepository->create($data);
            $result['status'] = "Success";
            DB::commit();
        } catch (\Exception $ex){
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return json_encode($result);
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $id = $data['id'];
        $result['status'] = "Success";
        try {
            $this->holidayRepository->update($id,$data);
            DB::commit();
        } catch (\Exception $ex){
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return json_encode($result);
    }

    public function delete(Request $request)
    {
        DB::beginTransaction();
        $id = $request->id;
        $result['status'] = "Success";
        try {
            $this->holidayRepository->delete($id);
            DB::commit();
        } catch (\Exception $ex){
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return json_encode($result);
    }

    public function getById(Request $request)
    {
        $id = $request->id;
        return $this->holidayRepository->find($id);
    }
}
