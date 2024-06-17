<?php


namespace App\Repositories\Impl;


use App\Models\MaintenanceSetting;
use App\Repositories\MaintenanceSettingInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\Hash;


class MaintenanceSettingRepository extends BaseRepository implements MaintenanceSettingInterface
{
    protected $model;

    public function __construct(MaintenanceSetting $model)
    {
        parent::__construct($model);
    }
    public function getAll($param): Collection
    {
        return $this->model
            ->select('*')
            ->where('record_status','=',1)
            ->where(function ($q) use ($param) {
            })
            ->with('locations.buildingLocation')
            ->get();
    }
}
