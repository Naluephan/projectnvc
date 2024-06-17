<?php

namespace App\Repositories\Impl;

use App\Models\FlexibleHoursLogLine;
use App\Repositories\FlexibleHoursLogLineInterface;
use Illuminate\Support\Collection;

class FlexibleHoursLogLineRepository extends MasterRepository implements FlexibleHoursLogLineInterface

{
    protected $model;
    public function __construct(FlexibleHoursLogLine $model)
    {
        parent::__construct($model);
    }
    public function getAll()
    {
        return $this->model->get();
    }
}
