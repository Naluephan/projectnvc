<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\CommentTopicInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentTopicController extends Controller 
{
    private $commentTopicRepository;
    public function __construct(CommentTopicInterface $commentTopicRepository)
    {
        $this->commentTopicRepository = $commentTopicRepository;
    }
    public function getComTopic(Request $request)
    {
        return $this->commentTopicRepository->getAll();
    }
    public function create(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        try {
            $whereCom = "topic_comment_name = '" . $data['topic_comment_name']."' AND " . "categories_comment_id = '" . $data['categories_comment_id'] . "'";
            
            $existingContracts  = $this->commentTopicRepository->selectCustomData(null, $whereCom);
            if (empty($existingContracts)) {
                $result = [
                    'status' => 'Failed',
                    'statusCode' => '03',
                    'message' => 'Data empty. Check the information again.'
                ];
            } else {
                if (count($existingContracts) > 0){
                    $result = [
                        'status' => 'Duplicate information',
                        'statusCode' => '200',
                        'message' => 'This contracts already exists.'
                    ];
                    
                }else {
                    $this->commentTopicRepository->create($data);
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
            $whereCom = "topic_comment_name = '" . $data['topic_comment_name']."'";
            
            $existingContracts  = $this->commentTopicRepository->selectCustomData(null, $whereCom);
            if (count($existingContracts) > 0) {
                $result = [
                    'status' => 'Duplicate information',
                    'statusCode' => '200',
                    'message' => 'This contracts already exists.'
                ];
            } else {
                $this->commentTopicRepository->update($id, $data);
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
            $this->commentTopicRepository->delete($id);
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
        $contracts =  $this->commentTopicRepository->find($id);
        $result = [
            'status' => 'Success',
            'statusCode' => '00',
            'data'  => [$contracts]
        ];
        return response()->json( $result);

    }
}
