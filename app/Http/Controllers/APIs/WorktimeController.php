<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\WorktimeInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class WorktimeController extends Controller
{
    private $worktimeRepository;
    public function __construct(WorktimeInterface $worktimeRepository)
    {
        $this->worktimeRepository = $worktimeRepository;
    }

    public function getWorktime(Request $request){
        $id = $request->id;
        return $this->worktimeRepository->getAll($id);
    }
    public function create(Request $request)
{
    DB::beginTransaction();
    $result = [];
    $data = $request->all();
    try {
        
        // ตรวจสอบว่ามีการเลือกวันทำงานหรือไม่
        if (!isset($data['worktime_day1']) && !isset($data['worktime_day2']) && !isset($data['worktime_day3']) &&
            !isset($data['worktime_day4']) && !isset($data['worktime_day5']) && !isset($data['worktime_day6']) &&
            !isset($data['worktime_day7'])) {
            throw new \Exception('โปรดเลือกวันทำงานอย่างน้อยหนึ่งวัน');
        }

        // สร้างข้อมูลที่จะบันทึกลงฐานข้อมูล
        $savedata = [
            'department_id'=> $data['department_id'],
            'worktime_day1' => isset($data['worktime_day1']) ? $data['worktime_day1'] : null,
            'worktime_day2' => isset($data['worktime_day2']) ? $data['worktime_day2'] : null,
            'worktime_day3' => isset($data['worktime_day3']) ? $data['worktime_day3'] : null,
            'worktime_day4' => isset($data['worktime_day4']) ? $data['worktime_day4'] : null,
            'worktime_day5' => isset($data['worktime_day5']) ? $data['worktime_day5'] : null,
            'worktime_day6' => isset($data['worktime_day6']) ? $data['worktime_day6'] : null,
            'worktime_day7' => isset($data['worktime_day7']) ? $data['worktime_day7'] : null,
            'worktime_start' => $data['worktime_start'],
            'worktime_end' => $data['worktime_end'],
        ];
        
        $existingBuilding = $this->worktimeRepository->findByDepartmentName($savedata);
        if ($existingBuilding) {
            $result['status'] = "Failed";
            $result['duplicate'] = "duplicate";
            return $result;
        }

        // บันทึกข้อมูลลงในฐานข้อมูล
        $this->worktimeRepository->create($data);

        // สถานะการทำงานสำเร็จ
        $result['status'] = "success";
        DB::commit();
    } catch (\Exception $ex) {
        // กรณีเกิดข้อผิดพลาด
        $result['status'] = "failed";
        $result['message'] = $ex->getMessage();
        DB::rollBack();
    }
    return $result;
}
    public function update(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $id = $data['id'];
        $result['status'] = "Success";
        try {
            $this->worktimeRepository->update($id,$data);
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
            $this->worktimeRepository->delete($id);
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
        return $this->worktimeRepository->find($id);
    }
}
