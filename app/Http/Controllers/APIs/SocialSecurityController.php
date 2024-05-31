<?php

namespace App\Http\Controllers\APIs;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\SocialSecurity;
use App\Models\SocialSecurityFile;
use App\Models\SocialSecurityType;
use Illuminate\Http\Request;
use App\Repositories\SocialSecurityInterface;
use App\Repositories\SocialSecurityFileInterface;
use Illuminate\Support\Facades\DB;



class SocialSecurityController extends Controller
{
    private $socialsecurityRepository;
    private $socialsecurityfileRepository;
    public function __construct(SocialSecurityInterface $socialsecurityRepository, SocialSecurityFileInterface $socialsecurityfileRepository)
    {
        $this->socialsecurityRepository = $socialsecurityRepository;
        $this->socialsecurityfileRepository = $socialsecurityfileRepository;
    }

    public function getSocialSecurity(Request $request)
    {
        try {
            $data = $request->all();
            $getsocial_security = $this->socialsecurityRepository->getSocialSecurity($data);
            if (count($getsocial_security) > 0) {
                $result['status'] = ApiStatus::social_security_success_status;
                $result['statusCode'] = ApiStatus::social_security_success_statusCode;
                $result['data'] = $getsocial_security;
            } else {
                $result['status'] = ApiStatus::social_security_failed_status;
                $result['statusCode'] = ApiStatus::social_security_failed_statusCode;
                $result['errDesc'] = ApiStatus::social_security_failed_Desc;
            }
        } catch (\Exception $e) {
            $result['status'] = ApiStatus::social_security_error_statusCode;
            $result['errCode'] = ApiStatus::social_security_error_status;
            $result['errDesc'] = ApiStatus::social_security_errDesc;
            $result['message'] = $e->getMessage();
        }
        return $result;
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $result = [];

        try {
            // Check if the social_security_id exists in the data array
            if (!isset($data['social_security_id'])) {
                throw new \Exception("Social security ID is required.");
            }

            // Check if the social_security_id exists in the SocialSecurity table
            $socialSecurity = SocialSecurity::find($data['social_security_id']);
            if (!$socialSecurity) {
                throw new \Exception("Social security ID not found.");
            }

            // Proceed to create SocialSecurityInfos only if it's not a duplicate entry


                $emp = Employee::find($data['emp_id']);
                $socialtype = SocialSecurityType::find($data['social_security_type_id']);

                $save_data = [
                    'emp_id' => $data['emp_id'],
                    'social_security_type_id' => $data['social_security_type_id'],
                    'social_security_type_name' => $socialtype->name,
                    'position_id' => $emp->position_id,
                    'company_id' => $emp->company_id,
                    'department_id' => $emp->department_id,
                ];

                $newSocialSecurityInfo = $this->socialsecurityRepository->create($save_data);
                $socialSecurityFiles = SocialSecurityFile::where('social_type_id', $data['social_security_type_id'])->get();

                // if ($request->hasFile('doc_file')) {
                //     foreach ($request->file('doc_file') as $file) {
                //         $originalFileName = $file->getClientOriginalName();
                //         $fileName = 'P' . date('YmdHis') . uniqid() . '.pdf';
                //         $path_file = FileHelper::upload_path() . "/images/content/doc_file/";
                //         $file->move($path_file, $fileName);

                //         $doc_file = $fileName;
                //         $original_doc_file_name = $originalFileName;

                //         foreach ($socialSecurityFiles as $socialSecurityFile) {
                //             $save_file = [
                //                 'social_security_file' => $socialSecurityFile->id,
                //                 'social_security_id' => $newSocialSecurityInfo->id,
                //                 'doc_name' => $original_doc_file_name,
                //                 'doc_file' => $doc_file
                //             ];

                //             $this->socialsecurityfileRepository->create($save_file);
                //         }
                //     }
                //     $result['sds'] = 'fdgsfds';
                // }


                // Type 1 //
                if($request->file('file_type1')){
                    $file = $request->file('file_type1');
                    $originalFileName = $file->getClientOriginalName();
                    $fileName = 'P' . date('YmdHis') . uniqid().'.pdf';
                    $path_file = FileHelper::upload_path() . "/images/content/doc_file/";
                    $file->move($path_file, $fileName);

                    $doc_file = $fileName;
                    $original_doc_file_name = $originalFileName;

                    $save_file = [
                        'social_security_file' => 1,
                        'social_security_id' => $newSocialSecurityInfo->id,
                        'doc_name' => $original_doc_file_name,
                        'doc_file' => $doc_file
                    ];

                    $this->socialsecurityfileRepository->create($save_file);
                }
                if($request->file('file_type2')){
                    $file = $request->file('file_type2');
                    $originalFileName = $file->getClientOriginalName();
                    $fileName = 'P' . date('YmdHis') . uniqid().'.pdf';
                    $path_file = FileHelper::upload_path() . "/images/content/doc_file/";
                    $file->move($path_file, $fileName);

                    $doc_file = $fileName;
                    $original_doc_file_name = $originalFileName;

                    $save_file = [
                        'social_security_file' => 2,
                        'social_security_id' => $newSocialSecurityInfo->id,
                        'doc_name' => $original_doc_file_name,
                        'doc_file' => $doc_file
                    ];

                    $this->socialsecurityfileRepository->create($save_file);
                }
                // Type 1 //


                // Type 2 //
                if($request->file('file_type3')){
                    $file = $request->file('file_type3');
                    $originalFileName = $file->getClientOriginalName();
                    $fileName = 'P' . date('YmdHis') . uniqid().'.pdf';
                    $path_file = FileHelper::upload_path() . "/images/content/doc_file/";
                    $file->move($path_file, $fileName);

                    $doc_file = $fileName;
                    $original_doc_file_name = $originalFileName;

                    $save_file = [
                        'social_security_file' => 3,
                        'social_security_id' => $newSocialSecurityInfo->id,
                        'doc_name' => $original_doc_file_name,
                        'doc_file' => $doc_file
                    ];

                    $this->socialsecurityfileRepository->create($save_file);
                }

                if($request->file('file_type4')){
                    $file = $request->file('file_type4');
                    $originalFileName = $file->getClientOriginalName();
                    $fileName = 'P' . date('YmdHis') . uniqid().'.pdf';
                    $path_file = FileHelper::upload_path() . "/images/content/doc_file/";
                    $file->move($path_file, $fileName);

                    $doc_file = $fileName;
                    $original_doc_file_name = $originalFileName;

                    $save_file = [
                        'social_security_file' => 4,
                        'social_security_id' => $newSocialSecurityInfo->id,
                        'doc_name' => $original_doc_file_name,
                        'doc_file' => $doc_file
                    ];

                    $this->socialsecurityfileRepository->create($save_file);
                }
                // Type 2 //


                // Type 3 //
                if($request->file('file_type5')){
                    $file = $request->file('file_type5');
                    $originalFileName = $file->getClientOriginalName();
                    $fileName = 'P' . date('YmdHis') . uniqid().'.pdf';
                    $path_file = FileHelper::upload_path() . "/images/content/doc_file/";
                    $file->move($path_file, $fileName);

                    $doc_file = $fileName;
                    $original_doc_file_name = $originalFileName;

                    $save_file = [
                        'social_security_file' => 5,
                        'social_security_id' => $newSocialSecurityInfo->id,
                        'doc_name' => $original_doc_file_name,
                        'doc_file' => $doc_file
                    ];

                    $this->socialsecurityfileRepository->create($save_file);
                }if($request->file('file_type6')){
                    $file = $request->file('file_type6');
                    $originalFileName = $file->getClientOriginalName();
                    $fileName = 'P' . date('YmdHis') . uniqid().'.pdf';
                    $path_file = FileHelper::upload_path() . "/images/content/doc_file/";
                    $file->move($path_file, $fileName);

                    $doc_file = $fileName;
                    $original_doc_file_name = $originalFileName;

                    $save_file = [
                        'social_security_file' => 6,
                        'social_security_id' => $newSocialSecurityInfo->id,
                        'doc_name' => $original_doc_file_name,
                        'doc_file' => $doc_file
                    ];

                    $this->socialsecurityfileRepository->create($save_file);
                }
                if($request->file('file_type7')){
                    $file = $request->file('file_type7');
                    $originalFileName = $file->getClientOriginalName();
                    $fileName = 'P' . date('YmdHis') . uniqid().'.pdf';
                    $path_file = FileHelper::upload_path() . "/images/content/doc_file/";
                    $file->move($path_file, $fileName);

                    $doc_file = $fileName;
                    $original_doc_file_name = $originalFileName;

                    $save_file = [
                        'social_security_file' => 7,
                        'social_security_id' => $newSocialSecurityInfo->id,
                        'doc_name' => $original_doc_file_name,
                        'doc_file' => $doc_file
                    ];

                    $this->socialsecurityfileRepository->create($save_file);
                }
                // Type 3 //


                // Type 4 //
                if($request->file('file_type8')){
                    $file = $request->file('file_type8');
                    $originalFileName = $file->getClientOriginalName();
                    $fileName = 'P' . date('YmdHis') . uniqid().'.pdf';
                    $path_file = FileHelper::upload_path() . "/images/content/doc_file/";
                    $file->move($path_file, $fileName);

                    $doc_file = $fileName;
                    $original_doc_file_name = $originalFileName;

                    $save_file = [
                        'social_security_file' => 8,
                        'social_security_id' => $newSocialSecurityInfo->id,
                        'doc_name' => $original_doc_file_name,
                        'doc_file' => $doc_file
                    ];

                    $this->socialsecurityfileRepository->create($save_file);
                }
                if($request->file('file_type9')){
                    $file = $request->file('file_type9');
                    $originalFileName = $file->getClientOriginalName();
                    $fileName = 'P' . date('YmdHis') . uniqid().'.pdf';
                    $path_file = FileHelper::upload_path() . "/images/content/doc_file/";
                    $file->move($path_file, $fileName);

                    $doc_file = $fileName;
                    $original_doc_file_name = $originalFileName;

                    $save_file = [
                        'social_security_file' => 9,
                        'social_security_id' => $newSocialSecurityInfo->id,
                        'doc_name' => $original_doc_file_name,
                        'doc_file' => $doc_file
                    ];

                    $this->socialsecurityfileRepository->create($save_file);
                }
                if($request->file('file_type10')){
                    $file = $request->file('file_type10');
                    $originalFileName = $file->getClientOriginalName();
                    $fileName = 'P' . date('YmdHis') . uniqid().'.pdf';
                    $path_file = FileHelper::upload_path() . "/images/content/doc_file/";
                    $file->move($path_file, $fileName);

                    $doc_file = $fileName;
                    $original_doc_file_name = $originalFileName;

                    $save_file = [
                        'social_security_file' => 10,
                        'social_security_id' => $newSocialSecurityInfo->id,
                        'doc_name' => $original_doc_file_name,
                        'doc_file' => $doc_file
                    ];

                    $this->socialsecurityfileRepository->create($save_file);
                }
                // Type 4 //


                // Type 5 //
                if($request->file('file_type11')){
                    $file = $request->file('file_type11');
                    $originalFileName = $file->getClientOriginalName();
                    $fileName = 'P' . date('YmdHis') . uniqid().'.pdf';
                    $path_file = FileHelper::upload_path() . "/images/content/doc_file/";
                    $file->move($path_file, $fileName);

                    $doc_file = $fileName;
                    $original_doc_file_name = $originalFileName;

                    $save_file = [
                        'social_security_file' => 11,
                        'social_security_id' => $newSocialSecurityInfo->id,
                        'doc_name' => $original_doc_file_name,
                        'doc_file' => $doc_file
                    ];

                    $this->socialsecurityfileRepository->create($save_file);
                }
                if($request->file('file_type12')){
                    $file = $request->file('file_type12');
                    $originalFileName = $file->getClientOriginalName();
                    $fileName = 'P' . date('YmdHis') . uniqid().'.pdf';
                    $path_file = FileHelper::upload_path() . "/images/content/doc_file/";
                    $file->move($path_file, $fileName);

                    $doc_file = $fileName;
                    $original_doc_file_name = $originalFileName;

                    $save_file = [
                        'social_security_file' => 12,
                        'social_security_id' => $newSocialSecurityInfo->id,
                        'doc_name' => $original_doc_file_name,
                        'doc_file' => $doc_file
                    ];

                    $this->socialsecurityfileRepository->create($save_file);
                }
                if($request->file('file_type13')){
                    $file = $request->file('file_type13');
                    $originalFileName = $file->getClientOriginalName();
                    $fileName = 'P' . date('YmdHis') . uniqid().'.pdf';
                    $path_file = FileHelper::upload_path() . "/images/content/doc_file/";
                    $file->move($path_file, $fileName);

                    $doc_file = $fileName;
                    $original_doc_file_name = $originalFileName;

                    $save_file = [
                        'social_security_file' => 13,
                        'social_security_id' => $newSocialSecurityInfo->id,
                        'doc_name' => $original_doc_file_name,
                        'doc_file' => $doc_file
                    ];

                    $this->socialsecurityfileRepository->create($save_file);
                }
                // Type 5 //
                $result['status'] = ApiStatus::social_security_success_status;
                $result['statusCode'] = ApiStatus::social_security_success_statusCode;



        } catch (\Exception $e) {
            $result['status'] = ApiStatus::social_security_error_statusCode;
            $result['errCode'] = ApiStatus::social_security_error_status;
            $result['errDesc'] = ApiStatus::social_security_errDesc;
            $result['message'] = $e->getMessage();
        }

        return $result;
    }




    public function update(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        try {
            $this->socialsecurityRepository->update($id, $data);
            $result['status'] = ApiStatus::social_security_success_status;
            $result['statusCode'] = ApiStatus::social_security_success_statusCode;
        } catch (\Exception $e) {
            $result['status'] = ApiStatus::social_security_error_statusCode;
            $result['errCode'] = ApiStatus::social_security_error_status;
            $result['errDesc'] = ApiStatus::social_security_errDesc;
            $result['message'] = $e->getMessage();
        }
        return $result;
    }
    public function getById(Request $request)
    {
        try{
        $id = $request->emp_id;
        $getsocial_security = $this->socialsecurityRepository->getSocialSecurityById($id);
        if (count($getsocial_security) > 0) {
            $result['status'] = ApiStatus::social_security_success_status;
            $result['statusCode'] = ApiStatus::social_security_success_statusCode;
            $result['data'] = $getsocial_security;
        } else {
            $result['status'] = ApiStatus::social_security_failed_status;
            $result['statusCode'] = ApiStatus::social_security_failed_statusCode;
            $result['errDesc'] = ApiStatus::social_security_failed_Desc;
        }
    } catch (\Exception $e) {
        $result['status'] = ApiStatus::social_security_error_statusCode;
        $result['errCode'] = ApiStatus::social_security_error_status;
        $result['errDesc'] = ApiStatus::social_security_errDesc;
        $result['message'] = $e->getMessage();
    }
    return $result;
}
    public function delete(Request $request)
    {
        $id = $request->id;

        try {
            $this->socialsecurityRepository->delete($id);
            $result['status'] = ApiStatus::social_security_success_status;
            $result['statusCode'] = ApiStatus::social_security_success_statusCode;
        } catch (\Exception $e) {
            $result['status'] = ApiStatus::social_security_error_statusCode;
            $result['errCode'] = ApiStatus::social_security_error_status;
            $result['errDesc'] = ApiStatus::social_security_errDesc;
            $result['message'] = $e->getMessage();
        }
        return $result;
    }

    public function getSocialSecurityByFilter(Request $request)
    // {
    //     // $emp_id = $request->id;
    //     $postion = $request->postion;
    //     $company = $request->company;
    //     $department = $request->department;
    //     $param = [
    //         // 'emp_id'=>$emp_id,
    //         'position_id'=>$postion,
    //         'company_id'=>$company,
    //         'deaprtment_id' =>$department,
    //     ];
    //     return $this->socialsecurityRepository->getSocialSecurityByFilter($param);
    // }
    {
        // $empId = $request->id;
        // $data = Employee::where($empId)->first();
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
            $departments = $this->socialsecurityRepository->getSocialSecurityByFilter($param);

            $result['status'] = "success";
            $result['data'] = $departments;
        } catch (\Exception $ex) {
            $result['status'] = "failed";
            $result['message'] = $ex->getMessage();
        }

        return $result;
    }


    public function approve(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        try {
            $data = [
                'approve_status' => $data['approve_status']
            ];
            $this->socialsecurityRepository->update($id, $data);
            $result['status'] = ApiStatus::social_security_success_status;
            $result['statusCode'] = ApiStatus::social_security_success_statusCode;
        } catch (\Exception $e) {
            $result['status'] = ApiStatus::social_security_error_statusCode;
            $result['errCode'] = ApiStatus::social_security_error_status;
            $result['errDesc'] = ApiStatus::social_security_errDesc;
            $result['message'] = $e->getMessage();
        }
        return $result;
    }
}
