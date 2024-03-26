<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\DepartmentInterface;
use App\Repositories\PositionInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\LengthRequiredHttpException;

class DepartmentController extends Controller
{
    private $departmentRepository;
    private $positionRepository;
    public function __construct(
        DepartmentInterface $departmentRepository,
        PositionInterface $positionRepository
    ) {
        $this->departmentRepository = $departmentRepository;
        $this->positionRepository = $positionRepository;
    }

    // public function getAll(Request $request){
    //     $postData = $request->all();
    //     ## Read value
    //     $draw = $postData['draw'];
    //     $start = $postData['start'];
    //     $rowperpage = $postData['length']; // Rows display per page

    //     $columnIndex = $postData['order'][0]['column']; // Column index
    //     $columnName = $postData['columns'][$columnIndex]['data']; // Column name
    //     $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
    //     $searchValue = $postData['search']['value']; // Search value
    //     $param = [
    //         "columnName" => $columnName,
    //         "columnSortOrder" => $columnSortOrder,
    //         "searchValue" => $searchValue,
    //         "start" => $start,
    //         "rowperpage" => $rowperpage,
    //     ];
    //     if(isset($postData['company_id'])){
    //         $param['company_id'] = $postData['company_id'];
    //     }


    //     // Total records
    //     $totalRecordswithFilter = $totalRecords = $this->departmentRepository->getAll($param)->count();

    //     if (strlen($searchValue) > 0) {
    //         $totalRecordswithFilter = $this->departmentRepository->getAll($param)->count();
    //     }

    //     // Fetch records
    //     $records = $this->departmentRepository->paginate($param);

    //     return [
    //         "aaData" => $records,
    //         "draw" => $draw,
    //         "iTotalRecords" => $totalRecords,
    //         "iTotalDisplayRecords" => $totalRecordswithFilter,
    //     ];
    // }

    public function getAll(Request $request)
    {
        $postData = $request->all();
        $result = [];

        try {
            $param = [];

            if (isset($postData['company_id'])) {
                $param['company_id'] = $postData['company_id'];
            }
            $param['record_status'] = 1;
            $maintenanceList = $this->departmentRepository->getAll($param);


            $result['status'] = "success";
            $result['data'] = $maintenanceList;
        } catch (\Exception $ex) {
            $result['status'] = "failed";
            $result['message'] = $ex->getMessage();
        }

        return $result;
    }
    public function create(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $result['status'] = "Success";
        try {
            $this->departmentRepository->create($data);
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return json_encode($result);
    }

    public function createDepartmentAndPosition(Request $request)
    {
        DB::beginTransaction();
        $result = [];
        $data = $request->all();
        try {
            if ($request->file('image_departments')) {
                $data['image_departments'] = save_image($request->file('image_departments'), 500, '/images/setting/department/');
            }
            $check_dup = [
                'name_th' => $data['name_th'],
                'company_id' => $data['company_id'],
            ];
            $existingDepartment = $this->departmentRepository->findBy($check_dup);
            if ($existingDepartment) {
                $result['status'] = "Failed";
                $result['duplicate'] = "duplicate";
                return $result;
            }
            $data['position_count'] = count($data['positions']);
            $department = $this->departmentRepository->create($data);

            foreach ($data['positions'] as $position_data) {
                $position_data['department_id'] = $department->id;
                $position_data['company_id'] = $data['company_id'];
                $this->positionRepository->create($position_data);
            }
            $result['status'] = "success";
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return $result;
    }

    public function updateDepartmentAndPosition(Request $request)
    {
        DB::beginTransaction();
        $result = [];
        $data = $request->all();
        try {
            if ($request->file('image_departments')) {
                $data['image_departments'] = save_image($request->file('image_departments'), 500, '/images/setting/department/');
            }
            $department = $this->departmentRepository->update($data['id'], $data);
            $department->position_count = count($data['positions']);
            $department->save();

            $position_ids = array_column(array_filter($data['positions'], function ($position) {
                return !empty($position['position_id']);
            }), 'position_id');

            $this->positionRepository->deleteNotIn($position_ids, $department->id);
            foreach ($data['positions'] as $position_data) {
                if ($position_data['position_id'] == null) {
                    $position_data['department_id'] = $department->id;
                    $position_data['company_id'] = $data['company_id'];
                    $this->positionRepository->create($position_data);
                } else {
                    $this->positionRepository->update($position_data['position_id'], $position_data);
                }
            }

            $result['status'] = "success";
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return $result;
    }

    public function getDepartmentById(Request $request)
    {
        $postData = $request->all();
        $result = [];

        try {
            $param['id'] = $postData['id'];
            $epartmentList = $this->departmentRepository->findBy($param);
            $result['status'] = "success";
            $result['data'] = $epartmentList;
        } catch (\Exception $ex) {
            $result['status'] = "failed";
            $result['message'] = $ex->getMessage();
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
            $this->departmentRepository->update($id, $data);
            DB::commit();
        } catch (\Exception $ex) {
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
            $this->departmentRepository->delete($id);
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return json_encode($result);
    }

    public function getById(Request $request)
    {
        $id = $request->id;
        return $this->departmentRepository->find($id);
    }

    public function getDepartmentByCompny(Request $request)
    {
        $company_id = $request->company_id;
        return $this->departmentRepository->getDepartmentInCompany($company_id);
    }


    public function departmentFilter(Request $request)
    {
        $postData = $request->all();
        $result = [];

        try {
            if (isset($postData['company_id'])) {
                $param['company_id'] = $postData['company_id'];
            }
            $departments =   $this->departmentRepository->getAll($param);

            $result['status'] = "success";
            $result['data'] = $departments;
        } catch (\Exception $ex) {
            $result['status'] = "failed";
            $result['message'] = $ex->getMessage();
        }

        return $result;
    }

    public function showDetailById(Request $request)
    {
        $postData = $request->all();
        $result = [];

        try {
            $epartmentList = $this->departmentRepository->showDetailById($postData);
            $result['status'] = "success";
            $result['data'] = $epartmentList;
        } catch (\Exception $ex) {
            $result['status'] = "failed";
            $result['message'] = $ex->getMessage();
        }

        return $result;
    }
}
