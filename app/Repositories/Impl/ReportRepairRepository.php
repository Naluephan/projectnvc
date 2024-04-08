<?php

namespace App\Repositories\Impl;

use App\Models\ReportRepair;
use App\Repositories\ReportRepairInterface;
use Illuminate\Support\Collection;

class ReportRepairRepository extends MasterRepository implements ReportRepairInterface

{
    protected $model;
    public function __construct(ReportRepair $model)
    {
        parent::__construct($model);
    }
    public function getAll()
    {
        return $this->model->get();
    }
}
