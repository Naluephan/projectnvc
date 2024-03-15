<?php

namespace App\Http\Controllers\APIs;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Repositories\BuildingLocationInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuildingLocationController extends Controller
{
    private $buildinglocationRepository;
    public function __construct(BuildingLocationInterface $buildinglocationRepository)
    {
        $this->buildinglocationRepository = $buildinglocationRepository;
    }

   public function getBuildingLocation(){
    $data=$this->buildinglocationRepository->getAll();
   return $data;
    
   }

    public function create(Request $request)
    {
        try {
            $image = $request->file('location_img');
            if(isset($image)){
                $imageName = 'Z' . date('YmdHis') . '' . uniqid() . '.jpg';
                $path_file = FileHelper::upload_path() . "/building_location/";
                $image->move($path_file, $imageName);
                $location_img = $imageName;
                $data=[
                    'location_name' => $request->location_name,
                    'total_floors' => $request->total_floors,
                    'total_rooms' => $request->total_rooms,
                    'floor' => $request->floor,
                    'place_name' => $request->place_name,
                    'location_img' => $location_img
                 
                ];
                $create = $this->buildinglocationRepository->create($data);
                $result['status'] = "Success";
                DB::commit();
            }else{
                $data=[
                    'location_name' => $request->location_name,
                    'total_floors' => $request->total_floors,
                    'total_rooms' => $request->total_rooms,
                    'floor' => $request->floor,
                    'place_name' => $request->place_name,
                    'location_img' => ""
                ];
                $create = $this->buildinglocationRepository->create($data);
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
            $image = $request->file('location_img');
            if(isset($image)){
                $imageName = 'Z' . date('YmdHis') . '' . uniqid() . '.jpg';
                $path_file = FileHelper::upload_path() . "/image_location/";
                $image->move($path_file, $imageName);
                $location_img = $imageName;
                $data=[
                    'location_name' => $request->location_name,
                    'total_floors' => $request->total_floors,
                    'total_rooms' => $request->total_rooms,
                    'floor' => $request->floor,
                    'place_name' => $request->place_name,
                    'location_img' => $location_img
                ];
                $id = $request->id;
                $create = $this->buildinglocationRepository->update($id,$data);
                $result['status'] = "Success";
                DB::commit();
            }else{
                $data=[
                    'location_name' => $request->location_name,
                    'total_floors' => $request->total_floors,
                    'total_rooms' => $request->total_rooms,
                    'floor' => $request->floor,
                    'place_name' => $request->place_name,
                    'location_img' => ""
                ];
                $id = $request->id;
                $create = $this->buildinglocationRepository->update($id,$data);
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
            $this->buildinglocationRepository->delete($id);
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
        return $this->buildinglocationRepository->find($id);
    }
}
