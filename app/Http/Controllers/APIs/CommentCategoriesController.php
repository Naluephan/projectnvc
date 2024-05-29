<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\CommentCategoriesInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentCategoriesController extends Controller 
{
    private $commentCategoriesRepository;
    public function __construct(CommentCategoriesInterface $commentCategoriesRepository)
    {
        $this->commentCategoriesRepository = $commentCategoriesRepository;
    }
    public function getComCategory(Request $request)
    {
        return $this->commentCategoriesRepository->getAll();
    }
    public function create(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        // $nameCon = $request->categories_comment_name;
        try {
            $whereCon = "categories_comment_name = '" . $data['categories_comment_name']."'";
            
            $existingComment  = $this->commentCategoriesRepository->selectCustomData(null, $whereCon);
            if (empty($data['categories_comment_name'])) {
                $result = [
                    'status' => 'Failed',
                    'statusCode' => '03',
                    'message' => 'Data empty. Check the information again.'
                ];
            } else {
                if (count($existingComment) > 0){
                    $result = [
                        'status' => 'Duplicate information',
                        'statusCode' => '200',
                        'message' => 'This comment already exists.'
                    ];
                    
                }else {
                    $this->commentCategoriesRepository->create($data);
                    $result = [
                        'status' => 'Success',
                        'statusCode' => '00'
                    ];
                };
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
            $whereCon = "categories_comment_name = '" . $data['categories_comment_name']."'";
            
            $existingComment  = $this->commentCategoriesRepository->selectCustomData(null, $whereCon);
            if (count($existingComment) > 0) {
                $result = [
                    'status' => 'Duplicate information',
                    'statusCode' => '200',
                    'message' => 'This comment already exists.'
                ];
            } else {
                $this->commentCategoriesRepository->update($id, $data);
                $result = [
                    'status' => 'Success',
                    'statusCode' => '00'
                ];
            };
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
            $this->commentCategoriesRepository->delete($id);
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return response()->json(["data" => $result]);
    }
    public function getById(Request $request)
    {
        $id = $request->id;
        $comment =  $this->commentCategoriesRepository->find($id);
        $result = [
            'status' => 'Success',
            'statusCode' => '00',
            'categories'  => [$comment]
        ];
        return response()->json( $result);

    }
}
