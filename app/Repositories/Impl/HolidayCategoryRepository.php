<?php


namespace App\Repositories\Impl;

use App\Models\HolidayCategory;
use App\Repositories\HolidayCategoryInterface;
use Illuminate\Support\Collection;

class HolidayCategoryRepository extends MasterRepository implements HolidayCategoryInterface
{
    protected $model;

    public function __construct(HolidayCategory $model)
    {
        parent::__construct($model);
    }

    public function getAll(){
        return $this->model->get();
    }

}
