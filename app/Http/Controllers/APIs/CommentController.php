<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\CommentInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    private $commentRepository;
    public function __construct(CommentInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }
    public function getAll(Request $request)
    {
        return $this->commentRepository->getAll();
    }
    public function create(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        try {
            $data = [
                'emp_id' => $data['emp_id'],
                'comment_id' => $data['comment_id'],
                'comments_details' => $data['comments_details'],
                // 'comments_status' => $data['comments_status'],
                // 'images' => $data['images'],
            ];
            $whereCom = "comment_id = '" . $data['comment_id'] . "'";
            $existingTopics  = $this->commentRepository->selectCustomData(null, $whereCom);

            if (isset($data) > 0) {
                if (empty($data['emp_id']) || empty($data['comment_id']) || empty($data['comments_details'])) {
                    $result = [
                        'status' => 'Failed',
                        'statusCode' => '03',
                        'message' => 'Data empty. Check the information again.'
                    ];
                } else {
                    if ($request->hasFile('images')) {
                        $data['images'] = save_image($request->file('images'), 500, '/images/setting/comment/');
                    };
                    $this->commentRepository->create($data);
                    $result = [
                        'status' => 'Success',
                        'statusCode' => '00'
                    ];
                }
            } else {
                $result = [
                    'status' => 'Failed to save data',
                    'statusCode' => '01'
                ];
            };
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return response()->json([$result]);
    }
    // public function update(Request $request)
    // {
    //     DB::beginTransaction();
    //     $data = $request->all();
    //     $id = $data['id'];
    //     try {
    //         $data = [
    //             'comments_id' => $data['comments_id'],
    //             'comments_details' => $data['comments_details'],
    //         ];
    //         if (isset($data) > 0) {
    //             $this->commentRepository->update($id, $data);
    //             $result = [
    //                 'status' => 'Success',
    //                 'statusCode' => '00'
    //             ];
    //         } else {
    //             $result = [
    //                 'status' => 'Failed to save data',
    //                 'statusCode' => '01'
    //             ];
    //         };
    //         DB::commit();
    //     } catch (\Exception $ex) {
    //         $result['status'] = "Failed";
    //         $result['message'] = $ex->getMessage();
    //         DB::rollBack();
    //     }
    //     return response()->json(["data" => $result]);
    // }
    public function delete(Request $request)
    {
        DB::beginTransaction();
        $id = $request->id;
        try {
            $query = $this->commentRepository->delete($id);
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
    public function getById(Request $request)
    {
        $id = $request->id;
        $contracts =  $this->commentRepository->find($id);

        return response()->json(["data" => $contracts]);
    }
    public function getComId(Request $request)
    {
        $data = $request->all();
        try {
            $whereCom = ['emp_id' => $data['emp_id']];
            $withRelationsCom = ['commentId.categories'];
            $getTopic  = $this->commentRepository->selectCustomData($whereCom, null, null, null, null, null, $withRelationsCom);
            if (empty($data['emp_id'])) {
                $result = [
                    'status' => 'Data empty.',
                    'statusCode' => '03',
                    'message' => 'Data empty. Check the information again.'
                ];
            } else {
                if (count($getTopic) > 0) {
                    foreach ($getTopic as $comImage) {

                        // $comImage->categories_comment_name = $comImage->commentId->categories->categories_comment_name;

                        $comImage['images'] = 'https://newhr.organicscosme.com/uploads/images/setting/comment/' . $comImage['images'];
                    };
                    $result = [
                        'status' => 'Success',
                        'statusCode' => '00',
                        'topicsCom' => $getTopic,
                        // 'topicCom' => $contracts,
                    ];
                } else {
                    $result = [
                        'status' => 'Not Exists',
                        'statusCode' => '05',
                    ];
                }
            }
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
        }

        return response()->json($result);
    }
}
