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
        return $this->personalInformationRepository->getAll($request);
    }
    public function getById(Request $request)
    {
        $id = $request->id;
        $query =  $this->personalInformationRepository->find($id);

        return response()->json(["data" => $query]);
    }

    public function create(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        try {
            $data = [
                'emp_changed_id' => $data['emp_changed_id'],
                'info_changed' => $data['info_changed'],
                'details_changed' => $data['details_changed'],
            ];
            if (empty($data['emp_changed_id']) || empty($data['info_changed']) || empty($data['details_changed'])) {
                $result = [
                    'status' => 'Failed',
                    'statusCode' => '03',
                    'message' => 'Data empty. Check the information again.'
                ];
            } else {
                if ($request->File('images')) {
                    $data['images'] = save_image($request->file('images'), 500, '/images/setting/personalInfo/');
                }
                $this->personalInformationRepository->create($data);
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
    public function update(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $id = $data['id'];
        try {
            $data = [
                'emp_changed_id' => $data['emp_changed_id'],
                'info_changed' => $data['info_changed'],
                'details_changed' => $data['details_changed'],
            ];

            if ($request->File('images')) {
                $data['images'] = save_image($request->file('images'), 500, '/images/setting/personalInfo/');
            } else {
                $existing = $this->personalInformationRepository->find($id);
                $data['images'] = $existing->images;
            };
            if (isset($data) > 0) {
                $this->personalInformationRepository->update($id, $data);
                $result = [
                    'status' => 'Success',
                    'statusCode' => '00'
                ];
            } else {
                $result = [
                    'status' => 'Failed to save data',
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
    public function delete(Request $request)
    {
        DB::beginTransaction();
        $id = $request->id;
        try {
            $query = $this->personalInformationRepository->delete($id);
            if (isset($query)) {
                $result['status'] = 'Success';
                $result['statusCode'] = '00';
            } else {
                $result['status'] = 'Delete Failed';
                $result['statusCode'] = '01';
                DB::rollBack();
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
