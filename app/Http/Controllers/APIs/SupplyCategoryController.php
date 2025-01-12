<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\SupplyCategoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplyCategoryController extends Controller
{
    private $supplycategoryRepository;
    public function __construct(SupplyCategoryInterface $supplycategoryRepository)
    {
        $this->supplycategoryRepository = $supplycategoryRepository;
    }

    public function getSupplyCategory(Request $request)
    {
        $postData = $request->all();
        $result = [];

        try {
            $param = [];


            $supplyCategoryList = $this->supplycategoryRepository->getAll($param);


            $result['status'] = "success";
            $result['data'] = $supplyCategoryList;
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
        $result = [];
        try {
            
            $existingTools  = $this->supplycategoryRepository->findByToolsName($data['category_name']);

            if ($existingTools) {
                $result = [
                    'status' => 'Duplicate information',
                    'statusCode' => '200',
                    'message' => 'Tools with this name already exists.'
                ];
            } else {
                $query = $this->supplycategoryRepository->create($data);
                $result = [
                    'news_name' => $query['category_name'],
                    'status' => 'Success',
                    'statusCode' => '00'
                ];
            }
            DB::commit();
        } catch (\Exception $ex) {
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
        try {
            $this->supplycategoryRepository->update($id, $data);
            $result['status'] = "success";
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "failed";
            $result['message'] = $ex;
            DB::rollBack();
        }
        return $result;
    }

    public function delete(Request $request)
    {
        DB::beginTransaction();
        $id = $request->id;
        $result['status'] = "Success";
        try {
            $this->supplycategoryRepository->delete($id);
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return $result;
    }

    public function getById(Request $request)
    {
        $id = $request->id;
        return $this->supplycategoryRepository->find($id);
    }
}
