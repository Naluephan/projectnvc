<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\SupplyCategoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplyCategoryController extends Controller
{
    private $supplycategoryRepository;
    public function __construct(SupplyCategoryInterface $supplycategoryRepository)
    {
        $this->supplycategoryRepository = $supplycategoryRepository;
    }

   public function getSupplyCategory(Request $request){
    return $this->supplycategoryRepository->getAll();
   }

    public function create(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $result['status'] = "Success";
        try {
            $this->supplycategoryRepository->create($data);
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
            $this->supplycategoryRepository->update($id,$data);
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
            $this->supplycategoryRepository->delete($id);
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
        return $this->supplycategoryRepository->find($id);
    }
}
