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
    public function getNewsCategory(Request $request){
        return $this->AdministrativeWorkCategoriesRepository->getAll();
    }


    ///// create category /////
    public function create(Request $request)
    {
        $data = $request->all();
        // $result['status'] = "Create Success";
        try {
            $query = $this->AdministrativeWorkCategoriesRepository->create($data);
            $result = [
                'administ_name' => $query['administ_name'],
            ];
            
            if (isset($result)) {
                $result['status'] = 'Success';
                $result['statusCode'] = '00';
            } else {
                $result['status'] = 'Create Failed';
                DB::rollBack();
            }
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
            $this->AdministrativeWorkCategoriesRepository->update($id,$data);
            $result['status'] = "Success";
            DB::commit();
        } catch (\Exception $ex){
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
        } catch (\Exception $ex){
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
        return $this->AdministrativeWorkCategoriesRepository->find($id);
       
    }


}
