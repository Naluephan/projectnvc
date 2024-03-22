<?php


namespace App\Repositories\Impl;


use App\Models\BuildingLocation;
use App\Repositories\BuildingLocationInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class BuildingLocationRepository extends MasterRepository implements BuildingLocationInterface
{
    protected $model;

    public function __construct(BuildingLocation $model)
    {
        parent::__construct($model);
    }
    public function getAll($param): Collection
    {
        return $this->model
            ->select('*')
            ->with('locations')
            ->where('record_status','=',1)
            ->where(function ($q) use ($param) {
            })
            ->get();
    }
    public function showDetailByBuilding($params)
    {
        $buildingId = $params['id'];

        $showDetail = DB::table('building_locations AS BL')
            ->join('locations AS LC', 'LC.id', '=', 'BL.id')
            ->select(
                'BL.id',
                'LC.place_name',
                'LC.floor',
            )
            ->where('LC.building_location_id', '=', $buildingId)
            ->get();


        return $showDetail;
    }
    // public function allList($params)
    // {
    //     $showDetail = DB::table('building_locations AS BL')
    //         ->join('locations AS LC', 'LC.id', '=', 'PT.location_id')
    //         ->select(
    //             'BL.id',
    //             'BL.location_name',
    //             'BL.location_img',
    //             'BL.total_floors',
    //             'BL.total_rooms',
    //             DB::raw('COUNT(PT.department_id) AS department_count')
    //         )
    //         ->groupBy('PT.department_id', 'd.name_th', 'd.image_departments')
    //         ->orderBy('PT.updated_at', 'desc')
    //         ->get();

    //     return $showDetail;
    // }

    


}
