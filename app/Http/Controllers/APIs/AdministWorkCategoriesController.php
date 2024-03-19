<?php

namespace App\Http\Controllers\APIs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AdministrativeWorkCategoriesInterface;
use Illuminate\Support\Facades\DB;


class AdministWorkCategoriesController extends Controller
{
    private $AdministrativeWorkCategoriesRepository;
    public function __construct(AdministrativeWorkCategoriesInterface $AdministrativeWorkCategoriesRepository)
    {
        $this->AdministrativeWorkCategoriesRepository = $AdministrativeWorkCategoriesRepository;
    }
    public function getAdministList(Request $request)
    {
        return $this->AdministrativeWorkCategoriesRepository->getAll();
    }


    ///// create category /////
    public function create(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        try {
            $existingCategory  = $this->AdministrativeWorkCategoriesRepository->findByAdminist($data['administ_name']);

        if ($existingCategory ) {
            $result = [
                'status' => 'Duplicate information',
                'statusCode' => '200',
                'message' => 'This work category already exists.'
            ];
        } else {
            $query = $this->AdministrativeWorkCategoriesRepository->create($data);
            $result = [
                'news_name' => $query['news_name'],
                'status' => 'Success',
                'statusCode' => '00'
            ];
        }
        DB::commit();
        } catch (\Exception $ex){
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
            $existingCategory  = $this->AdministrativeWorkCategoriesRepository->findByAdminist($data['administ_name']);
            if ($existingCategory ) {
                $result = [
                    'status' => 'Duplicate information',
                    'statusCode' => '200',
                    'message' => 'This work category already exists.'
                ];
            } else {
                $query = $this->AdministrativeWorkCategoriesRepository->update($id, $data);
                $result = [
                    'administ_name' => $query['administ_name'],
                    'status' => 'Success',
                    'statusCode' => '00'
                ]; 
            }
            DB::commit();
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
        $details = $request->news_details;

        $where = ['id' => $id];
        $update = ['administ_name' => $name];
        // $whereRaw = 'news_id = '.$id;
        $this->AdministrativeWorkCategoriesRepository->updateCustomData($where, null,  $update);
        $dataUpdate = $this->AdministrativeWorkCategoriesRepository->find($id);

        return response()->json(["data" => $dataUpdate]);
    }

    ///// delete  /////
    public function delete(Request $request)
    {
        DB::beginTransaction();
        $id = $request->id;
        try {
            $query = $this->AdministrativeWorkCategoriesRepository->delete($id);
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
        // return $this->AdministrativeWorkCategoriesRepository->find($id);
        $administId = $this->AdministrativeWorkCategoriesRepository->find($id);

        return response()->json(["data" => $administId]);
    }
}
