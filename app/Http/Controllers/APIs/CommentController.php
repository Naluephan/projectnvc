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
                'comments_id' => $data['comments_id'],
                'comments_details' => $data['comments_details'],
            ];
            if (isset($data) > 0) {
                if (empty($data['comments_id']) || empty($data['comments_details'])) {
                    $result = [
                        'status' => 'Failed',
                        'statusCode' => '03',
                        'message' => 'Data empty. Check the information again.'
                    ];
                } else {
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
        return response()->json(["data" => $result]);
    }
    public function update(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $id = $data['id'];
        try {
            $data = [
                'comments_id' => $data['comments_id'],
                'comments_details' => $data['comments_details'],
            ];
            if (isset($data) > 0) {
                $this->commentRepository->update($id, $data);
                $result = [
                    'status' => 'Success',
                    'statusCode' => '00'
                ];
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
        return response()->json(["data" => $result]);
    }
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
}
