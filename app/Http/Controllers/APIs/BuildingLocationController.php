<?php

namespace App\Http\Controllers\APIs;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\BuildingLocation;
use App\Models\Location;
use App\Repositories\BuildingLocationInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuildingLocationController extends Controller
{
    private $buildinglocationRepository;
    private $locationRepository;
    public function __construct(BuildingLocationInterface $buildinglocationRepository)
    {
        $this->buildinglocationRepository = $buildinglocationRepository;
        // $this->locationRepository = $locationRepository;

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
    try {
        $data = $request->all();

        // เก็บข้อมูลที่รับมาจากคำขอในตัวแปร $save_data
        $building = BuildingLocation::create([
            'location_name' => $data['location_name'],
            'total_floors' => $data['total_floors'],
            'total_rooms' => $data['total_rooms'],
            'location_img' => null,
        ]);
        if ($request->hasFile('location_img')) {
            // บันทึกภาพและรับที่อยู่ของภาพที่บันทึก
            $imagePath = save_image($request->file('location_img'), 500, '/images/setting/building/');
            // อัปเดตค่า location_img ในรายการ BuildingLocation
            $building->update(['location_img' => $imagePath]);
        }
        $location = Location::create([
            'building_location_id' => $building->id,
            'floor' => $data['floor'],
            'place_name' => $data['place_name'],
        ]);

        // ถ้ามีการอัปโหลดภาพ
        

        // สร้าง BuildingLocation พร้อมกับข้อมูลที่อยู่ใน places
        // $this->buildinglocationRepository->create($save_data);

        // กำหนดสถานะการทำงานเป็นสำเร็จ
        $result['status'] = "success";

        // ยืนยันการทำรายการในฐานข้อมูล
        DB::commit();
    } catch (\Exception $ex) {
        // กำหนดสถานะการทำงานเป็นล้มเหลวและเก็บข้อความผิดพลาด
        $result['status'] = "failed";
        $result['message'] = $ex->getMessage();

        // ยกเลิกการทำรายการในฐานข้อมูล
        DB::rollBack();
    }

    // คืนค่าผลลัพธ์
    return $result;
}
        // try {
        //     $image = $request->file('location_img');
        //     if(isset($image)){
        //         $imageName = 'Z' . date('YmdHis') . '' . uniqid() . '.jpg';
        //         $path_file = FileHelper::upload_path() . "/building_location/";
        //         $image->move($path_file, $imageName);
        //         $location_img = $imageName;
        //         $data=[
        //             'location_name' => $request->location_name,
        //             'total_floors' => $request->total_floors,
        //             'total_rooms' => $request->total_rooms,
        //             'floor' => $request->floor,
        //             'place_name' => $request->place_name,
        //             'location_img' => $location_img
                 
        //         ];
        //         $create = $this->buildinglocationRepository->create($data);
        //         $result['status'] = "Success";
        //         DB::commit();
        //     }else{
        //         $data=[
        //             'location_name' => $request->location_name,
        //             'total_floors' => $request->total_floors,
        //             'total_rooms' => $request->total_rooms,
        //             'floor' => $request->floor,
        //             'place_name' => $request->place_name,
        //             'location_img' => ""
        //         ];
        //         $create = $this->buildinglocationRepository->create($data);
        //         $result['status'] = "Success";
        //         DB::commit();
        //     }
        // } catch (\Exception $ex){
        //     $result['status'] = "Failed";
        //     $result['message'] = $ex->getMessage();
        //     DB::rollBack();
        // }
        // return json_encode($result);
        /////////////////////////////////////////////////////////////////////////////////////////////////
    //     public function getSecurityById(Request $request)
    //     {
    //         $postData = $request->all();
    //         $result = [];
    
    //         try {
    //             $securityList = $this->buildinglocationRepository->find($postData['id']);
    //             $result['status'] = "success";
    //             $result['data'] = $securityList;
    //         } catch (\Exception $ex) {
    //             $result['status'] = "failed";
    //             $result['message'] = $ex->getMessage();
    //         }
    
    //         return $result;
    // }
    public function update(Request $request)
    {
        DB::beginTransaction();
        $result = [];
        $data = $request->all();
        try {
            if ($request->file('location_img')) {
                $data['location_img'] = save_image($request->file('location_img'), 500, '/images/setting/building/');
            }
            $update = $this->buildinglocationRepository->update($data['id'], $data);
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
    
    public function showBuildingById(Request $request)
    {
        $data = $request->all();
        $showDetail = $this->buildinglocationRepository->showDetailByBuilding($data);

        return $showDetail;
    }
}
