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

    public function createfile(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $result=[];
        try {
        //     $check_dup = [
        //         'name' => $data['name'],
        //         'detail' => $data['detail'],
        //     ];
        //     $existingBuilding = $this->socialsecuritytypeRepository->findBy($check_dup);
        // if ($existingBuilding) {
        //     $result['status'] = "Failed";
        //     $result['duplicate'] = "duplicate";
        //     return $result;
        // }
        $file = $request->file('doc_file');
        $originalFileName = $file->getClientOriginalName();
                $fileName = 'P' . date('YmdHis') . '' . uniqid() . '.pdf';
                $path_file = FileHelper::upload_path() . "/images/content/doc_file/";
                $file->move($path_file, $fileName);
                // Add the image filename to the data object before updating the user
                $doc_file = $fileName;
                $original_doc_file_name = $originalFileName;
        $save_data = [
            'social_security_file' => $data['social_security_file'],
            'social_security_id' => $data['social_security_id'],
            'doc_name' => $original_doc_file_name,
            'doc_file' => $doc_file
        ];
    
           
        
            $this->socialsecurityfileRepository->create($save_data);
            $result['status'] = "Success";
            DB::commit();
        } catch (\Exception $ex){
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return json_encode($result);
    }

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
