<?php

namespace App\Http\Controllers\APIs;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\BuildingLocation;
use App\Models\Location;
use App\Repositories\BuildingLocationInterface;
use App\Repositories\LocationInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuildingLocationController extends Controller
{
    private $buildinglocationRepository;
    private $locationRepository;
    public function __construct(BuildingLocationInterface $buildinglocationRepository,LocationInterface $locationRepository)
    {
        $this->buildinglocationRepository = $buildinglocationRepository;
        $this->locationRepository = $locationRepository;

    }

    // public function showDetailByBuildingById(Request $request)
    // {
    //     $data = $request->all();
    //     $showDetail = $this->buildinglocationRepository->showDetailByBuilding($data);

    //     return $showDetail;
    // }
   public function getBuildingLocation(Request $request){
    $postData = $request->all();
    $result = [];

    try {
        $param = [];
        $id =[];


        $LocationList = $this->buildinglocationRepository->getAll($param);


        $result['status'] = "success";
        $result['data'] = $LocationList;
    } catch (\Exception $ex) {
        $result['status'] = "failed";
        $result['message'] = $ex->getMessage();
    }

    return $result;
}

public function create(Request $request)
{
    DB::beginTransaction();
    $result = [];
    $data = $request->all();
    try {
  
        if ($request->file('location_img')) {
            // บันทึกภาพและรับที่อยู่ของภาพที่บันทึก
            $data['location_img'] = save_image($request->file('location_img'), 500, '/images/setting/building/');
          
        }
        $save_data = [
            'location_name' => $data['location_name'],
            'total_floors' => $data['total_floors'],
            'total_rooms' => $data['total_rooms'],
        ];
        $existingBuilding = $this->buildinglocationRepository->findBy($save_data);
        if ($existingBuilding) {
            $result['status'] = "Failed";
            $result['duplicate'] = "duplicate";
            return $result;
        }
        $building = $this->buildinglocationRepository->create($data);
    
        foreach ($data['locations'] as $location_data) {
            $location_data['building_location_id'] = $building->id;
            $location_data['floor'] = $location_data['floor'];
            $location_data['place_name'] = $location_data['place_name'];
            $this->locationRepository->create($location_data);
        }
        $result['status'] = "success";
        DB::commit();
    } catch (\Exception $ex) {
        $result['status'] = "Failed";
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
            if ($request->file('location_img')) {
                $data['location_img'] = save_image($request->file('location_img'), 500, '/images/setting/building/');
            }
            $building = $this->buildinglocationRepository->update($data['id'], $data);
            
            $building->save();
            // $location_id = array_column(array_filter($data['locations'], function ($location) {
            //     return !empty($location['location_id']);
            // }), 'location_id');

            // $this->locationRepository->deleteNotIn($location_id, $building->id);
            foreach ($data['locations'] as $locationdata) {
                if ($locationdata['location_id'] == null) {
                    $locationdata['building_location_id'] = $building->id;
                    $locationdata['floor'] = $locationdata['floor'];
                    $locationdata['place_name'] = $locationdata['place_name'];
                    $this->locationRepository->create($locationdata);
                } else {
                    $location = $this->locationRepository->update($locationdata['location_id'], $locationdata);
                    $location->save();
                }
            }

            $result['status'] = "success";
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
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
    public function getBuildingById(Request $request)
    {
        $postData = $request->all();
        $result = [];

        try {
            $param['id'] = $postData['id'];
            $buildingList = $this->buildinglocationRepository->findBy($param);
            $result['status'] = "success";
            $result['data'] = $buildingList;
        } catch (\Exception $ex) {
            $result['status'] = "failed";
            $result['message'] = $ex->getMessage();
        }

        return $result;
    }
    // public function showBuildingById(Request $request)
    // {
    //     $data = $request->all();
    //     $showDetail = $this->buildinglocationRepository->showDetailByBuilding($data);

    //     return $showDetail;
    // }
}
