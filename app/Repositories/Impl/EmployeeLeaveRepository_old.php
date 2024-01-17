<?php


namespace App\Repositories\Impl;

use App\Models\EmployeeLeave;
use App\Models\Position;
use App\Repositories\EmployeeLeaveInterface;
use Illuminate\Support\Collection;
use Carbon\Carbon;
class EmployeeLeaveRepository extends MasterRepository implements EmployeeLeaveInterface
{
      protected $model;

    public function __construct(EmployeeLeave $model)
    {
        parent::__construct($model);
    }
    // ---------- empLeave  -------------
    public function empLeave($param){
        $data = $this->model->where([
            ['emp_id' ,'=', $param['emp_id']],
            ['month' ,'=', $param['month']],
        ])->get();
        return $data;
    }



    public function saveEmpLeave($data) {
        try {
            $images = ['image1.jpg', 'image2.jpg', 'image3.jpg', 'image4.jpg', 'image5.jpg'];
            $imageData = [];

            for ($i = 0; $i < count($images); $i++) {
                $columnName = 'leave_img1' . ($i + 1);
            
                $imageData[$columnName] = $images[$i];
            }
    
            $empLeave = new EmployeeLeave();
            // $leave_date_start = Carbon::parse($data['leave_date_start']);
            // $leave_date_end = Carbon::parse($data['leave_date_end']);

            // $month = $leave_date_start->format('m');
            // $year = $leave_date_start->format('Y');
            // $days = $leave_date_start->diffInDays($leave_date_end) + 1;

            $empLeave->emp_id = $data['emp_id'];
            $empLeave->leave_type_id = $data['leave_type_id'];
            // $empLeave->leave_type_title = $data['leave_type_title'];
            // $empLeave->status_manager_approve = $data['status_manager_approve'];
            // $empLeave->status_hr_approve = $data['status_hr_approve'];
            // $empLeave->leave_detail = $data['leave_detail'];
            // $empLeave->leave_img1 = $data['leave_img1'];
            // $empLeave->leave_img2 = $data['leave_img2'];
            // $empLeave->leave_img3 = $data['leave_img3'];
            // $empLeave->leave_img4 = $data['leave_img4'];
            // $empLeave->leave_img5 = $data['leave_img5'];
            
            // $empLeave->leave_date_start = $data['leave_date_start'];
            // $empLeave->leave_date_end = $data['leave_date_end'];
            
            // $empLeave->sum_hours = $data['sum_hours'];
            // $empLeave->month = $data['month']->format('m');
            // $empLeave->year = $data['year']->format('Y');
            // $empLeave->days = $data['days']->format('d');
            
            $empLeave->update($imageData);
            $empLeave->save();
    
            return $empLeave;
    
        } catch (\Exception $ex) {
            return ['error' => $ex->getMessage()];
        }
    }
}
