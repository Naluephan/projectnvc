<?php
namespace App\Http\Controllers\APIs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\NewsTopicCategoryInterface;
use Illuminate\Support\Facades\DB;


class NewsCategoryController extends Controller
{
    private $newscategoryRepository;
    public function __construct(NewsTopicCategoryInterface $newscategoryRepository)
    {
        $this->newscategoryRepository = $newscategoryRepository;
    }
    public function getNewsCategory(Request $request){
        return $this->newscategoryRepository->getAll();
    }


    ///// update category /////
    public function create(Request $request)
    {
        $data = $request->all();
        // $result['status'] = "Create Success";
        $query = $this->newscategoryRepository->create($data);
        try {
            $result = [
                'news_id' => $query['news_id'],
                'news_name' => $query['news_name'],
                'news_details' => $query['news_details'],
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
        // return json_encode($result);
        return response()->json(["data" => $result]);
    }

    ///// update category /////
    // public function update(Request $request)
    // {
    //     DB::beginTransaction();
    //     $data = $request->all();
    //     $id = $data['category_id'];
    //     $result['status'] = "Update Success";
    //     try {
    //         $this->newscategoryRepository->update($id,$data);
    //         DB::commit();
    //     } catch (\Exception $ex){
    //         $result['status'] = "Update Failed";
    //         $result['message'] = $ex->getMessage();
    //         DB::rollBack();
    //     }
    //     return json_encode($result);
    // }
    public function updateCategory(Request $request)
    {
        $id = $request->news_id;
        $name = $request->news_name;
        $details = $request->news_details;
        $where = ['news_id' => $id];
        $update = ['news_name' => $name];
        $update = ['news_details' => $details];
        // $whereRaw = 'news_id = '.$id;
        $this->newscategoryRepository->updateCustomData($where, null,  $update);
        $dataUpdate = $this->newscategoryRepository->find($id);

        return response()->json(["data" => $dataUpdate]);
    }
    //////////////////////////////////////////////////


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
