<?php

namespace App\Http\Controllers\APIs;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Repositories\PositionCleanlineInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PositionCleanlineController extends Controller
{
    private $positioncleanlineRepository;
    public function __construct(PositionCleanlineInterface $positioncleanlineRepository)
    {
        $this->positioncleanlineRepository = $positioncleanlineRepository;
    }

    public function getPositionCleanLine(Request $request)
    {

        return $this->positioncleanlineRepository->getAll();
    }

    public function create(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $result = [];
        try {
            $save_data = [
                'title' => $data['title'],
                'location' => $data['location'],
                'time' => $data['time'],
                'time_start' => $data['time_start'],
            ];
            if ($request->file('image_location')) {
                $save_data['image_location'] = save_image($request->file('image_location'), 500, '/images/content/cleanness/');
            }
            $this->positioncleanlineRepository->create($save_data);

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
        $result = [];
        $data = $request->all();
        try {
            if ($request->file('image_location')) {
                $data['image_location'] = save_image($request->file('image_location'), 500, '/images/content/cleanness/');
            }
            $update = $this->positioncleanlineRepository->update($data['id'], $data);
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
            $this->positioncleanlineRepository->delete($id);
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return json_encode($result);
    }

    public function getById(Request $request)
    {
        $id = $request->id;
        return $this->positioncleanlineRepository->find($id);
    }
}
