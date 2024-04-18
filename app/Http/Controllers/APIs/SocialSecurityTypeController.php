<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\SocialSecurityTypeInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SocialSecurityTypeController extends Controller
{
    private $socialsecuritytypeRepository;
    // private $socialsecurityfileRepository;
    public function __construct(SocialSecurityTypeInterface $socialsecuritytypeRepository)
    {
        $this->socialsecuritytypeRepository = $socialsecuritytypeRepository;
    }

    public function getAll(Request $request){
        $data = $request->all();
        return $this->socialsecuritytypeRepository->getSocial($data);

    }

    public function create(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $result=[];
        try {
            $check_dup = [
                'name' => $data['name'],
                'detail' => $data['detail'],
            ];
            $existingBuilding = $this->socialsecuritytypeRepository->findBy($check_dup);
        if ($existingBuilding) {
            $result['status'] = "Failed";
            $result['duplicate'] = "duplicate";
            return $result;
        }
            $this->socialsecuritytypeRepository->create($data);
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
}
