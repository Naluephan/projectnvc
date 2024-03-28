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
    public function getAll($params = null): Collection
    {
        return $this->model
            ->select('*')
            ->where(function ($q) use ($params) {
                if (isset($params['searchValue'])) {
                    $q->where('location_name', 'like', '%' . $params['searchValue'] . '%');
                }
                if (isset($params['record_status'])) {
                    $q->where('record_status', '=', 1);
                }
            })
            ->with('location')
            ->get();
    }
    public function findBy($params)
    {
        return $this->model->with('location')
            ->where(function ($q) use ($params) {
                if (isset($params['id'])) {
                    $q->where('id', '=', $params['id']);
                }
                if (isset($params['location_name'])) {
                    $q->where('location_name', '=', $params['location_name']);
                }
                // if (isset($params['place_name'])) {
                //     $q->where('place_name', '=', $params['place_name']);
                // }
            })
            ->first();
    }
}
