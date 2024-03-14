<?php


namespace App\Repositories\Impl;


use App\Models\SecuritySetting;
use App\Repositories\SecuritySettingInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\Hash;


class SecuritySettingRepository extends BaseRepository implements SecuritySettingInterface
{
    protected $model;

    public function __construct(SecuritySetting $model)
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
            ->get();
    }
}
