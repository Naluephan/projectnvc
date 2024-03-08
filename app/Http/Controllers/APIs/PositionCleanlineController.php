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

    public function getPositionCleanLine(Request $request){

        return $this->positioncleanlineRepository->getAll();
    }

    public function create(Request $request)
    {

        try {
            $image = $request->file('image_location');
            if(isset($image)){
                $imageName = 'Z' . date('YmdHis') . '' . uniqid() . '.jpg';
                $path_file = FileHelper::upload_path() . "/image_location/";
                $image->move($path_file, $imageName);
                $image_location = $imageName;
                $data=[
                    'title' => $request->title,
                    'location' => $request->location,
                    'time' => $request->time,
                    'time_start' => $request->time_start,
                    'image_location' => $image_location,
                ];
                $create = $this->positioncleanlineRepository->create($data);
                $result['status'] = "Success";
                DB::commit();
            }else{
                $data=[
                    'title' => $request->title,
                    'location' => $request->location,
                    'time' => $request->time,
                    'time_start' => $request->time_start,
                    'image_location' => "",
                ];
                $create = $this->positioncleanlineRepository->create($data);
                $result['status'] = "Success";
                DB::commit();
            }
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
        try {
            $image = $request->file('image_location');
            if(isset($image)){
                $imageName = 'Z' . date('YmdHis') . '' . uniqid() . '.jpg';
                $path_file = FileHelper::upload_path() . "/image_location/";
                $image->move($path_file, $imageName);
                $image_location = $imageName;
                $data=[
                    'title' => $request->title,
                    'location' => $request->location,
                    'time' => $request->time,
                    'time_start' => $request->time_start,
                    'image_location' => $image_location,
                ];
                $id = $request->id;
                $create = $this->positioncleanlineRepository->update($id,$data);
                $result['status'] = "Success";
                DB::commit();
            }else{
                $data=[
                    'title' => $request->title,
                    'location' => $request->location,
                    'time' => $request->time,
                    'time_start' => $request->time_start,
                    'image_location' => "",
                ];
                $id = $request->id;
                $create = $this->positioncleanlineRepository->update($id,$data);
                $result['status'] = "Success";
                DB::commit();
            }
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
            $this->positioncleanlineRepository->delete($id);
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
        return $this->positioncleanlineRepository->find($id);
    }
}
