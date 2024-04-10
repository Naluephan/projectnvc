<?php

namespace App\Http\Controllers\APIs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PersonalInformationInterface;
use App\Repositories\EmployeeInterface;
use Illuminate\Support\Facades\DB;

class ProfilePersonalInformationController extends Controller
{
    private $personalInformationRepository;
    private $employeeRepository;

    public function __construct(PersonalInformationInterface $personalInformationRepository, EmployeeInterface $employeeRepository)
    {
        $this->personalInformationRepository = $personalInformationRepository;
        $this->employeeRepository = $employeeRepository;
    }

    public function getAll(Request $request)
    {
        return $this->employeeRepository->getAll($request);
    }

    public function create(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        try {
            $dataToCreate = [
                'info_changed' => $data['info_changed'],
                'details_changed' => $data['details_changed'],
            ];
            if (empty($dataToCreate['info_changed']) || empty($dataToCreate['details_changed'])) {
                $result = [
                    'status' => 'Failed',
                    'statusCode' => '03',
                    'message' => 'Data empty. Check the information again.'
                ];
            } else {
                if ($request->hasFile('images')) {
                    $dataToCreate['images'] = save_image($request->file('images'), 500, '/images/setting/personalInfo/');
                }
                $this->personalInformationRepository->create($dataToCreate);
                $result = [
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
}
