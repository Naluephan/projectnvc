<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\AssetCategoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetCategoryController extends Controller
{
    private $assetcategoryRepository;
    public function __construct(AssetCategoryInterface $assetcategoryRepository)
    {
        $this->assetcategoryRepository = $assetcategoryRepository;
    }

    public function getAssetCategory(Request $request)
    {
        $postData = $request->all();
        $result = [];

        try {
            $param = [];


            $assetcategoryList = $this->assetcategoryRepository->getAll($param);


            $result['status'] = "success";
            $result['data'] = $assetcategoryList;
        } catch (\Exception $ex) {
            $result['status'] = "failed";
            $result['message'] = $ex->getMessage();
        }

        return $result;
    }

    public function create(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $result = [];
        try {
            $this->assetcategoryRepository->create($data);

            $result['status'] = "success";
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return $result;
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $id = $data['id'];
        try {
            $this->assetcategoryRepository->update($id, $data);
            $result['status'] = "success";
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "failed";
            $result['message'] = $ex;
            DB::rollBack();
        }
        return $result;
    }

    public function delete(Request $request)
    {
        DB::beginTransaction();
        $id = $request->id;
        $result['status'] = "Success";
        try {
            $this->assetcategoryRepository->delete($id);
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return $result;
    }

    public function getById(Request $request)
    {
        $id = $request->id;
        return $this->assetcategoryRepository->find($id);
    }
}
