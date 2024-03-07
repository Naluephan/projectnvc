<?php
namespace App\Http\Controllers\APIs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\NewsCategoryInterface;
use Illuminate\Support\Facades\DB;


class NewsCategoryController extends Controller
{
    private $newscategoryRepository;
    public function __construct(NewsCategoryInterface $newscategoryRepository)
    {
        $this->newscategoryRepository = $newscategoryRepository;
    }
    public function getNewsCategory(Request $request){
        return $this->newscategoryRepository->getAll();
       }
    public function create(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $result['status'] = "Create Success";
        try {
            $this->newscategoryRepository->create($data);
            DB::commit();
        } catch (\Exception $ex){
            $result['status'] = "Create Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return json_encode($result);
    }
    public function update(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $id = $data['category_id'];
        $result['status'] = "Update Success";
        try {
            $this->newscategoryRepository->update($id,$data);
            DB::commit();
        } catch (\Exception $ex){
            $result['status'] = "Update Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return json_encode($result);
    }
    public function delete(Request $request)
    {
        DB::beginTransaction();
        $id = $request->id;
        $result['status'] = "Delete Success";
        try {
            $this->newscategoryRepository->delete($id);
            DB::commit();
        } catch (\Exception $ex){
            $result['status'] = "Delete Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return json_encode($result);
    }
    public function getById(Request $request)
    {
        $id = $request->category_id;
        return $this->newscategoryRepository->find($id);
    }


}
