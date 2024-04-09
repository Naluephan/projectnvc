<?php

namespace App\Http\Controllers\APIs;

use App\Events\EmployeePasteCardEvent;
use App\Http\Controllers\Controller;
use App\Repositories\EmployeeInterface;
use App\Repositories\EmployeePasteCardLogInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;

class EmployeePasteCardController extends Controller
{
    private $employeePasteCardLogRepository;
    private $employeeRepository;
    public function __construct(EmployeePasteCardLogInterface $employeePasteCardLogRepository, EmployeeInterface $employeeRepository)
    {
        $this->employeePasteCardLogRepository = $employeePasteCardLogRepository;
        $this->employeeRepository = $employeeRepository;
    }
    public function pasteCard(Request $request)
    {
        $data = $request->all();
        $empId = $data['emp_id'];
        $currentDate = Carbon::now();
        $imgCapture = null;
        if (isset($data['paste_date'])) {
            $currentDate = Carbon::createFromFormat('Y-m-d H:i:s',  $data['paste_date']);
        }
        $status_log = 0;
        $result['status'] = "success";
        $year = $currentDate->year;
        $month = $currentDate->month;
        $day = $currentDate->day;
        if ($currentDate->between(Carbon::today()->setHour(1)->setMinute(0), Carbon::today()->setHour(8)->setMinute(0))) {
            $status_log = 1;
        } elseif ($currentDate->between(Carbon::today()->setHour(12)->setMinute(0), Carbon::today()->setHour(12)->setMinute(20))) {
            $status_log = 2;
        } elseif ($currentDate->between(Carbon::today()->setHour(12)->setMinute(20), Carbon::today()->setHour(13)->setMinute(0))) {
            $status_log = 3;
        } elseif ($currentDate->between(Carbon::today()->setHour(18)->setMinute(0), Carbon::today()->setHour(19)->setMinute(0))) {
            $status_log = 4;
        } else {
            $status_log = 0; // ถ้าไม่อยู่ในช่วงเวลาที่กำหนด
        }
        try {
            $emp = $this->employeeRepository->getUserProfile($empId);
            if (isset($emp)) {
                $data = [
                    'emp_id' => $emp->id,
                    'paste_date' => $currentDate,
                    'year' => $year,
                    'month' => $month,
                    'days' => $day,
                    'img_capture' => $imgCapture,
                    'status' => $status_log,
                ];

                if (isset($request->img_capture)) {
                    $emp_code = $emp->employee_code;
                    $company_code = "TMP";
                    if (isset($emp->company)) {
                        $company_code = $emp->company->order_prefix;
                    }
                    $month_folder = $currentDate->format('ym');
                    $folderPath = "/paste_card/$month_folder/";
                    $image_base64 = $request->img_capture;
                    $base64Image = explode(";base64,", $image_base64);
                    $explodeImage = explode("image/", $base64Image[0]);
                    $imageType = $explodeImage[1];
                    $base64_image = base64_decode($base64Image[1]);
                    $file_name = $currentDate->format('d_His') . '_' . $company_code . $emp_code . '.' . $imageType;
                    $data['image_capture'] = save_base64image($base64_image, 500, $file_name, $folderPath);
                    Log::info('END Employee image process ');
                }
                event(new EmployeePasteCardEvent($data));

                $this->employeePasteCardLogRepository->create($data);
            } else {
                $result['status'] = "failed";
                $result['message'] = "Employee Not Found!!";
            }
        } catch (\Exception $e) {
            $result['status'] = "failed";
            $result['message'] = $e->getMessage();
            Log::error('Pusher pasteCard error: ' . $e->getMessage());
        }
        return json_encode($result);
    }
}
