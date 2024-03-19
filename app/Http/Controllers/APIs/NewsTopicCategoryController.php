<?php

namespace App\Http\Controllers\APIs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\NewsTopicCategoryInterface;
use Illuminate\Support\Facades\DB;


class NewsTopicCategoryController extends Controller
{
    private $newsTopicCategoryRepository;
    public function __construct(NewsTopicCategoryInterface $newsTopicCategoryRepository)
    {
        $this->newsTopicCategoryRepository = $newsTopicCategoryRepository;
    }
    public function getNewsCategory(Request $request)
    {
        return $this->newsTopicCategoryRepository->getAll();
    }


    ///// create category /////
    public function create(Request $request)
    {
        // $query = $this->newsTopicCategoryRepository->create($data);
        // $result = [
        //     'news_name' => $query['news_name'],
        //     // 'news_details' => $query['news_details'],
        //     'message' => 'News name already exists.'
        // ];

        // if (isset($result)) {
        //     $result['status'] = 'Success';
        //     $result['statusCode'] = '00';
        // } else {
        //     $result['status'] = 'Create Failed';
        //     DB::rollBack();
        // }
        DB::beginTransaction();
        $data = $request->all();
        // $result['status'] = "Create Success";
        try {
            $existingNews  = $this->newsTopicCategoryRepository->findByNewsName($data['news_name']);

            if ($existingNews) {
                $result = [
                    'status' => 'Duplicate information',
                    'statusCode' => '200',
                    'message' => 'News with this name already exists.'
                ];
            } else {
                $query = $this->newsTopicCategoryRepository->create($data);
                $result = [
                    'news_name' => $query['news_name'],
                    'status' => 'Success',
                    'statusCode' => '00'
                ];
            }
            DB::commit();
        } catch (\Exception $ex) {
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return response()->json(["data" => $result]);
    }

    ///// update category /////
    public function update(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $id = $data['id'];
        try {
            $existingNews  = $this->newsTopicCategoryRepository->findByNewsName($data['news_name']);
            if ($existingNews) {
                $result = [
                    'status' => 'Duplicate information',
                    'statusCode' => '200',
                    'message' => 'News with this name already exists.'
                ];
            } else {
                $query = $this->newsTopicCategoryRepository->update($id, $data);
                $result = [
                    'news_name' => $query['news_name'],
                    'status' => "Success",
                    'statusCode' => '00'
                ];
                
                DB::commit();
            }
        } catch (\Exception $ex) {
            $result['status'] = "Update Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return response()->json(["data" => $result]);
    }

    public function updateCategory(Request $request)
    {
        $id = $request->id;
        $name = $request->news_name;
        // $details = $request->news_details;

        $where = ['id' => $id];
        $update = ['news_name' => $name];
        // $update = ['news_details' => $details];
        // $whereRaw = 'news_id = '.$id;
        $this->newsTopicCategoryRepository->updateCustomData($where, null,  $update);
        $dataUpdate = $this->newsTopicCategoryRepository->find($id);

        return response()->json(["data" => $dataUpdate]);
    }

    ///// delete  /////
    public function delete(Request $request)
    {
        DB::beginTransaction();
        $id = $request->id;
        try {
            $query = $this->newsTopicCategoryRepository->delete($id);
            if (isset($query)) {
                $result['status'] = 'Success';
                $result['statusCode'] = '00';
            } else {
                $result['status'] = 'Delete Failed';
                $result['statusCode'] = '400';
                DB::rollBack();
            }
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "Delete Error. Check the information again";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return response()->json(["data" => $result]);
    }

    ///// Get By Id  /////
    public function getById(Request $request)
    {
        $id = $request->id;
        return $this->newsTopicCategoryRepository->find($id);
    }
}
