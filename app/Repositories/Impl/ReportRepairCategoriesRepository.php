<?php

namespace App\Repositories\Impl;

use App\Models\ReportRepairCategories;
use App\Repositories\ReportRepairCategoriesInterface;
use Illuminate\Support\Collection;

class ReportRepairCategoriesRepository extends MasterRepository implements ReportRepairCategoriesInterface

{
    protected $model;
    public function __construct(ReportRepairCategories $model)
    {
        parent::__construct($model);
    }
    public function getAll()
    {
        return $this->model->get();
    }
}
