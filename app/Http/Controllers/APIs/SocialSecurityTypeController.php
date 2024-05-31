<?php

namespace App\Http\Controllers\APIs;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Repositories\SocialSecurityFileInterface;
use App\Repositories\SocialSecurityTypeInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SocialSecurityTypeController extends Controller
{
    private $socialsecuritytypeRepository;
    private $socialsecurityfileRepository;
    // private $socialsecurityfileRepository;
    public function __construct(SocialSecurityTypeInterface $socialsecuritytypeRepository, SocialSecurityFileInterface $socialsecurityfileRepository)
    {
        $this->socialsecuritytypeRepository = $socialsecuritytypeRepository;
        $this->socialsecurityfileRepository =$socialsecurityfileRepository;
    }

    public function getAll(Request $request){
        $data = $request->all();
        return $this->socialsecuritytypeRepository->getSocial($data);

    }

    public function getUploadName(Request $request)
    {
        try {
            $data = $request->all();
            $socialSecurityTypes = $this->socialsecuritytypeRepository->getSocial($data);

            if (count($socialSecurityTypes) > 0) {
                $resultData = [];
                foreach ($socialSecurityTypes as $type) {
                    foreach ($type->socialdetail as $detail) {
                        $dataApp = [
                            'id' => $type->id,
                            'name' => $type->name,
                            'detail' => $type->detail,
                            'company_id' => $type->company_id,
                            'position_id' => $type->position_id,
                            'department_id' => $type->department_id,
                            'record_status' => $type->record_status,
                            'created_at' => $type->created_at,
                            'updated_at' => $type->updated_at,
                            'upload_name' => $detail->social_file_attach,
                        ];
                        $resultData[] = $dataApp;
                    }
                }

                $result = [
                    'status' => 'Success',
                    'statusCode' => '00',
                    'data' => $resultData,
                ];
            } else {
                $result = [
                    'status' => 'Not Exists',
                    'statusCode' => '05',
                ];
            }
        } catch (\Exception $ex) {
            $result = [
                'status' => 'Failed',
                'message' => $ex->getMessage(),
            ];
        }

        return response()->json($result);
    }

    // public function createfile(Request $request)
    // {
    //     $data = $request->all();
    //     try {

    //     $file = $request->file('doc_file');
    //     $originalFileName = $file->getClientOriginalName();
    //             $fileName = 'P' . date('YmdHis') . '' . uniqid() . '.pdf';
    //             $path_file = FileHelper::upload_path() . "/images/content/doc_file/";
    //             $file->move($path_file, $fileName);
    //             // Add the image filename to the data object before updating the user
    //             $doc_file = $fileName;
    //             $original_doc_file_name = $originalFileName;
    //     $save_data = [
    //         'social_security_file' => $data['social_security_file'],
    //         'social_security_id' => $data['social_security_id'],
    //         'doc_name' => $original_doc_file_name,
    //         'doc_file' => $doc_file
    //     ];
    //         $this->socialsecurityfileRepository->create($save_data);
    //         $result['status'] = ApiStatus::social_security_success_status;
    //             $result['statusCode'] = ApiStatus::social_security_success_statusCode;
    //         } catch (\Exception $e) {
    //             $result['status'] = ApiStatus::social_security_error_statusCode;
    //             $result['errCode'] = ApiStatus::social_security_error_status;
    //             $result['errDesc'] = ApiStatus::social_security_errDesc;
    //             $result['message'] = $e->getMessage();
    //         }
    //         return $result;
    // }

    public function update(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $id = $data['id'];
        $result['status'] = "Success";
        try {
            $data = [
                'name' => $data['name'],
                'detail' => $data['detail'],
            ];
            $this->socialsecuritytypeRepository->update($id,$data);
            DB::commit();
        } catch (\Exception $ex){
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
            $this->socialsecuritytypeRepository->delete($id);
            DB::commit();
        } catch (\Exception $ex){
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return json_encode($result);
    }

    public function getById(Request $request)
    {
        $id = $request->id;
        return $this->socialsecuritytypeRepository->getTypeById($id);
    }

    public function getSocialSecurityTypeByFilter(Request $request)
    {
        $postData = $request->all();
        $result = [];

        try {

        if (isset($postData['company_id'])) {
            $param['company_id'] = $postData['company_id'];
        }
        if (isset($postData['position_id'])) {
            $param['position_id'] = $postData['position_id'];
        }
        if (isset($postData['department_id'])) {
            $param['department_id'] = $postData['department_id'];
        }
            $departments = $this->socialsecuritytypeRepository->getSocialSecurityTypeByFilter($param);

            $result['status'] = "success";
            $result['data'] = $departments;
        } catch (\Exception $ex) {
            $result['status'] = "failed";
            $result['message'] = $ex->getMessage();
        }

        return $result;
    }
}
